<?php
$con = new mysqli("localhost","root","","btphp");
if($con->connect_error)
{
    die("Ket noi khong thanh cong".$con->connect_error);
}
else
{
    echo"Ket noi thanh cong";
}
?>