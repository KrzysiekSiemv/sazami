<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query = mysqli_query($conn, "SELECT * FROM contacts");
    $contacts = array();
    while($row = mysqli_fetch_assoc($query)) {
        echo "
        <tr>
            <th scope='col'>" . $row['id'] . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['surname'] . "</td>
            <td>" . $row['phone_number'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>
                <div class='btn-group'>
                    <button class='btn btn-primary' name='sendMsg' value='" . $row['id'] . "'><i class='fa-solid fa-paper-plane'></i></button>
                    <button class='btn btn-primary' name='editContact' value='" . $row['id'] . "'><i class='fa-solid fa-pencil'></i></button>
                    <button class='btn btn-primary' name='removeContact' value='" . $row['id'] . "'><i class='fa-solid fa-trash'></i></button>
                </div>
            </td>
        </tr>";

        array_push($contacts, array($row['id'], $row['name'], $row['surname'], $row['phone_number'], $row['email'], $row['description']));
    }

    function get_contacts(){
        global $contacts;
        return $contacts;
    }