<?php
    require_once 'core/core_controller.php';
    class controller_dangnhap extends Controller
    {
        public function index() 
        {
            $this->view('dangnhap/view_dangnhap');
        }
    }
?>