<?php
    // Подключение шапки сайта
    require_once("blocks/header.php");

    // Подключение БД
    require("data/db.php");

    // Выборка из БД
    $id = $_GET["id"];

    $sql = "SELECT * FROM movies WHERE id = '$id'";
    $stmt = $pdo->query($sql);
    $movieInfo = $stmt->fetchAll(2);

    // Преоброзование массива
    if (count($movieInfo) > 0) {
        $movieInfo = $movieInfo[0];
    }
?>

<!-- Секция с описанием фильма -->
<div class="about">
    <div class="container">
        <img src="<?php echo $movieInfo["photo"]; ?>" alt="">

        <div class="desc">
            <div class="rating"><?php echo $movieInfo["rating"]; ?></div>
            <h1><?php echo $movieInfo["name"]; ?></h1>
            <p><b>Genre:  <?php 
                if ($movieInfo["genre"] == 5) {
                    $movieInfo["genre"] = "Horror";
                } else if ($movieInfo["genre"] == 1) {
                    $movieInfo["genre"] = "For Kids";
                } else if ($movieInfo["genre"] == 2) {
                    $movieInfo["genre"] = "Comedy";
                } else if ($movieInfo["genre"] == 3) {
                    $movieInfo["genre"] = "Fantastic";
                } else if ($movieInfo["genre"] == 4) {
                    $movieInfo["genre"] = "Detectives";
                } else if ($movieInfo["genre"] == 6) {
                    $movieInfo["genre"] = "Documentary";
                }

                echo $movieInfo["genre"]; 
            ?></b> </p>
            <span><b>Brifly about movie:  <?php echo $movieInfo["description"]; ?></b> </span><br>
        </div>
    </div>
</div>



<?php
    // Подключние футера сайта
    require_once("blocks/footer.php");
?>