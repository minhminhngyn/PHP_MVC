<?php
    require_once 'core/core_controller.php';
    require_once 'app/models/dangky.php';
    require_once 'core/core_models.php';
    class controller_dangky extends Controller
    {
        private $dangkymodel;
      

        //sau khi tạo đối tượng $dangkymodel, gán vào $dangkymodel các hàm của file models_dangky
        public function __construct() 
        {
            $this->dangkymodel = $this->model('models_dangky');
        }


        public function index() 
        {
            $this->view('dangky/view_dangky');
        }


        public function store() 
        {
            var_dump($_POST);
            
// --------------------------------------------------------------------------------------------------------
            //kiểm tra trùng không, hiện view thông báo không khớp, điều khiển về view_dangky.php
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            if ($password !== $password_confirm) 
            {
                echo "Không khớp";
                //header('location:frm_dki.php');
            }
            else
            {
                $hashed_password=password_hash($password,PASSWORD_BCRYPT);
            }
// --------------------------------------------------------------------------------------------------------
            //kiểm tra tài khoản có trùng không bằng email và username, nếu không tạo mã tự tăng 
            // và thực hiện thêm mới
            $email = $_POST['email'];
            $username = $_POST['username'];
            $result= $this->dangkymodel->getInfor_checktrungtaikhoan($username,$email);

            if ($result->num_rows > 0) 
            {
                echo "Tên tài khoản hoặc email đã tồn tại, nhập lại";
                //header('location:frm_dki.php');
            }
            else
            {
                $mahientai= $this->dangkymodel->getID();
                $mamoi=$mahientai+1;

                $token = hash('sha256', $username . time());
                $token_email=$token;
            
                $create_time=date('Y-m-d H:i:s',time());
                $create_by='users';
                $update_time=NULL;
                $update_by=NULL;
                $role=NULL;
                $is_active='0';
                $is_verify='0';
                $send_token_time=date('Y-m-d H:i:s',time());
                $expiration_time = date("Y-m-d H:i:s", strtotime("+24 hours"));

                $object=new dangky($mamoi,$username,$hashed_password,$create_time,$create_by,
                    $update_time,$update_by,$role,$is_active,$is_verify,$token_email,
                    $send_token_time,$expiration_time);

                $this->dangkymodel->insert_thongtintaikhoan($object);
            }
        }
    }
?>