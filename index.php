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
        <div class="vhod">
            <?php
            if (!isset($_COOKIE['User'])) {
            ?>
            <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!
                <?php
                } else {
                ?>
                <div class="head">
                    <h1>Страница постов!</h1>
                </div>
                <?php
                    $link = mysqli_connect('127.0.0.1', 'root', '123', 'PT_Start');
                    $sql = "SELECT * FROM posts";
                    $res = mysqli_query($link, $sql);
                    if (mysqli_num_rows($res) >  0) {
                        while ($post = mysqli_fetch_array($res)) {
                            echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                        }
                    } else {
                            echo "Записей пока нет";
                    }
                }
                ?>
        </div>
    </div>
</body>
</html>