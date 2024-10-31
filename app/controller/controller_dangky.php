<?php
    require_once 'core/core_controller.php';
    class controller_dangky extends Controller
    {
        private $dangkymodel;
        public function index() 
        {
            $this->view('dangky/view_dangky');
        }

        //sau khi tạo đối tượng $dangkymodel, gán vào $dangkymodel các hàm của file models_dangky
        public function __construct() 
        {
            $this->dangkymodel = $this->model('models_dangky');
        }

        
    }
?>