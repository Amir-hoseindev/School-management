<?php

namespace app;

use database\DataBase;
use Auth\Auth;

class Teacher extends Admin
{
    function __construct()
    {
        $auth = new Auth();
        $auth->checkTeacher();
    }
    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }
    public function index()
    {
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        require_once(BASE_PATH . '/template/app/teacher/index.php');
    }
    public function assignments()
    {
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        $teacher_subjects = $db->select('SELECT t.id AS teacher_id,
        t.name AS teacher_name,
        t.last_name AS teacher_lastname,
        tg.grade AS grade,
        ts.id AS teacher_subject_id,
        ts.teacher_grade_id AS teacher_subject_grade_id,
        ts.subject AS teacher_subject,
        gs.image_path AS subject_image
        FROM teachers t
        JOIN teacher_grades tg 
        ON t.id = tg.teacher_id
        JOIN teacher_subjects ts 
        ON tg.id = ts.teacher_grade_id
        JOIN grade_subjects gs 
        ON tg.academic_year_id = gs.academic_year_id
        AND tg.grade = gs.grade
        AND ts.subject = gs.subject
        WHERE t.id = ?
        ORDER BY tg.grade, ts.subject;', [$_SESSION['teacher']])->fetchAll();

        require_once(BASE_PATH . '/template/app/teacher/assignments/index.php');
    }

    public function assignmentDetail($grade, $subject)
    {
        $today = date('Y-m-d');
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        $assignments = $db->select(
            'SELECT 
            a.id AS assignment_id,
            a.title AS assignment_title,
            a.description AS assignment_description, 
            a.due_date AS assignment_due_date, 
            a.publish_date AS assignment_publish_date, 
            a.subject AS assignment_subject, 
            a.grade AS assignment_grade, 
            a.file_path AS assignment_file_path
                FROM assignments a
                WHERE a.teacher_id = ?
                AND a.grade = (SELECT tg.grade FROM teacher_grades tg WHERE id = ?)
                AND a.subject = (SELECT tg.subject FROM teacher_subjects tg WHERE id = ?)
                AND a.academic_year_id = (SELECT ay.id FROM academic_years ay WHERE ? >= start_date AND ? <= end_date And is_active = 1 )
                ;',
            [$_SESSION['teacher'], $grade, $subject, $today, $today]
        )->fetchAll();

        $students = $db->select(
            'SELECT 
                    a.id AS assign_id,
                    s.id AS student_id,
                    s.name AS student_name,
                    s.last_name AS student_lastname,
                    s.grade AS student_grade,
                    COUNT(DISTINCT a.id) AS total_assignments,
                    COUNT(DISTINCT CASE WHEN sa.status = "انجام شده" THEN a.id END) AS completed_assignments,
                    CEILING(COALESCE(AVG(CASE WHEN sa.status = "انجام شده" THEN sa.score ELSE 1 END), 1)) AS average_score
                FROM students s
                CROSS JOIN assignments a
                LEFT JOIN student_assignments sa ON a.id = sa.assignment_id AND s.id = sa.student_id AND a.teacher_id = ?
                WHERE a.grade = s.grade  
                AND a.subject = ?   
                AND a.due_date <= ? 
                ORDER BY a.due_date DESC;',
            [$_SESSION['teacher'], $assignments[0]['assignment_subject'], $today]
        )->fetchAll();
        $subjects = $db->select(
            'SELECT ts.subject FROM teacher_subjects ts LEFT JOIN teacher_grades tg ON teacher_grade_id = tg.id AND ts.teacher_id = ?
            WHERE tg.id = ?;',
            [$_SESSION['teacher'], $grade]
        )->fetchAll();
        require_once(BASE_PATH . '/template/app/teacher/assignments/assignmentDetail.php');
    }
    public function editAssignment($id)
    {
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        $assignment = $db->select("SELECT * FROM assignments WHERE id = ? ", [$id])->fetch();
        $teacher_subject = $db->select(
            "SELECT ts.subject, tg.id FROM teacher_subjects ts
        LEFT JOIN teacher_grades tg ON tg.id = ts.teacher_grade_id AND tg.teacher_id = ? WHERE tg.grade = ?",
            [$_SESSION['teacher'], $assignment['grade']]
        )->fetchAll();
        require_once(BASE_PATH . '/template/app/teacher/assignments/editAssignment.php');
    }
    public function recordEditAssignment($request)
    {
        $today = date('Y-m-d');

        if (empty($request['title']) || empty($request['due_date']) || empty($request['subject']) || empty($request['description'])) {
            flash('assignment', 'تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        }
        $db = new DataBase();
        $assignment = $db->select(
            "SELECT * FROM assignments WHERE id = ?",
            [$request['id']]
        )->fetch();

        if ($assignment) {
            $assignmentDetail = $db->select(
                'SELECT 
            a.id AS assignment_id,
            a.title AS assignment_title,
            a.description AS assignment_description, 
            a.due_date AS assignment_due_date, 
            a.publish_date AS assignment_publish_date, 
            a.subject AS assignment_subject, 
            a.grade AS assignment_grade, 
            a.file_path AS assignment_file_path,
            sa.id AS subject_id,
            sa.assignment_id AS subject_assignment_id,
            sa.student_id AS subject_student_id, 
            sa.submitted_file AS subject_submitted_file, 
            sa.score AS subject_score, 
            sa.status AS subject_status,
            s.name AS student_name,
            s.last_name AS student_lastname
                FROM assignments a
                LEFT JOIN student_assignments sa ON a.id = sa.assignment_id
                LEFT JOIN students s ON sa.student_id = s.id AND a.teacher_id = ?
                WHERE a.grade = (SELECT tg.grade FROM teacher_grades tg WHERE id = ?)
                AND a.subject = (SELECT tg.subject FROM teacher_subjects tg WHERE id = ?)
                AND a.academic_year_id = (SELECT ay.id FROM academic_years ay WHERE ? >= start_date AND ? <= end_date And is_active = 1 )
                ;',
                [$_SESSION['teacher'], $assignment['grade'], $request['subject'], $today, $today]
            )->fetchAll();
            $db->update(
                'assignments',
                $assignment['id'],
                ['title', 'description', 'due_date', 'publish_date', 'subject'],
                [$request['title'], $request['description'], $request['due_date'], $today, $request['subject']],
            );
            $this->redirect('teacher/assignmentDetail/' . $assignmentDetail['grade_id'] . '/' . $assignmentDetail['subject_id']);
        } else {
            $this->redirectBack();
        }
        $this->redirectBack();
    }
    public function submit_assignment($request)
    {
        $today = date('Y-m-d');
        if (empty($request['title']) || empty($request['due_date']) || empty($request['subject']) || empty($request['description'])) {
            flash('assignment', 'تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        } else {
            if ($request['file_path']['tmp_name'] != null) {
                $image = $request['profile_image'];
                $extension = explode('/', $image['type']);
                $imageName = date("Y-m-d-H-i-s") . '.' . $extension[1];
                $imageTemp = $image['tmp_name'];
                $imagePath = 'public/PDF/assognment/';
                if (is_uploaded_file($imageTemp)) {
                    if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                        $requestImage = $imagePath . $imageName;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                $request['file_path'] = null;
            }
            $db = new DataBase();
            $academic_yeare = $db->select(
                'SELECT ay.id FROM academic_years ay WHERE ? >= start_date AND ? <= end_date And is_active = 1',
                [$today, $today]
            )->fetch();
            $db->insert(
                'assignments',
                ['teacher_id', 'academic_year_id', 'title', 'description', 'due_date', 'publish_date', 'subject', 'grade', 'file_path'],
                [$_SESSION['teacher'], $academic_yeare['id'], $request['title'], $request['description'], $request['due_date'], $today, $request['subject'], $request['grade'], $request['file_path']],
            );
        }
        $this->redirectBack();
    }
    public function list_assignment($id)
    {
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        $list_student = $db->select(
            'SELECT 
    s.id AS student_id,
    s.name AS student_name,
    s.last_name AS student_lastname,
    sa.submitted_file,
    sa.score,
    sa.status AS student_status,
    a.id AS assignment_id,
    a.title AS assignment_title,
    a.description AS assignment_description,
    a.due_date AS assignment_due_date,
    a.publish_date AS assignment_publish_date,
    a.subject AS assignment_subject,
    a.grade AS assignment_grade
    FROM students s CROSS JOIN (SELECT * FROM assignments WHERE id = ?) a  
    LEFT JOIN student_assignments sa ON s.id = sa.student_id AND sa.assignment_id = a.id
    WHERE s.grade = a.grade  
    ORDER BY s.last_name, s.name;',
            [$id]
        )->fetchAll();

        require_once(BASE_PATH . '/template/app/teacher/assignments/list_assignment.php');
    }
    public function recordList_assignment($request)
    {
        if (empty($request['score']) || empty($request['student_id']) || empty($request['assignment_id'])) {
            flash('assignment', 'مشکلی در ثبت نمره به وجود آمده لطفا یک بار دیگه سعی کنید');
            $this->redirectBack();
        }elseif (!in_array((int)$request['score'] , [1,2,3,4])) {
            flash('assignment', 'لطفا نمره را درست وارد کنید');
            $this->redirectBack();
        }else {
            $db = new DataBase();
            $list_student = $db->select(
                'SELECT id FROM student_assignments WHERE assignment_id  = ? AND student_id = ?;',
                [$request['assignment_id'], $request['student_id']]
            )->fetch();
            if ($list_student) {
                $db->update(
                    'student_assignments',
                    $list_student['id'],
                    ['score', 'status'],
                    [$request['score'], 'انجام شده'],
                );
            } else {
                $db->insert(
                    'student_assignments',
                    ['assignment_id', 'student_id', 'score', 'status'],
                    [$request['assignment_id'], $request['student_id'], $request['score'], 'انجام شده'],
                );
            }
        }
        $this->redirectBack();
    }
    public function studentList_assignment($id,$subject)
    {
        $db = new DataBase();
        $teacher = $db->select('SELECT * FROM teachers WHERE id = ?', [$_SESSION['teacher']])->fetch();
        $list_student = $db->select(
            'SELECT 
    a.id AS assignment_id,
    a.title AS assignment_title,
    a.description AS assignment_description,
    a.due_date AS assignment_due_date,
    a.publish_date AS assignment_publish_date,
    a.subject AS assignment_subject,
    a.grade AS assignment_grade,
    sa.submitted_file,
    sa.score,
    sa.status AS student_status,
    s.id AS student_id,
    s.name AS student_name,
    s.last_name AS student_lastname
    FROM assignments a CROSS JOIN (SELECT * FROM students WHERE id = ?) s  
    LEFT JOIN student_assignments sa ON s.id = sa.student_id AND sa.assignment_id = a.id
    WHERE s.grade = a.grade  
    AND a.subject = (SELECT a.subject FROM assignments a WHERE id = ?)
    ORDER BY a.due_date;',
            [$id, $subject]
        )->fetchAll();
        require_once(BASE_PATH . '/template/app/teacher/assignments/studentList_assignment.php');
    }
  public function record_studentList_assignment($request)
    {
  
        if (empty($request['score']) || empty($request['student_id']) || empty($request['assignment_id'])) {
            flash('assignment', 'مشکلی در ثبت نمره به وجود آمده لطفا یک بار دیگه سعی کنید');
            $this->redirectBack();
        }elseif (!in_array((int)$request['score'] , [1,2,3,4])) {
            flash('assignment', 'لطفا نمره را درست وارد کنید');
            $this->redirectBack();
        }else {
            $db = new DataBase();
            $list_student = $db->select(
                'SELECT id FROM student_assignments WHERE assignment_id  = ? AND student_id = ?;',
                [$request['assignment_id'], $request['student_id']]
            )->fetch();
            if ($list_student) {
                $db->update(
                    'student_assignments',
                    $list_student['id'],
                    ['score', 'status'],
                    [$request['score'], 'انجام شده'],
                );
            } else {
                $db->insert(
                    'student_assignments',
                    ['assignment_id', 'student_id', 'score', 'status'],
                    [$request['assignment_id'], $request['student_id'], $request['score'], 'انجام شده'],
                );
            }
        }
        $this->redirectBack();
    }





















    public function video()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $grades = $db->select(
            'SELECT gs.*
                    FROM grade_subjects gs
                    WHERE gs.grade = (SELECT s.grade FROM students s WHERE s.id = ?)
                    AND gs.academic_year_id = (SELECT s.academic_year_id FROM students s WHERE s.id = ?);',
            [$_SESSION['student'], $_SESSION['student']]
        )->fetchAll();
        require_once(BASE_PATH . '/template/app/student/video/index.php');
    }
    public function videoDetail($id)
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $educational_videos = $db->select(
            'SELECT ev.*
                    FROM educational_videos ev
                    WHERE ev.grade = (SELECT gs.grade FROM grade_subjects gs WHERE gs.id = ?)
                    AND ev.subject = (SELECT gs.subject FROM grade_subjects gs WHERE gs.id = ?)
                    AND ev.academic_year_id = (SELECT gs.academic_year_id FROM grade_subjects gs WHERE gs.id = ?);',
            [$id, $id, $id]
        )->fetchAll();
        require_once(BASE_PATH . '/template/app/student/video/videoDetail.php');
    }
    public function grades()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $grades = $db->select('SELECT * FROM grades WHERE student_id  = ?', [$_SESSION['student']])->fetchAll();

        require_once(BASE_PATH . '/template/app/student/grades/index.php');
    }
    public function scoreReview($id)
    {
        $db = new DataBase();
        $db->update(
            'grades',
            $id,
            ['answer', 'status'],
            [3, 'درخواست بازنگری داده شده']
        );
        $this->redirectBack();
    }

    public function leisureTime()
    {
        $today = date('Y-m-d');
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $leisureTimes = $db->select(
            'SELECT la.*  FROM leisure_activities AS la 
        LEFT JOIN academic_years AS ay ON la.academic_year_id = ay.id AND la.date >= ?',
            [$today]
        );
        require_once(BASE_PATH . '/template/app/student/leisureTime/index.php');
    }
    public function medicine()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $medicines = $db->select('SELECT * FROM medications WHERE student_id  = ?', [$_SESSION['student']])->fetchAll();
        require_once(BASE_PATH . '/template/app/student/medicine/index.php');
    }
    public function medicine_stor($request)
    {
        $db = new DataBase();
        if ($request['date']) {
            $db->insert(
                'medications',
                ['Student_id', 'academic_year_id', 'name', 'dosage', 'schedule', 'date', 'notes', 'status'],
                [$_SESSION['student'], $request['academic_year_id'], $request['name'], $request['dosage'], $request['schedule'], $request['date'], $request['notes'], 'دارو ثبت شد']
            );
        } else {
            $db->insert(
                'medications',
                ['Student_id', 'academic_year_id', 'name', 'dosage', 'schedule', 'every_day', 'notes', 'status'],
                [$_SESSION['student'], $request['academic_year_id'], $request['name'], $request['dosage'], $request['schedule'], 3, $request['notes'], 'دارو ثبت شد']
            );
        }
        $this->redirectBack();
    }
    public function profile()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        require_once(BASE_PATH . '/template/app/student/profile/index.php');
    }
    public function profileStoreST($request)
    {
        if (empty($request['name']) || empty($request['last_name']) || empty($request['national_id']) || empty($request['profile_image']) || empty($request['password']) || empty($request['phone'])) {
            flash('register_error', 'تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8) {
            flash('register_error', 'رمز عبور باید حداقل ۸ کاراکتر باشد');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();

            if ($request['profile_image']['tmp_name'] != null) {

                $this->removeImage($student['profile_image']);

                $image = $request['profile_image'];


                $extension = explode('/', $image['type']);

                $imageName = '_' . $student['id'] . '_' . date("Y-m-d-H-i-s") . '.' . $extension[1];


                $imageTemp = $image['tmp_name'];

                $imagePath = 'public/image/student/';

                if (is_uploaded_file($imageTemp)) {

                    if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                        $requestImage = $imagePath . $imageName;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                unset($request['image']);
            }
            $request['password'] = $this->hash($request['password']);
            $db->update(
                'students',
                $_SESSION['student'],
                ['name', 'last_name', 'national_id', 'profile_image', 'phone', 'password'],
                [$request['name'], $request['last_name'], $request['national_id'], $requestImage, $request['phone'], $request['password']]
            );
            $this->redirectBack();
        }
    }
}
