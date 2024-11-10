<?php
?>
<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
if($user=="admin" && $pass=="123456")
{
    session_start();
    $_SESSION["user"]=$user;
    header("Location:home.php");
}
else
{
    echo ("Loi dang nhap!");
}

?>