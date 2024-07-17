<?php
    // Подключение баззы данных
    require("data/db.php");

    // Выборка из БД
    $sql = "SELECT * FROM `genre`";
    $stmt = $pdo->query($sql);
    $genre = $stmt->fetchAll(2);

    $sql = "SELECT * FROM `movies`";
    $stmt = $pdo->query($sql);
    $movies = $stmt->fetchAll(2);


    // Вывод фильмов по жанру
    if (isset($_GET["genre"]) === true) {
        $id = $_GET["genre"];
        $sql = "SELECT * FROM `movies` WHERE `genre` = '$id'";
        $stmt = $pdo->query($sql);
        $movies = $stmt->fetchAll(2);
    }
?>


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
            <!-- Переборка жанров из таблицы 'genre' и вывод всех жанров -->
            <?php foreach ($genre as $el) { ?>
                <div class="block">
                    <span><a href="?genre=<?php echo $el["id"]; ?>"><?php echo $el["name"]; ?></a></span>
                </div>
            <?php } ?>

            <!-- Логика заключается в том, что мы при нажатии на жанр получаем ID жанра,а после мы его обрабытваем через $_GET данные
            и уже после мы делаем проверку на то УСТНОВЛЕНО ли значение в БД с данным жанром и если TRUE то выводим все данным по данному жанру -->
        </div>
    </div>

    <!-- Секция с фильмами-->
    <div class="movies-forkids">

        <h1>Top movies:</h1>
        
        <div class="container">
        <?php foreach ($movies as $el) { ?>
            <div class="block">
                <span><?php echo $el["rating"]; ?></span>
                <img src="<?php echo $el["photo"]; ?>" alt="">
                <p><?php echo $el["name"]; ?></p>
                <a href="/movie.php?id=<?php echo $el["id"]; ?>">See more</a>
                <!-- Добавить потом рейтинг поверх картинки -->
            </div>
        <?php } ?>
        </div>
    </div>




<?php
    // Подключение футера сайта
    require_once("blocks/footer.php");
?>