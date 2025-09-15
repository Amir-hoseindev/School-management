<?php

namespace Auth;

use database\DataBase;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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

 


    public function register()
    {
    require_once(BASE_PATH . '/template/auth/register.php');
    }


    public function registerStore($request)
    {
        if(empty($request['email']) || empty($request['firstName']) || empty($request['lastName']) || empty($request['password']))
        {
            flash('register_error', 'تمامی فیلد ها اجباری میباشند');
            $this->redirectBack();
        }
        else if(strlen($request['password']) < 8)
        {
            flash('register_error', 'رمز عبور باید حداقل ۸ کاراکتر باشد');
            $this->redirectBack();
        }
        else if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL))
        {
            flash('register_error', 'ایمیل معتبری وارد نشده است');
            $this->redirectBack();
        }
        else{
            $db = new DataBase();
            $teachers = $db->select('SELECT * FROM teachers WHERE teacher_email = ?', [$request['email']])->fetch();
            if($teachers != null){
                flash('register_error', 'کاربر از قبل در سیستم وجود دارد');
                $this->redirectBack();
            }
            else{
                    $request['password'] = $this->hash($request['password']);
                    $db->insert('teachers', [ 'teacher_email' , 'teacher_firstName' , 'teacher_lastName' , 'teacher_password'],[$request['email'] , $request['firstName'] , $request['lastName'] , $request['password']]);
                    $this->redirect('login');
            }
        }
    }


    public function login()
    {
        require_once(BASE_PATH . '/template/auth/login.php');
    }


    public function checkLogin($request)
    {
       if(empty($request['email']) || empty($request['password']))
       {
        flash('login_error', 'تمامی فیلد ها الزامی میباشند');
        $this->redirectBack();
       }
       else{
           $db = new DataBase();
           $teacher = $db->select("SELECT * FROm teachers WHERE teacher_email = ?", [$request['email']])->fetch();

           if($teacher != null)
           {
            
           
            if(password_verify($request['password'], $teacher['teacher_password']))
            {
               $_SESSION['teacher'] = $teacher['teacher_id'];
                $this->redirect('');
            }
            else{
                flash('login_error', 'ورود انجام نشد');
                $this->redirectBack();
            }
           }
           else{
            flash('login_error', 'کاربری با این مشخصات یافت نشد');
            $this->redirectBack();
           }
       }
    }



    public function logout()
    {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('');
    }


   
}
