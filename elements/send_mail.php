<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['sendMail']))
        mail("krzysiek-smaga@outlook.com", "Testowa wiadomość", "Cześć! Jestem testową wiadomością!", "Content-Type: text/html; charset=UTF-8");

    if(isset($_POST['sendmsgBtn'])){
        mail($_POST['email'], $_POST['topic'], $_POST['content']);

        $query1 = mysqli_query($conn, "SELECT name, surname FROM contacts WHERE email = '" . $_POST['email'] . "';");
        if(mysqli_fetch_row($query1)[0] != null)
            $name = mysqli_fetch_row($query1)[0] . " " . mysqli_fetch_row($query1)[1];
        else
            $name = "Nieznany";

        mysqli_query($conn, "INSERT INTO messages VALUES(NULL, '" . $name . "', '" . $_POST['email'] . "', '" . $_POST['topic'] . "', '" . $_POST['content'] . "', NOW(), 'sent')");
        header("location: ../dashboard.php?sent=success");
    }