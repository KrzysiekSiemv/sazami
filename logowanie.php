<?php
    if(isset($_COOKIE['user_token']))
        header("location: dashboard.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require 'elements/database.php';
        include "elements/head.php";
        ?>

    <title>Logowanie do panelu - Sazami</title>
</head>
<body style="height: 100vh">
    <?php include 'elements/header.php'; ?>
    <div class="subpage">
        <form method="POST" action="elements/authentication.php" class="login" id="loginpanel">
            <h2>Logowanie</h2>
            <p>Zaloguj się do panelu administracyjnego</p>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" required/>
                        <label for="email">Adres e-mail</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" required/>
                        <label for="password">Hasło</label>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="rememberMe" />
                <label for="rememberMe" class="form-check-label">Zapamiętaj mnie na 30 dni</label>
            </div><br>
            <button type="submit" class="btn btn-success" style="width: 100%" name="loginMe">Zaloguj się</button>
            <a href="#" data-bs-toggle="modal" data-bs-target="#changePassModal">Nie pamiętam hasła</a>
            <a href="#" onclick="switchPanels()">Chce się zarejestrować...</a>
        </form>
        <form method="POST" action="elements/registration.php" class="login" id="registerpanel">
            <h2>Rejestracja</h2>
            <p>Zarejestruj się do panelu administracyjnego Sazami</p>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="fname" class="form-control" required/>
                        <label for="fname">Imie</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="sname" class="form-control" required/>
                        <label for="sname">Nazwisko</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" required/>
                <label for="email">Adres e-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" name="phone" class="form-control" required/>
                <label for="phone">Numer telefonu</label>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" required/>
                        <label for="password">Hasło</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" name="repassword" class="form-control" required/>
                        <label for="repassword">Powtórz hasło</label>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="acceptToS" />
                <label for="acceptToS" class="form-check-label">Akceptuje <a href="">regulamin serwisu Sazami</a></label>
            </div>
            <button type="submit" class="btn btn-primary" name="registerMe" style="width: 100%">Zarejestruj się</button>
            <a href="#" onclick="switchPanels()">Jednak mam konto...</a>
        </form>

    </div>
    <?php include 'modals/dont_remember_password.php'; ?>
    <?php include 'elements/footer.php'; ?>
</body>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
<script>
    let panel = 0; // 0 - logowanie, 1 - rejestracja
    const register = document.getElementById('registerpanel');
    const login = document.getElementById('loginpanel');
    (function (e){
        register.style.display = "none";
    })();

    function switchPanels(){
        if(panel === 0){
            register.style.display = "block";
            login.style.display = "none";
            panel = 1;
        } else {
            register.style.display = "none";
            login.style.display = "block";
            panel = 0;
        }
    }
</script>
</html>