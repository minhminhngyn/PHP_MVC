<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="margin-left:30%">
    <H3>Hiển thị thông tin sản phẩm chọn</H3>

    <?php
        session_start();
        include("connect.inp");
        $masp=$_GET["Masp"];
        $sql="SELECT * FROM sanpham where Masp='$masp'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        echo "<form method='POST' action='xlThemgiohang.php'>";
        echo "Masp: {$row['Masp']} <br><input type='hidden' name='Masp' value='{$row['Masp']}'>";
        echo "Tensp: {$row['Tensp']} <br>";
        echo "Gia: {$row['Gia']} <br><input type='hidden' name='Gia' value='{$row['Gia']}'>";
        if (isset($_SESSION["user"]))
            {
                echo "<input type='submit' value='Đưa vào giỏ hàng'>";
            }
        echo"</form">
        $con->close();

    ?>
    </div>
</body>
</html>