<?php
    $mahang = $_POST["Mahang"];
    $tenhang = $_POST["Tenhang"];
    $giahang = $_POST["Gia"];  
    $soluong = $_POST["Soluong"];

    include("connect.php");
    $sql = "UPDATE sanpham SET Tenhang='$tenhang', Giahang='$giahang', Soluong='$soluong', Mota='$mota' WHERE Mahang='$mahang'"; 
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                 alert('Sửa thành công');
                 window.location.href = 'sanpham.php';
              </script>";
    } else {
        echo "<script>
                 alert('Lỗi khi sửa sản phẩm');
                 window.location.href = 'sanpham.php';
              </script>";
    }
    $conn->close();
?>
