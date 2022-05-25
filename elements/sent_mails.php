<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $query = "SELECT * FROM messages WHERE type = 'sent';";
    $res = mysqli_query($conn, $query);

    $messages_sent = array();

    while ($row = mysqli_fetch_assoc($res)) {
        echo "
                <tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "<br>" . $row['email'] . "</td>
                    <td>" . $row['topic'] . "</td>
                    <td>" . $row['message'] . "</td>
                    <td>" . $row['sent_at'] . "</td>
                    <td>
                        <div class='btn-group'>
                            <button 
                                class='btn btn-primary' 
                                name='replyMsg'
                                value='" . $row['id'] . "'><i class='fa-solid fa-reply'></i></button>
                            <button class='btn btn-primary' name='deleteMsg' value='" . $row['id'] . "'><i class='fa-solid fa-trash'></i></button>
                        </div>
                    </td>
                </tr>
            ";
            array_push($messages_sent, array($row['id'], $row['name'], $row['email'], $row['topic'], $row['message'], $row['sent_at']));
    }

    function get_sent()
    {
        global $messages_sent;
        return $messages_sent;
    }