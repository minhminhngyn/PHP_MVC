<?php
    require_once 'core/core_controller.php';
    class controller_quanlytk extends Controller
    {
        public function index() 
        {
            $this->view('quanlytk/view_quanlytk');
        }
    }
?>