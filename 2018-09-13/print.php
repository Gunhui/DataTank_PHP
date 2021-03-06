<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="jumbotron">
        <?php
            require_once('dbconn.php');
            $id = $_REQUEST['id'];
            $sql = "select * from board where id=$id";
            $pstmt = $db->prepare($sql);
            $pstmt->execute();
            $row = $pstmt->fetch(PDO::FETCH_ASSOC);

            $title = $row['title'];
            $context = $row['context'];
            $writer = $row['writer'];
            $posted = $row['posted'];
            $viewed = $row['viewed'];
        ?>

        <div class="alert alert-dark" role="alert">
        <h5><?= $id, $title ?></h5>
        <p><?= "$writer  / $posted / $viewed" ?></p><br>
        <hr>
        <p><?= $context ?></p>
        </div>
        <a href="create.php?id=<?= $id ?>"  class="btn btn-warning">Update</a>
        <a href="delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a><br><br>
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</body>
</html>