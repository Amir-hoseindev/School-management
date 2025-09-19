<?php

namespace Auth;

use database\DataBase;
use PHPMailer\PHPMailer\Exception;

class Auth
{

    protected function redirect($url)
    {

        header('Location: ' . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }



// ======================================student
    public function registerST()
    {
        require_once(BASE_PATH . '/template/auth/register.php');
    }


    public function registerStoreST($request)
    {
        if (empty($request['name']) || empty($request['last_name']) || empty($request['password'])) {
            flash('register_error', 'تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8) {
            flash('register_error', 'رمز عبور باید حداقل ۸ کاراکتر باشد');
            $this->redirectBack();
        } else {
         
            $db = new DataBase();
            $student = $db->select('SELECT * FROM students WHERE national_id = ?', [$request['national_id']])->fetch();
            if ($student == null) {
                flash('register_error', 'کاربر در سیستم وجود ندارد لطفا اطلاعات تان را درست وارد کنید');
                $this->redirectBack();
            } else if ($student['phone'] != $request['phone']) {
                flash('register_error', 'تلفن خود را درست وارد کنید');
                $this->redirectBack();
            } else {
                $request['password'] = $this->hash($request['password']);
                $db->update(
                    'students',
                    $student['id'],
                    ['name', 'last_name', 'password'],
                    [$request['name'], $request['last_name'], $request['password']]
                );
                $this->redirect('loginST');
            }
        }
    }


    public function loginST()
    {
        require_once(BASE_PATH . '/template/auth/login.php');
    }


    public function checkLoginST($request)
    {
        if (empty($request['national_id']) || empty($request['password'])) {
            flash('login_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $student = $db->select("SELECT * FROm students WHERE national_id = ?", [$request['national_id']])->fetch();

            if ($student != null) {
               
                if (password_verify($request['password'], $student['password'])) {
                    $_SESSION['student'] = $student['id'];
                    $this->redirect('student');
                } else {
                    flash('login_error', 'ورود انجام نشد');
                    $this->redirectBack();
                }
            } else {
                flash('login_error', 'کاربری با این مشخصات یافت نشد');
                $this->redirectBack();
            }
        }
    }



    public function checkStudent()
    {
        if (isset($_SESSION['student'])) {
            $db = new DataBase();
            $student = $db->select('SELECT * FROM students WHERE id = ?', [$_SESSION['student']])->fetch();
            if ($student == null) {
                $this->redirect('');
            }
        } else {
            $this->redirect('');
        }
    }
    public function logoutST()
    {
        if (isset($_SESSION['student'])) {
            unset($_SESSION['student']);
            session_destroy();
        }
        $this->redirect('');
    }

// ======================================teacher


}
