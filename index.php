<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Spectra</title>
</head>
<body>
    <?php
        // Запуск сессии
        session_start();
    ?>


    <!-- Секция hero -->
    <div class="hero">
        <div class="logo">
            <h1>Spectra</h1>
        </div>

        <div class="main-text">
            <h1>Unlimited movies, TV shows, and more</h1>
            <p>Watch anywhere. Watch anytime.</p>

            <span>Ready to watch? Login to your account or register.</span><br>

            <button><a href="/reg">Sign in</a></button>
        </div>
    </div>

    <!-- Секция с Spectra TV -->
    <div class="tv">
        <div class="img">
            <img src="images/tv-lap.png" alt="TV">
        </div>

        <div class="desc-text">
            <h1>Enjoy on your TV</h1>
            <h3>Watch on Smart TVs, Playstation, Xbox, Chromecast, Apple TV, Blu-ray players, and more.</h3>
        </div>
    </div>

    <!-- Секция с дивайсами -->
    <div class="divaces">
        <img src="images/divaces.png" alt="Divaces">

        <div class="desc-text">
            <h1>Watch everywhere</h1>
            <p>Stream unlimited movies and TV shows on your phone, tablet, laptop, and TV.</p>
        </div>
    </div>

    <!-- Секция связи -->
    <div class="questions">
        <h1>Do you have questions?</h1>
        <p>You can ask us everything and we got you respond quick.</p>

        <form action="data/email.php" method="POST">
            <label for="email" class="label">Your email</label><br>
            <input type="email" id="email" name="email" placeholder="spectra@mail.ru"><br>

            <label for="message" class="label">Your question</label><br>
            <textarea name="message" id="message" placeholder="How are you?"></textarea><br>

            <span class="alert"><?=$_SESSION["alert"] ?? ''?></span><br>
            
            <button>Send</button>
        </form>
    </div>

<?php
    // Подключение футера сайта
    require_once("blocks/footer.php");
?>