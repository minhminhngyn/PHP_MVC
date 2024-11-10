<?php
    //Lấy lại dữ liệu người dùng nhập
    $maloai=$_POST["Maloai"];
    $tenloai=$_POST["Tenloai"];
    $mota=$_POST["Mota"];
    /*$maloai=$_GET["Maloai"];
    $tenloai=$_GET["Tenloai"];
    $mota=$_GET["Mota"];*/
    //Kết nối csdl
    include("connect.inp");
    //kiểm tra dữ liệu hợp lệ trong csdl
    $sql_check="select * from loaisp where Maloai='$maloai' or Tenloai= '$tenloai'";
    $result=$con->query($sql_check);
    if($result->num_rows>0)//đã có
    {
        header("location:loaihang.php?status=0");
    }
    else
    {
            //xây dựng truy vấn thêm: lưu ý chuỗi thì phải trong dấu ''
            $sql="INSERT INTO loaisp(Maloai,Tenloai,Mota) VALUES ('$maloai','$tenloai','$mota')";
            //thực thi truy vấn
            if($con->query($sql)===TRUE){
                //echo "thêm thành công";
                header("location:loaihang.php?status=1");
            }
            else
            {
                header("location:loaihang.php?status=0");
            }
    }   
    $con->close();
?>