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
<h1>Notice board</h1>
<div class="jumbotron">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">Writer</th>
                <th scope="col">Date</th>
                <th scope="col">Viewed</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require('dbconn.php');
                $sql = "select * from board order by posted desc";
                $pstmt = $db->prepare($sql);
                $pstmt->execute();
                while($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                    $id = $row["id"];
                    $title = $row["title"];
                    $writer = $row["writer"];
                    $date = $row["posted"];
                    $viewed = $row["viewed"];
                    

                    echo "<tr onclick=\"location.href='create.php?id=$row[id]'\" scope='row'>";
                    echo "<td>$id</td>";
                    echo "<td>$title</td>";
                    echo "<td>$writer</td>";
                    echo "<td>$date</td>";
                    echo "<td>$viewed</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>  
        
    </table>
    <a href="create.php" class="btn btn-light">Create</a>
    </div>
</body>
</html>