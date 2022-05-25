<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query = "SELECT users.id, name, surname, email, phone_number, locked, login_tokens.token FROM users, login_tokens WHERE login_tokens.id_user = users.id;";
    $res = mysqli_query($conn, $query);

    $users = array();

    while($row = mysqli_fetch_assoc($res)){
        $locked = $row['locked'];

        if($locked == 0){
            $locked = "Tak";
        } else
            $locked = "Nie";

        echo "
        <tr>
            <td><input type='checkbox' class='form-check-input' name='selectedusr[]' id='remove" . $row['id'] . "' value='" . $row['token'] . "' /></td>
            <th scope='col'>" . $row['id'] . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['surname'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone_number'] . "</td>
            <td>" . $locked . "</td>
        </tr>
        ";

        array_push($users, array($row['id'], $row['token'], $row['name'], $row['surname'], $row['email'], $row['phone_number'], $locked));
    }

    function get_users(){
        global $users;
        return $users;
    }