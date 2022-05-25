<?php
    require 'elements/database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_GET['logout'])) {
        unset($_COOKIE['user_token']);
        setcookie("user_token", null, -1, "/");
        header("location: logowanie.php?logged_out=true");
    }

    if(!isset($_COOKIE['user_token']))
        header("location: logowanie.php?login_first=true");

    $imie = $nazwisko = $email = $avatar = $telefon = $css_ver = "";
    $query = "SELECT name, surname, email, avatar, phone_number FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;";
    $res = mysqli_query($conn, $query);

    if($row = mysqli_fetch_row($res)){
        $imie = $row[0];
        $nazwisko = $row[1];
        $email = $row[2];
        if($row[3] != null)
            $avatar = $row[3];
        else
            $avatar = "resources/avatar.png";
        $telefon = $row[4];
    }

    $css_ver = file("styles/layout.css", FILE_IGNORE_NEW_LINES)[1];

    if(isset($_GET['remove'])){
        if(!empty($_GET['remove'])){
            foreach ($_GET['remove'] as $token){
                $id = mysqli_fetch_row(mysqli_query($conn, "SELECT users.id FROM users, login_tokens WHERE login_tokens.token = '" . $token . "' AND users.id = login_tokens.id_user;"))[0];
                $query1 = "DELETE FROM login_logs WHERE id_user = " . $id . ";";
                $query2 = "DELETE FROM login_tokens WHERE id_user = " . $id . ";";
                $query3 = "DELETE FROM users WHERE id = " . $id . ";";
                mysqli_query($conn, $query1);
                mysqli_query($conn, $query2);
                mysqli_query($conn, $query3);
                echo "Konto o ID: " . $id . " zostało usunięte.\n";
            }
        }
    }

    if(isset($_GET['remove_post'])){
        $id_picture = mysqli_fetch_row(mysqli_query($conn, "SELECT id_picture FROM posts WHERE id = " . $_GET['remove_post'] . ";"))[0];
        mysqli_query($conn, "DELETE FROM posts WHERE id = " . $_GET['remove_post'] . ";");

        if($id_picture != null) {
            $link = mysqli_fetch_row(mysqli_query($conn, "SELECT link FROM resources WHERE id = " . $id_picture . ";"))[0];
            unlink($link);
            mysqli_query($conn, "DELETE FROM resources WHERE id = " . $id_picture . ";");
        }

        header("location: dashboard.php?success=true");
    }

    if(isset($_GET['remove_script'])){
        $is_url = mysqli_fetch_row(mysqli_query($conn, "SELECT is_url FROM scripts WHERE id = " . $_GET['remove_script'] . ";"))[0];
        mysqli_query($conn, "DELETE FROM scripts WHERE id = " . $_GET['remove_script'] . ";");

        if($is_url == 0) {
            $link = mysqli_fetch_row(mysqli_query($conn, "SELECT link FROM scripts WHERE id = " . $_GET['remove_script'] . ";"))[0];
            unlink($link);
        }

        header("location: dashboard.php?success=true");
    }

    if(isset($_GET['remove_msg'])){
        mysqli_query($conn, "DELETE FROM messages WHERE id = " . $_GET['remove_msg'] . ";");
        header("location: dashboard.php?success=true");
    }

    if(isset($_GET['remove_contact'])){
        mysqli_query($conn, "DELETE FROM contacts WHERE id = " . $_GET['remove_contact'] . ";");
        header("location: dashboard.php?success=true");
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include "elements/head.php"; ?>

    <title>Panel administracyjny - Sazami</title>
</head>
<body>
<div id="loading">
    <p>Trwa ładowanie panelu, proszę czekać...</p>
</div>
<div id="site">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><p id="time" class="navbar-brand h3">09.05.2022 <br>12:03</p></li>
            </ul>
            <div class="d-flex">
                <img src="<?php echo $avatar; ?>" class="dashboard-avatar" alt="no"/>
                <div class="dashboard-nav-texts">
                    <h3 class="navbar-text no-padding dashboard-nav-text"><?php echo $imie . " " . $nazwisko; ?></h3>
                    <p class="navbar-text no-padding dashboard-nav-text"><?php echo $email; ?></p>
                </div>
                <a class="nav-link menu" onclick="showMenu()" href="#"><i id="menubtnicon" class="fa-solid fa-caret-down"></i></a>
            </div>
        </div>
    </nav>
    <nav id="menu" class="navbar navbar-expand-sm navbar-dark bg-secondary">
        <div class="container-fluid d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="dashboard.php?logout=true" ><i class="fa-solid fa-right-from-bracket"></i> Wyloguj się</a> </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="dashboard-title">Ustawienia profilu</h1>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#changePassModal"><i class="fa-solid fa-key"></i> <p>Zmień hasło</p></button>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#themeModal"><i class="fa-solid fa-palette"></i> <p>Zmień wygląd</p></button>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="fa-solid fa-user-gear"></i> <p>Edytuj dane</p></button>
            </div>
            <div class="col">
                <h1 class="dashboard-title">Zarządzanie serwisem</h1>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#usersModal"><i class="fa-solid fa-users"></i> <p>Zarządzanie użytkownikami</p></button>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#scriptsModal"><i class="fa-solid fa-gears"></i> <p>Skrypty zewnętrzne</p></button>
                    <button class="btn btn-primary dashboard-tile" onclick="location.href='./';"><i class="fa-solid fa-chevron-left"></i> <p>Wróć na stronę główną</p></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="dashboard-title">Zarządzanie aktualnościami</h1>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#addPostModal"><i class="fa-solid fa-circle-plus"></i> <p>Dodaj nowy post</p></button>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#allPostsModal"><i class="fa-solid fa-newspaper"></i> <p>Zarządzanie postami</p></button>
            </div>
            <div class="col">
                <h1 class="dashboard-title">Kontakt</h1>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#contactsModal"><i class="fa-solid fa-address-book"></i> <p>Zarządzanie kontaktami</p></button>
                    <button class="btn btn-primary dashboard-tile" data-bs-toggle="modal" data-bs-target="#messagesModal"><i class="fa-solid fa-envelope"></i> <p>Zobacz wiadomości</p></button>
                    <button class="btn btn-primary dashboard-tile" onclick="location.href='mailing.php'"><i class="fa-solid fa-paper-plane"></i> <p>Wyślij wiadomość</p></button>
            </div>
        </div>
    </div>
    <?php
        include 'modals/change_pass.php';
        include 'modals/edit_profile.php';
        include 'modals/users.php';
        include 'modals/all_posts.php';
        include 'modals/add_posts.php';
        include 'modals/test_mail.php';
        include 'modals/scripts.php';
        include 'modals/messages.php';
        include 'modals/send_mail.php';
        include 'modals/contacts.php';
        include 'modals/theme.php';
    ?>
</div>
</body>
<script src="scripts/filters.js" crossorigin="anonymous"></script>
<script src="scripts/all.js" crossorigin="anonymous"></script>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
<script>
    let users = <?php echo json_encode(get_users()); ?>;
    let posts = <?php echo json_encode(get_posts()); ?>;
    let messagesRec = <?php echo json_encode(get_received()); ?>;
    let messagesSent = <?php echo json_encode(get_sent()); ?>;
    let contacts = <?php echo json_encode(get_contacts()); ?>;

    let css = "<?php echo $css_ver ?>";
    (function(e){
        setInterval(function(e){
            let time = new Date();
            document.getElementById('time').innerHTML = time.toLocaleDateString() + " " + time.toLocaleTimeString() + "<br>" + css;
        }, 1000);

        document.getElementById("menu").style.display = "none";

        posts_fun(posts);
        users_fun(users);
        messages_sent_fun(messagesSent);
        messages_received_fun(messagesRec);
        contacts_fun(contacts);
    })();
</script>
</html>
<?php include 'elements/informations.php'; ?>