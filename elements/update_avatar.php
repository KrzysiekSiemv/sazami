<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $file = $_FILES['update-avatar']['tmp_name'];
    $filename = $_FILES['update-avatar']['name'];

    if(isset($_POST['update-avatar-btn'])) {
        if (!empty($file)) {
            $filepath = "./uploads/" . basename($filename);
            $query1 = "SELECT users.id FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = id_user;";
            $id = mysqli_fetch_row(mysqli_query($conn, $query1))[0];
            $query2 = "INSERT INTO resources VALUES(NULL, '$filepath', " . $id . ", NOW(), 0)";
            $query3 = "UPDATE users SET avatar = '$filepath', updated_at = NOW() WHERE id = " . $id . ";";

            move_uploaded_file($file, "." . $filepath);
            mysqli_query($conn, $query2);
            mysqli_query($conn, $query3);
            header("location: ../dashboard.php?success=true");
        }
    }