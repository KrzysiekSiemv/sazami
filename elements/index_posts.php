<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query_posts = "SELECT posts.id, title, content, added_at, posts.updated_at, users.name, users.surname FROM posts LEFT JOIN users ON users.id = posts.id_user";
    $res = mysqli_query($conn, $query_posts);
    while($row = mysqli_fetch_assoc($res)){
        echo "
<tr>
    <td>" . $row['title'] . "</td>
    <td class='content-preview'>" . $row['content'] . "</td>
    <td>" . $row['added_at'] . " przez ";
        if($row['name'] != null){
            echo $row['name'] . " " . $row['surname'];
        } else
            echo "SYSTEM";
        echo "</td>
    <td><button class='btn btn-primary' onclick='location.href=\"post.php?id=" . $row['id'] . "\";'>Zobacz post</button></td>
</tr>
        ";
    }