<?php
    require_once 'core/core_controller.php';
    class controller_quanlytk extends Controller
{
    public function index() 
    {
        $this->view('quanlytk/view_quanlytk');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: view_dangnhap.php');  
        exit(); 
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $controller = new controller_quanlytk();
    $controller->logout();  
}
?>