<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query = "SELECT posts.*, users.name, users.surname FROM posts LEFT JOIN users ON users.id = posts.id_user;";
    $res = mysqli_query($conn, $query);

    $posts = array();

    while ($row = mysqli_fetch_assoc($res)){
        $name = "";
        if($row['name'] == null && $row['surname'] == null)
            $name = "SYSTEM";
        else
            $name = $row['name'] . " " . $row['surname'];
        echo "
        <tr>
            <th scope='col'>" . $row['id'] . "</th>
            <td><a href='post.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td>
            <td class='content-preview'>" . $row['content'] . "</td>
            <td>" . $row['added_at'] . "</td>
            <td>" . $name . "</td>
            <td>
                <div class='btn-group'>
                    <button class='btn btn-primary' value='" . $row['id'] . "' name='editPost' id='editPost" . $row['id'] . "'><i class='fa-solid fa-pencil'></i></button> 
                    <button class='btn btn-primary' value='" . $row['id'] . "' name='removePost' id='removePost" . $row['id'] . "'><i class='fa-solid fa-trash'></i></button> 
                </div> 
            </td>
        </tr>
        ";

        array_push($posts, array($row['id'], $row['title'], $row['content'], $row['added_at'], $name));
    }

    function get_posts(){
        global $posts;
        return $posts;
    }