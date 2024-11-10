<?php
    require_once 'core/core_controller.php';
    class controller_trangchu extends Controller {
        public function index() 
        {
            $this->view('home/trangchu');
        }
        
    }
?>