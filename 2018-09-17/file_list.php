<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>업로드 파일 목록</h3>
    <table border="1">
        <tr>
            <th>파일 아이디</th>
            <th>원래 파일명</th>
            <th>저장된 파일명</th>
        </tr>
    <?php
        $db_conn = mysqli_connect("localhost", "root", "quydcjf2", "test_db");
        $query = "select file_id, name_orig, name_save from upload_file order by reg_time desc";
        $stmt = mysqli_prepare($db_conn, $query);
        $exec = mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><? $row['file_id'] ?></td>
        <td><a href="download.php?file_id=<?= $row['file_id'] ?>" target="_blank"><?= $row["name_orig"] ?></a></td>
        <td><?= $row['name_save'] ?></td>
    </tr>
    <?php
        }
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        mysqli_close($db_conn);
    ?>
    </table>
    <a href="upload.php">업로드 페이지</a>
</body>
</html>