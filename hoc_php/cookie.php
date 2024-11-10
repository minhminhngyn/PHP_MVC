<?php
$cookie_name="user";
$cookie_value="C1703H";
setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_COOKIE[$cookie_name]))
    {
        echo "Cookie_name".$_COOKIE['user'];
    }
    else
    {
        echo "Cookie name: $Cookie_name chua tung duoc thiet lap";
    }
?>
</body>
</html>