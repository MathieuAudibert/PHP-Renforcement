<?php
function model_login()
{
    if ($_POST['email'] === 'oui@oui.com' && $_POST['password'] === 'oui') {
        return true;  // Connexion réussie
    } else {
        throw new Exception('Email ou mot de passe incorrect');
    }
}
