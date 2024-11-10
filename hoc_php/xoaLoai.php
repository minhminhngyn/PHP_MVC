<?php
    //Thực hiện nhiệm vụ xóa loại hàng theo mã loại trong cSDL
    $maloai=$_GET['Maloai'];
    //$maloai=$_POST['Maloai'];
    include("connect.inp");
    $sql="DELETE FROM loaisp where Maloai='$maloai'";
    if($con->query($sql)===TRUE){
        echo "Xóa thành công";
    }
    else
    {
        echo "Lỗi";
    }
    $con->close();
?>