<?php
    include("connect.php");

    if (isset($_GET['Mahang'])) {
        $mahang = mysqli_real_escape_string($conn, $_GET['Mahang']);
        $sql = "DELETE FROM sanpham WHERE Mahang='$mahang'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                     alert('Xóa thành công');
                     window.location.href = 'sanpham.php';
                  </script>";
        } else {
            echo "<script>
                     alert('Lỗi khi xóa sản phẩm');
                     window.location.href = 'sanpham.php';
                  </script>";
        }
    }
?>
