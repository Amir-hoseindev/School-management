<?php

namespace app;

use database\DataBase;
use Auth\Auth;

class Student extends Admin
{
    function __construct()
    {
        $auth = new Auth();
        $auth->checkStudent();
    }
    public function index()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        require_once(BASE_PATH . '/template/app/student/index.php');
    }
    public function camp()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $camps = $db->select('SELECT * FROM camps')->fetchAll();

        require_once(BASE_PATH . '/template/app/student/camp/index.php');
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
    public function assignments()
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
        require_once(BASE_PATH . '/template/app/student/assignments/index.php');
    }
    public function assignmentDetail($id)
    {
        $db = new DataBase();
        $today = date('Y-m-d');
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        $assignments = $db->select(
            'SELECT a.* , sa.status
                FROM assignments a
                LEFT JOIN student_assignments sa ON a.id = sa.assignment_id AND sa.student_id = ?  
                WHERE a.grade = (SELECT gs.grade FROM grade_subjects gs WHERE gs.id = ?) 
                AND a.subject = (SELECT gs.subject FROM grade_subjects gs WHERE gs.id = ?)
                AND a.academic_year_id = (SELECT gs.academic_year_id FROM grade_subjects gs WHERE gs.id = ?) 
                AND a.due_date >= ?
                ORDER BY a.due_date ASC;',
            [$_SESSION['student'], $id, $id, $id, $today]
        )->fetchAll();
        $assignmentST = $db->select(
            "SELECT a.id AS assignment_id, a.title, a.due_date, a.subject, sa.status, sa.score, sa.id AS ST_id
                FROM assignments a
                LEFT JOIN student_assignments sa ON a.id = sa.assignment_id AND sa.student_id = ?  
                WHERE a.grade = (SELECT s.grade FROM students s WHERE s.id = ?) 
                AND a.academic_year_id = (SELECT s.academic_year_id FROM students s WHERE s.id = ?) 
                ORDER BY a.due_date ASC;",
            [$_SESSION['student'], $_SESSION['student'], $_SESSION['student']]
        )->fetchAll();

        require_once(BASE_PATH . '/template/app/student/assignments/assignmentDetail.php');
    }
    public function submit_assignment($request)
    {

        $db = new DataBase();
        $assignmentST = $db->select(
            "SELECT * FROM student_assignments WHERE assignment_id = ? AND student_id = ?",
            [$request['assignment_id'], $request['student_id']]
        )->fetch();
             
        if ($assignmentST) {
            $db->update(
            'student_assignments',
            $assignmentST['id'],
              ['assignment_id', 'student_id', 'submitted_file', 'status'],
            [$request['assignment_id'], $request['student_id'], $request['submitted_file']['name'], 'ارسال شده'],
        );
        } else {
            $db->insert(
                'student_assignments',
                ['assignment_id', 'student_id', 'submitted_file', 'status'],
                [$request['assignment_id'], $request['student_id'], $request['submitted_file']['name'], 'ارسال شده'],
            );
        }
         $this->redirectBack();
    }














    public function medicine()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        require_once(BASE_PATH . '/template/app/student/medicine/index.php');
    }

    public function leisureTime()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        require_once(BASE_PATH . '/template/app/student/leisureTime/index.php');
    }
    public function profile()
    {
        $db = new DataBase();
        $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
        require_once(BASE_PATH . '/template/app/student/profile/index.php');
    }
}
