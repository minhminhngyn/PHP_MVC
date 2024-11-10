<?php
    $mahang = $_POST["Mahang"];
    $tenhang = $_POST["Tenhang"];
    $soluong = $_POST["Soluong"];
    $hinhanh = $_POST["Hinhanh"];
    $mota = $_POST["Mota"];
    $giahang = $_POST["Giahang"];
    include ("connect.php");
    $sql = "UPDATE sanpham SET Mahang='$mahang', Tenhang='$tenhang', Soluong='$soluong', Hinhanh='$hinhanh', Mota='$mota', Giahang='$giahang' WHERE Mahang='$mahang'"; 
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                 alert('Sửa thành công');
                 window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
              </script>";
    } else {
        echo "<script>
                 alert('Lỗi');
                 window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
              </script>";
    }
    $conn->close();
?>
