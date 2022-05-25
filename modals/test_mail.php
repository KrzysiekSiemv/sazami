<?php
    echo "
    <div class='modal fade' id='testMailModal'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Testowa wiadomość</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <p>Naciśnij przycisk, aby wysłać testową wiadomość</p>
                    <form method='POST' action='elements/send_mail.php'>
                        <button class='btn btn-primary' type='submit' name='sendMail'>Wyślij wiadomość testową</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";