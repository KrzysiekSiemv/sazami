<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query = "SELECT scripts.id, description, link, file_type, is_url, users.name, users.surname FROM scripts, users WHERE users.id = scripts.id_user;";
    $res = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($res)){
        $is_url = "";
        if($row['is_url'] == 1)
            $is_url = "Tak";
        else
            $is_url = "Nie";

        echo "
        <tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['link'] . "</td>
            <td>" . $row['file_type'] . "</td>
            <td>" . $row['name'] . " " . $row['surname'] . "</td>
            <td><button class='btn btn-primary' value='" . $row['id'] . "' name='removeScript' id='removeScript" . $row['id'] . "'><i class='fa-solid fa-trash'></i></button></td>
        </tr>
        ";
    }