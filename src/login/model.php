<?php
function model_login()
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {
        } else {
            echo 'Veuillez remplir tous les champs !';
        }
    }
}
