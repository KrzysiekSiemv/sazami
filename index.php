<!DOCTYPE html>
<html lang="pl">
    <head>
        <?php
            require 'elements/database.php';
            include "elements/head.php";
        ?>

        <title>Nowy tytuł</title>
    </head>
    <body>
        <?php include 'elements/header.php'; ?>
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="resources/slide1.jpg" alt="Zdjęcie 1" class="d-block w-100" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Marka znana na całym świecie</h5>
                        <p>Udostępniamy nasze usługi dla wszystkich użytkowników z każdego państwa.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="resources/slide2.jpg" alt="Zdjęcie 2" class="d-block w-100" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bardzo rozbudowane usługi z prostą obsługą</h5>
                        <p>Usługi, które oferujemy są zbudowane w taki sposób, aby oferowały jak najwięcej, a obsługa była jak najprostsza.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="resources/slide3.jpg" alt="Zdjęcie 3" class="d-block w-100" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Zespół godny zaufania</h5>
                        <p>Nasz zespół składa się z bardzo doświadczonych ludzi, dzięki któremu masz pewność, że wszystko działa stabilnie i bezproblemowo, a Ty możesz spać spokojnie po nocach.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Poprzednie</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Nastepne</span>
            </button>
        </div><br>
        <div class="container">
            <h2>Aktualności z bazy danych</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>tytuł</th>
                        <th>zawartość</th>
                        <th>dodano</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'elements/index_posts.php'; ?>
                </tbody>
            </table><br>
            <h2>Kontakt</h2>
            <form method="POST" action="elements/contact.php" class="contact-form">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" required/>
                    <label for="email">Wpisz swój adres mailowy</label>
                </div>
                <div class="input-group">
                    <div class="form-floating col mb-3">
                        <input type="text" name="name" class="form-control" required/>
                        <label for="name">Imie</label>
                    </div>
                    <div class="form-floating col mb-3">
                        <input type="text" name="surname" class="form-control" />
                        <label for="surname">Nazwisko</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="subject" class="form-control" required/>
                    <label for="subject">Temat</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="content" class="form-control" required></textarea>
                    <label for="content">Treść wiadomości</label>
                </div>
                <button type="submit" class="btn btn-primary" name="send">Wyślij</button>
            </form>
        </div>
        <?php include 'elements/footer.php'; ?>
    </body>
    <script src='scripts/theme.js' crossorigin='anonymous'></script>
</html>