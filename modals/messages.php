<?php
    echo "
<div class='modal fade' id='messagesModal'>
    <div class='modal-dialog modal-xl modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Wiadomości</h5>
                <button class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
                <h5>Wiadomości wysłane</h5>    
                <input type='text' class='form-control mb-3' placeholder='Filtruj wiadomości...' id='filtrItMsgSent'/>
                    <form method='POST' action='elements/mail_management.php'>
                    <table class='table mb-3'>
                    <thead>
                        <tr>
                            <th scope='col'>id</th>
                            <th scope='col'>nadawca</th>
                            <th scope='col'>temat</th>
                            <th scope='col'>treść</th>
                            <th scope='col'>wysłano</th> 
                            <th scope='col'>akcje</th>
                        </tr>    
                    </thead>
                    <tbody id='messagesSentTable'>";
                    include './elements/sent_mails.php';
                    echo "</tbody>
                </table>
                </form>
                <h5>Wiadomości odebrane</h5>    
                <input type='text' class='form-control mb-3' placeholder='Filtruj wiadomości...' id='filtrItMsgRec'/>
                    <form method='POST' action='elements/mail_management.php'>
                    <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>id</th>
                            <th scope='col'>nadawca</th>
                            <th scope='col'>temat</th>
                            <th scope='col'>treść</th>
                            <th scope='col'>wysłano</th> 
                            <th scope='col'>akcje</th>
                        </tr>    
                    </thead>
                    <tbody id='messagesRecTable'>";
                        include './elements/received_mails.php';
                    echo "</tbody>
                </table>
                </form>
            </div>  
        </div>
    </div>
</div>
    ";