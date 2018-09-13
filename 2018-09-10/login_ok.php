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
    <?php
        if($_REQUEST['user_id']==""||$_REQUEST['user_pw']=="") {
            echo "<script>alert('아이디와 비밀번호를 다시 한 번 확인 해 주세요.');";
            echo "location.replace('login.php');</script>";
        }
        try{
            $db = new PDO("mysql:host=localhost;dbname=test_db", "root", "quydcjf2");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $user_id = $_REQUEST["user_id"];
            $user_pw = $_REQUEST["user_pw"];
            $pstmt = $db->prepare("select * from test where user_id='$user_id' and user_pw='$user_pw'");
            $pstmt->execute();
            $row = $pstmt->fetch(PDO::FETCH_ASSOC);             
                
            if($user_id==$row['user_id']||$user_pw==$row['user_pw']){
                $_SESSION['user_id'] = $row["user_id"];
                $_SESSION['user_pw'] = $row["user_pw"];
                $_SESSION['user_name'] = $row["user_name"];
                echo "<script>alert('환영합니다!');";
                echo "location.replace('index.php');</script>";
            }else {
                echo "<script>alert('아이디나 비밀번호가 틀리셨습니다.');";
                echo "location.replace('login.php');</script>";
            }
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    ?>
</body>
</html>