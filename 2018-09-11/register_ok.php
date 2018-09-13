<?php
    $user_id = $_REQUEST['user_id'];
    $user_pw = $_REQUEST['user_pw'];
    $user_name = $_REQUEST['user_name'];

    require("dbconn.php");
    try{
        $insertSQL = "insert into test values('$user_id', '$user_pw', '$user_name')";

        $insertPSTMT = $db->prepare($insertSQL);
        $insertPSTMT->execute();
        echo "<script>alert('값이 정상적으로 들어갔습니다.');</script>";
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        echo "<script>location.replace('index.php');</script>";
    }catch(PDOException $e) {
        echo "<script>alert('아이디가 중복되었습니다.');</script>";
        exit($e->getMesage());
    }
?>