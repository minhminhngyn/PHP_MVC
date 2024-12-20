<?php
    class Router
    {
        //tạo 3 biến để gán giá trị cho controller, action và parameters. 
        //ban đầu sẽ là controller_trangchu.php, action index và parameter để trống
        protected $controller = 'controller_trangchu';
        protected $action = 'index';
        protected $params = [];

        // -----------------------xử lý url-------------------------
        //hàm parseUrl tách url thành các phần tử

        private function parseUrl($uri) 
        {
            var_dump(explode('/', filter_var(rtrim($uri, '/'), FILTER_SANITIZE_URL)));
            //--> ẩn var_dump để không in ra màn hình
            return explode('/', filter_var(rtrim($uri, '/'), FILTER_SANITIZE_URL));
        }

        //hàm dispatch tìm và gán giá trị cho 3 biến $controller, $action, $params
        public function dispatch($uri) 
        {
            $url = $this->parseUrl($uri);
            if(file_exists('app/controller/controller_'.($url[3]).'.php')) 
            {
                $this->controller = 'controller_'.($url[3]);
                echo  "controller là: ".$this->controller;
                unset($url[3]);
            }
            

            // require_once 'app/controller/' . $this->controller . '.php';
            // $this->controller = new $this->controller;

            // if(isset($url[4])) 
            // {
            //     if(method_exists($this->controller, $url[4])) 
            //     {
            //         $this->action = $url[4];
            //         echo "<br>";
            //         echo $this->action;
            //         unset($url[4]);
            //     }
            // }
            // else{
            //     echo "khong co action";
            // }



            $controllerFile = 'app/controller/' . $this->controller . '.php';
            if (!file_exists($controllerFile)) {
                die("File controller '$controllerFile' không tồn tại.");
            }
            else{
                echo '<br>file controller: ';
                echo $controllerFile;
            }
            
            require_once $controllerFile;
            $this->controller = new $this->controller;

            // Kiểm tra nếu action (phần tử thứ 4 của URL) tồn tại
            if (isset($url[4]) && method_exists($this->controller, $url[4])) 
            {
                $this->action = $url[4];
                echo "Action là: " . $this->action . "<br>";
                unset($url[4]);
            }
            else 
            {
                echo "Không có action, dùng action mặc định: " . $this->action . "<br>";
            }




            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->action], $this->params);
        }
    }
?>