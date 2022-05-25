<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(isset($_POST['submitEdit'])) {
        $getid = "SELECT users.id FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;";
        $res1 = mysqli_query($conn, $getid);

        if ($row1 = mysqli_fetch_row($res1)) {
            $query = "UPDATE users SET name = '" . $fname . "', surname = '" . $sname . "', email = '" . $email . "', phone_number = " . $phone . ", updated_at = NOW() WHERE id = " . $row1[0] . ";";
            mysqli_query($conn, $query);
        }

        header("refresh: 0");
    }