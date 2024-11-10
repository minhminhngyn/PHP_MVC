<?php
    // Thực hiện nhiệm vụ xóa sản phẩm theo mã hàng trong CSDL
    include("connect.php");

    if (isset($_GET['Mahang'])) {
        $mahang = mysqli_real_escape_string($conn, $_GET['Mahang']);
        $sql = "DELETE FROM sanpham WHERE Mahang='$mahang'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                     alert('Xóa thành công');
                     window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
                  </script>";
        } else {
            echo "<script>
                     alert('Lỗi');
                     window.location.href = 'ktr1.php?Maloai=" . $maloai . "';
                  </script>";
        }
    }



