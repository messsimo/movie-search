<?php
    // Запуск сессии
    session_start();

    // Подклчение БД
    require("db.php");

    // Переменные с данными POST
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Переменные с логином и паролем для админа
    $adminLogin = "admin";
    $adminPassword = "admin123";

    // Проверка на админа
    if ($username == $adminLogin && $password == $adminPassword) {
        header("Location: /admin.php");
    }

    // Валидация данных
    if ($username == "" || $password == "") {
        $_SESSION["alert-sign"] = "Fill all the fields.";
        header("Location: /reg.php");
    } else if (strlen($username) < 2 || strlen($username) > 12) {
        $_SESSION["alert-sign"] = "Your name must be from 3 to 12 characters.";
        header("Location: /reg.php");
    } else if (strlen($password) < 4 || strlen($password) > 12) {
        $_SESSION["alert-sign"] = "Your password must be from 4 to 12 characters.";
        header("Location: /reg.php");
    } 

    // Выборка из БД
    $sql = "SELECT * FROM `users` WHERE `username` = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $findUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверка на наличие пользователя 
    if ($findUser !== false) {
        // Присвоение переменной переменную с ассоцитавным массивом с данными пользователя
        $user = $findUser;

        if (password_verify($password, $user["password"]) === false) {
            $_SESSION["alert-sign"] = "Your password are incorrect.";
            header("Location: /reg.php");
        } else {
            header("Location: /user.php");
        }
    } else {
        $_SESSION["alert-sign"] = "Your login or password are incorrect.";
        header("Location: /reg.php");
    }