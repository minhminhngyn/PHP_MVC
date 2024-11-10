<?php
    $mahang = $_POST["Mahang"];
    $tenhang = $_POST["Tenhang"];
    $soluong = $_POST["Soluong"];
    $hinhanh = $_POST["Hinhanh"];
    $mota = $_POST["Mota"];
    $giahang = $_POST["Giahang"];
    $maloai = $_POST["Maloai"];

    include ("connect.php");

    // Kiểm tra xem sản phẩm đã tồn tại chưa
    $sql_check = "SELECT * FROM sanpham WHERE Mahang='$mahang'";
    $result = $conn->query($sql_check);

    if($result->num_rows > 0) {
        echo "Đã tồn tại sản phẩm này.";
    } else {
        // Thêm Maloai vào câu lệnh INSERT
        $sql = "INSERT INTO sanpham (Mahang, Tenhang, Soluong, Hinhanh, Mota, Giahang, Maloai) 
                VALUES ('$mahang', '$tenhang', '$soluong', '$hinhanh', '$mota', '$giahang', '$maloai')";
//alert
if ($conn->query($sql) === TRUE) {
    echo "<script>
             alert('Thêm thành công');
             window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
          </script>";
} else {
    echo "<script>
             alert('Lỗi');
             window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
          </script>";
}
    }
    $conn->close();
?>
