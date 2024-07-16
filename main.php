<!-- Секция hero -->
    <div class="hero">
        <?php
            // Подключение шапки сайта
            require_once("blocks/header.php");
        ?>

        <div class="main-text">
            <h1>Unlimited movies, TV shows, and more</h1>
            <p>Watch anywhere. Watch anytime.</p>

            <span>Ready to watch? Scroll down.</span><br>
        </div>
    </div>

    <!-- Секция с жанрами -->
    <div class="ganre">
        <h1>Сollection</h1>

        <div class="container">
            <div class="block">
                <span><a href="#">For Kids</a></span>
            </div>

            <div class="block">
                <span><a href="#">Comedy</a></span>
            </div>

            <div class="block">
                <span><a href="#">Fantastic</a></span>
            </div>

            <div class="block">
                <span><a href="#">Detectives</a></span>
            </div>

            <div class="block">
                <span><a href="#">Horror</a></span>
            </div>
        </div>
    </div>

    <!-- Секция с фильмами For Kids -->
    <div class="movies-forkids">
        <h1>For Kids</h1>

        <div class="container">
            <div class="block">
                <img src="" alt="">
                <p>Name</p>
                <a href="">Watch now</a>
            </div>

            <div class="block">
                <img src="" alt="">
                <p>Name</p>
                <a href="">Watch now</a>
            </div>

            <div class="block">
                <img src="" alt="">
                <p>Name</p>
                <a href="">Watch now</a>
            </div>
        </div>
    </div>




<?php
    // Подключение футера сайта
    require_once("blocks/footer.php");
?>