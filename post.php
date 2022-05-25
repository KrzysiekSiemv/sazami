<?php
    require 'elements/database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $title = $content = $added_at = $updated_at = $added_by = $image_link = "";

    if(!isset($_GET['id']))
        header("location: index.php");
    else {
        $query1 = "SELECT title, content, added_at, posts.updated_at, users.name, users.surname, resources.link FROM posts LEFT JOIN users ON id_user = users.id LEFT JOIN resources ON id_picture = resources.id WHERE posts.id = " . $_GET['id'] . ";";
        if($row = mysqli_fetch_row(mysqli_query($conn, $query1))){
            $title = $row[0];
            $content = $row[1];
            $added_at = $row[2];
            $updated_at = $row[3];
            if($row[4] != null)
                $added_by = $row[4] . " " . $row[5];
            else
                $added_by = "SYSTEM";
            $image_link = $row[6];
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include "elements/head.php"; ?>

    <title><?php echo $title ?> - Sazami</title>
</head>
<body>
    <?php include 'elements/header.php'; ?>
    <div class="container post">
        <a href="./"><i class="fa-solid fa-arrow-left"></i> Wróć na stronę główną</a>
        <h1><?php echo $title; ?></h1>
        <h5><?php echo "Dodano: " . $added_at . " przez " . $added_by; ?></h5>
        <?php if($image_link != ""){
            echo "<img src='$image_link' alt='post-image' />";
        } ?>
        <p><?php echo $content; ?></p>
    </div>
    <?php include 'elements/footer.php'; ?>
</body>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
</html>
