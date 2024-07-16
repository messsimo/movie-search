<?php 
    // Подключение к базе данных
    $host = "localhost";
    $dbname = "spectra";
    $password = "root";
    $username = "root";
    $port = "5004";
    $dsn = "mysql:host=$host;dbname=$dbname;port=$port;";

    $pdo = new PDO($dsn, $username, $password);