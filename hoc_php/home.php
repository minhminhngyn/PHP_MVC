<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="home.php"> Home</a> &nbsp 
    <?php
        session_start();
        if(isset($_SESSION["user"]) && $_SESSION["permiss"]==1)
            echo "<a href='qluser.php'> Quản lý người dùng</a>&nbsp ";
        if(!isset($_SESSION["user"]))
            echo " <a href='login.php'> Login</a> &nbsp ";
        if(isset($_SESSION["user"]))
            echo "<a href='list_mathang.php'>Danh sách mặt hàng</a> Xin chào: {$_SESSION['user']} <a href='logout.php'> Logout</a>";
    ?>
    
   
    
</body>
</html>