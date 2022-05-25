<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['saveEdit'])){
        mysqli_query($conn, "UPDATE posts SET title = '" . $_POST['title'] . "', content = '" . $_POST['content'] . "', updated_at = NOW(), id_user = " . $_COOKIE['user_id'] . " WHERE id = " . $_POST['saveEdit'] . ";");
        header("location: ../dashboard.php?success=true");
    }

    if(isset($_POST['cancelIt'])){
        header("location: ../dashboard.php");
    }