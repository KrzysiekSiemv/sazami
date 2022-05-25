    const usersfiltrbox = document.getElementById("filtrItUsr");
    const userstable = document.getElementById("usersTable");

    const postsfiltrbox = document.getElementById("filtrItPosts");
    const poststable = document.getElementById("postsTable");

    const messagesSentfiltrbox = document.getElementById("filtrItMsgSent");
    const messagesSenttable = document.getElementById("messagesSentTable");

    const messagesRecfiltrbox = document.getElementById("filtrItMsgRec");
    const messagesRectable = document.getElementById("messagesRecTable");

    const contactsfiltrbox = document.getElementById("filtrItPpl");
    const contactstable = document.getElementById("contactsTable");

    function users_fun(users){
        usersfiltrbox.addEventListener("keyup", function (e) {
            userstable.innerHTML = "";
            for(let i = 0; i < users.length; i++){
                if(users[i][2].includes(usersfiltrbox.value) || users[i][3].includes(usersfiltrbox.value) || users[i][4].includes(usersfiltrbox.value) || users[i][5].includes(usersfiltrbox.value)){
                    userstable.innerHTML += `<tr>
                <td><input type='checkbox' class='form-check-input' name='selectedusr[]' id='remove` + users[i][0] + `' value='` + users[i][1] + `' /></td>
                <th scope='col'>` + users[i][0] + `</th>
                <td>` + users[i][2] + `</td>
                <td>` + users[i][3] + `</td>
                <td>` + users[i][4] + `</td>
                <td>` + users[i][5] + `</td>
                <td>` + users[i][6] + `</td>
            </tr>`;
                }
            }
        });
    }

    function posts_fun(posts){
        postsfiltrbox.addEventListener("keyup", function (e){
            poststable.innerHTML = "";
            for(let i = 0; i < posts.length; i++){
                if(posts[i][1].includes(postsfiltrbox.value) || posts[i][2].includes(postsfiltrbox.value) || posts[i][3].includes(postsfiltrbox.value) || posts[i][4].includes(postsfiltrbox.value)){
                    poststable.innerHTML += `
                        <tr>
                            <th scope='col'>` + posts[i][0] + `</th>
                            <td><a href="post.php?id=` + posts[i][0] + `">` + posts[i][1] + `</a></td>
                            <td class='content-preview'>` + posts[i][2] + `</td>
                            <td>` + posts[i][3] + `</td>
                            <td>` + posts[i][4] + `</td>
                            <td>
                                <div class='btn-group'>
                                    <button class='btn btn-primary' value='` + posts[i][0] + `' name='editPost[]' id='editPost` + posts[i][0] + `'><i class='fa-solid fa-pencil'></i></button>
                                    <button class='btn btn-primary' value='` + posts[i][0] + `' name='removePost' id='removePost` + posts[i][0] + `'><i class='fa-solid fa-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                    `;
                }
            }
        });
    }

    function messages_sent_fun(messages){
        messagesSentfiltrbox.addEventListener("keyup", function (e){
            messagesSenttable.innerHTML = "";
           for(let i = 0; i < messages.length; i++){
               if(messages[i][1].includes(messagesSentfiltrbox.value) || messages[i][2].includes(messagesSentfiltrbox.value) || messages[i][3].includes(messagesSentfiltrbox.value) || messages[i][4].includes(messagesSentfiltrbox.value) || messages[i][5].includes(messagesSentfiltrbox.value)){
                   messagesSenttable.innerHTML += `
                   <tr>
                        <td>` + messages[i][0] + `</td>
                        <td>` + messages[i][1] + `<br>` + messages[i][2] + `</td>
                        <td>` + messages[i][3] + `</td>
                        <td>` + messages[i][4] + `</td>
                        <td>` + messages[i][5] + `</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="replyMsg" value="` + messages[i][0] + `"><i class='fa-solid fa-reply'></i></button>
                                <button class="btn btn-primary" name="deleteMsg" value="` + messages[i][0] + `"><i class='fa-solid fa-trash'></i></button>
                            </div>
                        </td>
                   </tr>
                   `;
               }
           }
        });
    }

    function messages_received_fun(messages){
        messagesRecfiltrbox.addEventListener("keyup", function (e){
            messagesRectable.innerHTML = "";
            for(let i = 0; i < messages.length; i++){
                if(messages[i][1].includes(messagesRecfiltrbox.value) || messages[i][2].includes(messagesRecfiltrbox.value) || messages[i][3].includes(messagesRecfiltrbox.value) || messages[i][4].includes(messagesRecfiltrbox.value) || messages[i][5].includes(messagesRecfiltrbox.value)){
                    messagesRectable.innerHTML += `
                   <tr>
                        <td>` + messages[i][0] + `</td>
                        <td>` + messages[i][1] + `<br>` + messages[i][2] + `</td>
                        <td>` + messages[i][3] + `</td>
                        <td>` + messages[i][4] + `</td>
                        <td>` + messages[i][5] + `</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="replyMsg" value="` + messages[i][0] + `"><i class='fa-solid fa-reply'></i></button>
                                <button class="btn btn-primary" name="deleteMsg" value="` + messages[i][0] + `"><i class='fa-solid fa-trash'></i></button>
                            </div>
                        </td>
                   </tr>
                   `;
                }
            }
        });
    }

    function contacts_fun(contacts){
        contactsfiltrbox.addEventListener("keyup", function (e){
           contactstable.innerHTML = "";
           for(let i = 0; i < contacts.length; i++){
               if(contacts[i][1].includes(contactsfiltrbox.value) || contacts[i][2].includes(contactsfiltrbox.value) || contacts[i][3].includes(contactsfiltrbox.value) || contacts[i][4].includes(contactsfiltrbox.value) || contacts[i][5].includes(contactsfiltrbox.value)){
                   contactstable.innerHTML += `
                   <tr>
                        <th scope="col">` + contacts[i][0] + `</th>
                        <td>` + contacts[i][1] + `</td>
                        <td>` + contacts[i][2] + `</td>
                        <td>` + contacts[i][3] + `</td>
                        <td>` + contacts[i][4] + `</td>
                        <td>` + contacts[i][5] + `</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="sendMsg" value="` + contacts[i][0] + `" onclick='location.href="mailing.php?send_to=` + contacts[i][0] + `"'><i class="fa-solid fa-paper-plane"></i></button>
                                <button class="btn btn-primary" name="editContact" value="` + contacts[i][0] + `" onclick='location.href="edit_contact.php?id=` + contacts[i][0] + `'><i class="fa-solid fa-pencil"></i></button>
                                <button class="btn btn-primary" name="removeContact" value="` + contacts[i][0] + `"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                   </tr>
                   `;
               }
           }
        });
    }

