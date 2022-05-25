<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['addPost'])){
        $query1 = "SELECT users.id FROM users, login_tokens WHERE login_tokens.token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;";
        $res = mysqli_query($conn, $query1);
        if($row = mysqli_fetch_row($res)){
            if(!empty($_FILES['post-image']['tmp_name'])){
                if($_FILES['post-image']['size'] <= 8000000){
                    $filepath = "./uploads/" . basename($_FILES['post-image']['name']);
                    move_uploaded_file($_FILES['post-image']['tmp_name'], "." . $filepath);
                    mysqli_query($conn, "INSERT INTO resources VALUES(NULL, '" . $filepath . "', " . $row[0] . ", NOW(), 0);");

                    $query2 = "SELECT id FROM resources WHERE link = '" . $filepath . "' AND id_user = " . $row[0] . ";";
                    $image = mysqli_fetch_row(mysqli_query($conn, $query2))[0];

                    $query_post = "INSERT INTO posts VALUES (NULL, '" . $_POST['post-title'] . "', '" . $_POST['post-content'] . "', NOW(), NULL, " . $row[0] . ", " . $image . ")";
                    mysqli_query($conn, $query_post);
                    header("location: ../dashboard.php?success=true");
                } else
                    echo "Plik jest za duży!";
            } else {
                $query_post = "INSERT INTO posts VALUES (NULL, '" . $_POST['post-title'] . "', '" . $_POST['post-content'] . "', NOW(), NULL, " . $row[0] . ", NULL)";
                mysqli_query($conn, $query_post);
                header("location: ../dashboard.php?success=true");
            }
        }
    }