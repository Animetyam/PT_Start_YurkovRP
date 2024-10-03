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
        <div class="cath_phrase">
           <h2>Я Юрков Руслан, и здесь не будет никакой информации обо мне!</h2>
       </div>
       <div class="anekdot">
           <div class="vstyplenie">
                <p>Зато будет анекдот! </p>
            </div>
            <div class="anekdot_text">
                <p>
                    Виталию Кличко рассказали, что Бетховен был совершенно глухим, но, тем не менее,
                    смог стать великим композитором. «Значит, у меня определенно 
                    есть шанс стать великим мыслителем», — решил Кличко.
                </p>
            </div>
       </div>
       <div class="mem">
            <div class="kartinka"></div>
            <div class="podpis">
                <p>Юрков Р.П.</p>
            </div>
       </div>
       <div class="button">
            <div class="butt">
                <button id="my_button" class="my_button">Надо нажать</button>
            </div>
            <img id="image" class="image" style="display: none;" src="https://i.yapx.ru/YCYnQ.jpg" alt="prikol">
       </div>
    </div>
    <div class="privetstvie">
         <div class="head">
            <h1 class="hey">
                Привет, <?php echo $_COOKIE['User']; ?>
            </h1>
        </div>
        <form action="profile.php" method="POST" enctype="multipart/form-data" name="upload">
               <div class="row_from_reg">
                    <input class="form_p" type="text" name="title" placeholder="Заголовок ввашего поста">
                </div>
                <div class="row_from_reg">
                    <textarea class="maintext" name="text" cols="30" placeholder="Введите текст вашего поста..."></textarea>
                </div>
                <div class="for_butt">
                    <input class="btn_reg" type="file" name="file" /><br>
                </div>
                <div class="for_butt">
                    <button type="submit" class="btn_reg" name="submit">Сохранить пост</button>
                </div>
        </form>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<?php
    require_once('db.php');
    $link = mysqli_connect('127.0.0.1', 'root', '123', 'PT_Start');
    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $main_text = $_POST['text'];
        if (!$title || !$main_text) die ("Заполните все поля");
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    }
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
?>