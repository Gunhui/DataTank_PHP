<?php
    require_once('dbconn.php');

    $id = $_REQUEST['id'];
    $deleteSQL = "delete from board where id=$id";
    $deletePSTMT = $db->prepare($deleteSQL);
    $deletePSTMT->execute();

    $updateSql = "update board set id=id-1 where id >$id";
    $updatePstmt = $db->prepare($updateSql);
    $updatePstmt->execute();

    echo "<script>alert('삭제되었습니다.');";
    echo "location.replace('index.php');</script>";

?>