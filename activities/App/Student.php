<?php

namespace app;

use database\DataBase;

class Student extends Admin
{
        public function index()
        {
            require_once(BASE_PATH . '/template/app/student/index.php');
        }






         public function camp()
        {
            $db = new DataBase();
            $camps = $db->select('SELECT * FROM camps')->fetchAll();
            
            require_once(BASE_PATH . '/template/app/student/camp/index.php');
        }








        public function assignments()
        {
            require_once(BASE_PATH . '/template/app/student/assignments/index.php');
        }
       
        public function grades()
        {
            require_once(BASE_PATH . '/template/app/student/grades/index.php');
        }
        public function medicine()
        {
            require_once(BASE_PATH . '/template/app/student/medicine/index.php');
        }
        public function video()
        {
            require_once(BASE_PATH . '/template/app/student/video/index.php');
        }
        public function leisureTime()
        {
            require_once(BASE_PATH . '/template/app/student/leisureTime/index.php');
        }
        public function profile()
        {
            require_once(BASE_PATH . '/template/app/student/profile/index.php');
        }

}








