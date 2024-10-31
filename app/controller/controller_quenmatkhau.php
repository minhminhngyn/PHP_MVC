<?php
    require_once 'core/core_controller.php';
    class controller_quenmatkhau extends Controller
    {
        public function index() 
        {
            $this->view('quenmatkhau/view_quenmatkhau');
        }
    }
?>