<?php
    // Подключение БД
    require("data/db.php");

    // Выборка из БД
    $sql = "SELECT * FROM `genre`";
    $stmt = $pdo->query($sql);
    $genre = $stmt->fetchAll(2);

    $sql = "SELECT * FROM `movies`";
    $stmt = $pdo->query($sql);
    $movies = $stmt->fetchAll(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Spectra Admin</title>
</head>
<body>
    <?php
        // Запуск сессии
        session_start();
    ?>

    <!-- Шапка сайта -->
    <header>
        <a href="/main.php">Go to main</a>

        <h1>Spectra <b>Admin Panel</b></h1>
    </header>

    <main>
        <!-- Секция с жанрами -->
        <div class="genre">
            <h1>Genre</h1>
                <div class="genre-info">
                    <!-- Добавление жанра -->
                    <div class="block">
                        <form action="/data/add_genre.php" method="POST">
                            <label for="genre">Genre name</label><br>
                            <input type="text" name="genrenameadd" id="genre"><br>

                            <span class="alert"><?= $_SESSION["alert-genre-add"] ?? ''?></span>

                            <button type="submit">Add</button>
                        </form>
                    </div>

                    <!-- Удаление жанра -->
                    <div class="block">
                        <form action="/data/delete_genre.php" method="POST">
                            <label for="genre">Genre name</label><br>
                            <input type="text" name="genrenamedelete" id="genre"><br>

                            <span class="alert"><?= $_SESSION["alert-genre-delete"] ?? ''?></span>

                            <button type="submit">Delte</button>
                        </form>
                    </div>

                    <!-- Обновление жанра -->
                    <?php foreach ($genre as $el) { ?>
                        <div class="block">
                            <form action="/data/update_genre.php" method="POSt">
                                <p>ID: <?php echo $el["id"]; ?></p>
                                <input type="hidden" name="genreid" value="<?php echo $el["id"]; ?>"><br>
                                <label for="genre">Genre name</label><br>
                                <input type="text" value="<?php echo $el["name"]; ?>" name="genrename" id="genre"><br>
                                <button type="submit">Update</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
        </div>

        <!-- Секция с фильмами -->
        <div class="movies">
            <h1>Movies</h1>

            <div class="movies-info">
                <!-- Добавление фильма -->
                <div class="block">
                    <form action="/data/add_movie.php" method="POST">
                        <label for="name">Movie name</label><br>
                        <input type="text" name="name" id="name"><br>
                        <label for="genre">Movie genre(id)</label><br>
                        <input type="text" name="genre" id="genre"><br>
                        <label for="rating">Movie rating</label><br>
                        <input type="text" name="rating" id="rating"><br>
                        <label for="desc">Movie description</label><br>                            
                        <textarea type="text" name="description" id="desc"></textarea><br>
                        <label for="photo">Movie photo(url)</label><br>
                        <input type="text" name="photo" id="photo"><br>

                        <span class="alert"><?= $_SESSION["alert"] ?? ''?></span>

                        <button type="submit">Add</button>
                    </form> 
                </div>

                <!-- Удаление фильма -->
                <div class="block">
                    <form action="/data/delete_movie.php" method="POST">
                        <label for="name">Movie name</label><br>
                        <input type="text" name="namedel" id="name"><br>

                        <span class="alert"><?= $_SESSION["alert-movie-delete"] ?? ''?></span>

                        <button type="submit">Delete</button>
                    </form> 
                </div>

                <!-- Обновление фильма -->
                <?php foreach ($movies as $el) { ?>
                    <div class="block">
                        <img src="<?php echo $el["photo"]; ?>">
                        <form action="/data/update_movie.php" method="POST">
                            <input type="hidden" name="movieid" value="<?php echo $el["id"]; ?>"><br>
                            <label for="name">Movie name</label><br>
                            <input type="text" name="moviename" value="<?php echo $el["name"]; ?>" id="name"><br>
                            <label for="genre">Movie genre(id)</label><br>
                            <input type="text" name="moviegenre" value="<?php echo $el["genre"]; ?>" id="genre"><br>
                            <label for="rating">Movie rating</label><br>
                            <input type="text" name="movierating" value="<?php echo $el["rating"]; ?>" id="rating"><br>
                            <label for="desc">Movie description</label><br>
                            <textarea type="text" name="moviedescription" id="desc"><?php echo $el["description"]; ?></textarea><br>
                            <label for="photo">Movie photo(url)</label><br>
                            <input type="text" name="moviephoto" value="<?php echo $el["photo"]; ?>" id="photo"><br>

                            <span class="alert"><?= $_SESSION["alert-movie-update"] ?? '' ?></span>

                            <button type="submit">Update</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>



    </main>
</body>
</html>