<?php
session_start();
// SI L'ADMINISTRATEUR EST AUTHENTIFIÉ
if(!empty($_SESSION['admin']))
    // JE LE REDIRIGE VERS LA PAGE "ADMIN"
    header('Location:'.URL.'admin');

// JE VÉRIFIE SI LES IDENTIFIANTS
if(!empty($_POST))
{
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $login = strip_tags($login);
    $pass = strip_tags($pass);

    if(empty($login))
        array_push($errors, 'Entrez votre identifiant');

    if(empty($pass))
        array_push($errors, 'Entrez votre mot de passe');

    // SI LES CHAMPS SONT REMPLIS
    if(!empty($login) && !empty($pass))
    { 
        $modelAdmin = new ModelAdmin($bdd);
        
        // JE VÉRIFIE SI IL Y A UNE CORRESPONDANCE EN BDD
        if(!$modelAdmin->exists($login, $pass))
            array_push($errors, 'Mauvais identifiants');
        else
        {
            $_SESSION['admin'] = $login;
            header('Location:'.URL.'admin');
        }
    }
}

$t = 'Connexion';

require_once('views/viewLogin.php');