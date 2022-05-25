<?php
    echo "
<div class='modal fade' id='contactsModal'>
    <div class='modal-dialog modal-dialog-centered modal-xl'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Kontakty</h5>   
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
            <form method='POST' action='elements/contacts_management.php'>
                <h5>Dodawanie nowego kontaktu</h5>
                <div class='input-group mb-3'>
                    <input type='text' name='name' placeholder='Imię' class='form-control' />
                    <input type='text' name='surname' placeholder='Nazwisko' class='form-control' />
                    <input type='text' name='description' placeholder='Opis' class='form-control' />
                    <input type='text' name='phone_number' placeholder='Numer telefonu' class='form-control' />
                    <input type='text' name='email' placeholder='Adres e-mail' class='form-control' />
                    <button class='btn btn-primary' name='addContact' type='submit'>Dodaj</button>
                </div>
                <h5>Wszystkie kontakty</h5>
                <input type='text' class='form-control mb-3' placeholder='Filtruj osoby...' id='filtrItPpl'/>    
                <table class='table'>
                    <thead>
                        <th scope='col'>id</th>
                        <th scope='col'>imie</th>
                        <th scope='col'>nazwisko</th>
                        <th scope='col'>numer telefonu</th>
                        <th scope='col'>adres e-mail</th>
                        <th scope='col'>opis</th>
                        <th scope='col'>akcje</th>
                    </thead>
                    <tbody id='contactsTable'>";
                        require "./elements/contacts.php";
                    echo "</tbody>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>
    ";