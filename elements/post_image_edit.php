<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['applyImage'])) {
        $id_picture = explode(".", $_POST['applyImage'])[0];
        $id_post = explode(".", $_POST['applyImage'])[1];
        if(!empty($_FILES['post-image']['tmp_name'])) {
            if ($_FILES['post-image']['size'] <= 8000000) {
                unlink("." . mysqli_fetch_row(mysqli_query($conn, "SELECT link FROM resources WHERE id = " . $id_picture . ";")));
                mysqli_query($conn, "UPDATE posts SET id_picture = NULL WHERE id = " . $id_post);
                mysqli_query($conn, "DELETE FROM resources WHERE id = " . $id_picture . ";");

                $filepath = "./uploads/" . basename($_FILES['post-image']['name']);
                move_uploaded_file($_FILES['post-image']['tmp_name'], "." . $filepath);
                mysqli_query($conn, "INSERT INTO resources VALUES(NULL, '" . $filepath . "', " . $id_post . ", NOW(), 0);");

                $query2 = "SELECT id FROM resources WHERE link = '" . $filepath . "' AND id_user = " . $_COOKIE['user_id'] . ";";
                $image = mysqli_fetch_row(mysqli_query($conn, $query2))[0];

                mysqli_query($conn, "UPDATE posts SET id_picture = " . $image . " WHERE id = " . $id_post);
                header("location: ../edit_post.php?id=" . $id_post);
            } else
                echo "Plik jest za duży!";
        } else {
            echo "Panie! Tu nic nie ma";
        }
    }

    if(isset($_POST['removeImage'])) {
        $id_picture = explode(".", $_POST['removeImage'])[0];
        $id_post = explode(".", $_POST['removeImage'])[1];
        mysqli_query($conn, "UPDATE posts SET id_picture = NULL WHERE id = " . $id_post);
        unlink("." . mysqli_fetch_row(mysqli_query($conn, "SELECT link FROM resources WHERE id = " . $id_picture)));
        mysqli_query($conn, "DELETE FROM resources WHERE id = " . $id_picture . ";");

        header("location: ../edit_post.php?id=" . $id_post);
    }