<?php

namespace app;

class Home extends Admin
{
        public function index()
        {
            require_once(BASE_PATH . '/template/app/index.php');
        }

}








