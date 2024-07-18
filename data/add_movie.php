<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $name = $_POST["name"];
    $genre = $_POST["genre"];
    $rating = $_POST["rating"];
    $description = $_POST["description"];
    $photo = $_POST["photo"];

    // Выборка из БД
    $sql = "SELECT `name` FROM `movies` WHERE `name` = :name";
    $findName = $pdo->prepare($sql); 
    $findName->bindParam(':name', $name, PDO::PARAM_STR);
    $findName->execute();

    // Валидация данных
    if (empty($name) && empty($genre) && empty($rating) && empty($description) && empty($photo)) {
        $_SESSION["alert"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 70) {
        $_SESSION["alert"] = 'Name must be under 70 characters.';
        header("Location: /admin.php");
    } else if ($rating > 10.00) {
        $_SESSION["alert"] = 'Rating must be under "10.0".';
        header("Location: /admin.php");
    }

    // Проверка на наличие имени фильма
    if ($findName->rowCount() > 0) {
        $_SESSION["alert"] = 'This movie in stock.';
        header("Location: /admin.php");
    } else {
        // Добавление значений в базу данных
        $sql = "INSERT INTO `movies` (`name`, `genre`, `rating`, `description`, `photo`) VALUES (:name, :genre, :rating, :description, :photo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "name" => $name,
            "genre" => $genre,
            "rating" => $rating,
            "description" => $description,
            "photo" => $photo
        ]);

        $_SESSION["alert"] = "Success.";
        header("Location: /admin.php");
    }