<?php
session_start();
include("connect.inp");

$masp = $_GET['Masp'];
$soluong = $_GET['Soluong'];

// Update số lượng trong session cart
$_SESSION['cart'][$masp] = $soluong;

// Update bảng chitietdathang
$sql = "UPDATE chitietdathang 
        SET Soluong='$soluong' 
        WHERE Masp='$masp' AND Sohoadon IN (SELECT Sohoadon FROM dondathang WHERE chedo=0 AND user='{$_SESSION['user']}')";
$con->query($sql);

header("Location: giohang.php");
?>
