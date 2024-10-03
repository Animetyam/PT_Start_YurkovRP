<!DOCTYPE html>
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
        <div class="head">
            <h1>Вход</h1>
        </div>
        <div class="forma">
            <form method="POST" action="login.php">
                <div class="row_from_reg">
                    <input class="row_form" type="text" name="login" placeholder="Login">
                </div>
                <div class="row_from_reg">
                    <input class="row_form" type="password" name="password" placeholder="Password">
                </div>
                <div class="for_butt">
                    <button type="submit" class="btn_reg" name="submit">Продолжить</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    require_once('db.php');
    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
        exit();
    }
    $link = mysqli_connect('127.0.0.1', 'root', '123', 'PT_Start');
    if (isset($_POST['submit'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];
    }
    if (!$username || !$password) die ('Пожалуйста введите все значения!');
    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $username, time()+7200);
        header('Location: profile.php');
    } else {
        echo "неправильное имя или пароль";
    }
?>