<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $id_user = mysqli_fetch_row(mysqli_query($conn, "SELECT users.id FROM users, login_tokens WHERE login_tokens.token = '" . $_COOKIE['user_token'] . "' AND users.id = id_user"))[0];

    $local_description = $_POST['local-script-description'];
    $local_type = $_POST['local-script-type'];
    $local_link = "./uploads/scripts/" . basename($_FILES['local-script-upload']['name']);
    $local_file = $_FILES['local-script-upload']['tmp_name'];

    $url_description = $_POST['url-script-description'];
    $url_type = $_POST['url-script-type'];
    $url_link = $_POST['url-script-upload'];

    if(isset($_POST['local-script-upload-btn'])){
        if(!empty($local_file)){
            $query_local1 = "INSERT INTO scripts VALUES(NULL, '" . $local_description . "', '" . $local_link . "', '" . $local_type . "', 0, " . $id_user . ")";
            if(move_uploaded_file($local_file, "." . $local_link)){
                mysqli_query($conn, $query_local1);
                header("location: ../dashboard.php?success=true");
            }
        }
    }

    if(isset($_POST['url-script-upload-btn'])){
        if(!empty($url_link)){
            $query_url1 = "INSERT INTO scripts VALUES(NULL, '" . $url_description . "', '" . $url_link . "', '" . $url_type . "', 1, " . $id_user . ")";
            mysqli_query($conn, $query_url1);
            header("location: ../dashboard.php?success=true");
        }
    }

    if(isset($_POST['removeScript'])){
        echo "<script>
            let alert = confirm('Czy aby na pewno chcesz usunąć ten skrypt/styl?');
            if(alert){
                window.location.href = '../dashboard.php?remove_script=" . $_POST['removeScript'] . "';          
            } else {
                window.location.href = '../dashboard.php';
            }
        </script>";
    }
