<!DOCTYPE html>
<?php
    $link = mysqli_connect('127.0.0.1', 'root', '123', 'PT_Start');
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id=$id";
    $res = mysqli_query($link, $sql);
    $sql = "SELECT * FROM posts WHERE id=$id";
    $res = mysqli_query($link, $sql);
    $rows = mysqli_fetch_array($res);
    $title = $rows['title'];
    $main_text = $rows['main_text'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Юрков Р.П.</title>
</head>
<body>
    <header>
        <div class="logo"></div> 
        <h1>Добро пожаловать на мой личный сайт!</h1>
        <div class="logo"></div> 
    </header>
    <div class="container">
        <?php
            echo "<h1>$title</h1>";
            echo "<p>$main_text</p>";
        ?>
    </div>
</body>
</html>