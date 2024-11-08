<?php
    require_once 'core/core_controller.php';
    class controller_dangnhap extends Controller
    {
        private $dangnhapmodel;

        public function __construct() {
            $this->dangnhapmodel = $this->model('models_dangnhap');
        }
        public function index() 
        {
            $this->view('dangnhap/view_dangnhap');
        }

        // Xử lý đăng nhập người dùng
        public function login($username, $password, $captcha, $remember) {
            // Kiểm tra mã captcha
            if ($captcha !== $_SESSION['captcha_code']) {
                echo '<script>alert("Mã captcha không đúng. Vui lòng thử lại."); window.location.href = "index.php";</script>';
                exit();
            }
    
            // Thực hiện đăng nhập qua model
            $result = $this->dangnhapmodel->loginUser($username, $password, $remember);
            
            if ($result['status'] === 'success') {
                // Kiểm tra quyền người dùng và điều hướng
                if ($result['role'] === 'admin') {
                    header("Location: qluserview.php");
                } else {
                    header("Location: welcome.php");
                }
                exit;
            } else {
                echo '<script>alert("' . $result['message'] . '"); window.location.href = "index.php";</script>';
                exit();
            }
        }
    
        // Xử lý đăng xuất người dùng
        public function logout() {
            if (isset($_COOKIE['remember_me'])) {
                $this->dangnhapmodel->clearToken($_COOKIE['remember_me']);
                setcookie('remember_me', '', time() - 3600, '/', '', true, true);
            }
    
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit;
        }
    
        // Tự động đăng nhập nếu có cookie "remember_me"
        public function autoLogin() {
            if (isset($_COOKIE['remember_me'])) {
                $result = $this->dangnhapmodel->checkToken($_COOKIE['remember_me']);
    
                if ($result['status'] === 'success') {
                    $_SESSION['user_id'] = $result['user_id'];
                    header("Location: " . ($result['role'] === 'admin' ? "qluserview.php" : "welcome.php"));
                    exit;
                }
            }
        }  
    }

    // Khởi tạo controller và xử lý các hành động
    $controller = new controller_dangnhap();
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login($_POST['username'], $_POST['password'], $_POST['captcha'], isset($_POST['remember']));
        } elseif ($_GET['action'] === 'logout') {
            $controller->logout();
        }
    } else {
        $controller->autoLogin();
    }
?>
