<?php

namespace app;

use database\DataBase;

class Teacher extends Admin
{
        public function index()
        {
            require_once(BASE_PATH . '/template/app/teacher/index.php');
        }

}








