<?php
session_start();
include("connect.inp");

$masp = $_POST['Masp'];
$gia = $_POST['Gia'];
$user = $_SESSION["user"];

// Kiểm tra đã tồn tại giỏ hàng theo user chưa
$sql_check = "SELECT * FROM DonDathang WHERE chedo = 0 AND nguoidathang = '$user'";
$result = $con->query($sql_check);

if ($result->num_rows == 0) { // Nếu chưa tồn tại giỏ hàng
    // Xác định hóa đơn mới khi trường sohoadon là kiểu số nguyên không tự động tăng
    $s_sohoadon = "SELECT MAX(sohoadon) as shd FROM Dondathang";
    $result = $con->query($s_sohoadon);
    $row = $result->fetch_assoc();
    $sohoadon = $row["shd"] + 1;

    // Thêm đơn đặt hàng mới
    $insert_dondathang = "INSERT INTO Dondathang (Sohoadon, nguoidathang, chedo) 
                          VALUES ($sohoadon, '$user', 0)";
    $con->query($insert_dondathang);
} else {
    // Nếu đã tồn tại giỏ hàng, lấy lại số hóa đơn hiện có
    $row = $result->fetch_assoc();
    $sohoadon = $row["Sohoadon"];
}

// Thêm chi tiết đặt hàng ứng với đơn đặt hàng
// Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng, nếu chưa có thì thêm mới
$sql_check_product = "SELECT * FROM chitietsanpham WHERE Sohoadon = $sohoadon AND mahang = '$masp'";
$result = $con->query($sql_check_product);

if ($result->num_rows > 0) {
    // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
    $update_chitiet = "UPDATE chitietsanpham SET soluong = soluong + 1 WHERE Sohoadon = $sohoadon AND mahang = '$masp'";
    $con->query($update_chitiet);
} else {
    // Nếu sản phẩm chưa có, thêm vào giỏ hàng
    $insert_chitietdathang = "INSERT INTO chitietsanpham (Sohoadon, mahang, giaban, soluong) 
                              VALUES ($sohoadon, '$masp', $gia, 1)";
    $con->query($insert_chitietdathang);
}

// In ra script JavaScript để hiển thị alert và quay lại trang giỏ hàng
echo "<script>
        alert('Thêm vào giỏ hàng thành công!');
        window.location.href = 'giohang.php'; // Chuyển hướng về trang giỏ hàng
      </script>";

$con->close();
?>
