<?php
    // Lấy lại dữ liệu người dùng nhập
    $maloai = $_POST["Maloai"];
    $tenloai = $_POST["Tenloai"];
    $mota = $_POST["Mota"];
    /*$maloai=$_GET["Maloai"];
    $tenloai=$_GET["Tenloai"];
    $mota=$_GET["Mota"];*/
    // Kết nối CSDL
    include("connect.inp");

    // Xây dựng truy vấn cập nhật
    $sql = "UPDATE loaisp SET Maloai='$maloai', Tenloai='$tenloai', Mota='$mota' WHERE Maloai='$maloai'"; // ID=1 có thể cần thay đổi theo thực tế

    // Thực thi truy vấn
    if ($con->query($sql)===TRUE) {
        // Nếu cập nhật thành công
        header("location:loaihang.php?status=3");
    } else {
        // Nếu xảy ra lỗi
        header("location:loaihang.php?status=0");
    }

    // Đóng kết nối
    $conn->close();
?>
