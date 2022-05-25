<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    echo "
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js' integrity='sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js' integrity='sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/e4c3899c65.js' crossorigin='anonymous'></script>
    <link href='styles/layout.css?v6' rel='stylesheet' />";

    $res1 = mysqli_query($conn, 'SELECT link, file_type FROM scripts;');
    while($row = mysqli_fetch_assoc($res1)){
        if($row['file_type'] == 'script')
            echo "<script src='" . $row['link'] . "' crossorigin='anonymous'></script>";
        else
            echo "<link href='" . $row['link'] . "' rel='stylesheet' crossorigin='anonymous' />";
    }