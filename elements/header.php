<?php
    echo "
        <header>
            <nav class='navbar navbar-expand-sm navbar-light bg-light'>
                <div class='container-fluid'>
                    <a href='./' class='navbar-brand'>Sazami</a>
                    <ul class='navbar-nav'>";

    if(isset($_COOKIE['user_token'])){
        echo "<li class='nav-item'><a href='./dashboard.php' class='nav-link'>Przejdź do panelu administracyjnego</a></li>";
    } else {
        echo "<li class='nav-item'><a href='./logowanie.php' class='nav-link'>Zaloguj się</a></li>";
    }
    echo "
                    </ul>
                </div>
            </nav>
        </header>
    ";