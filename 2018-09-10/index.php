<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello World!</h1>
    <hr>
    <?php
        if(!isset($_SESSION['user_id'])||!isset($_SESSION['user_name'])){
            echo "<a href='login.php'>로그인</a>";
        }else{
            echo "$_SESSION[user_name] 님 환영합니다.</br>";
            echo "<a href='logout.php'>로그아웃</a>";
        }
    ?>
</body>
</html>