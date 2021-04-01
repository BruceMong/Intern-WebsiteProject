<?php
session_start();
// SI L'ADMINISTRATEUR EST AUTHENTIFIÉ
if (!empty($_SESSION['utilisateur']))
    // JE LE REDIRIGE VERS LA PAGE "accueil"
    header('Location:' . URL . 'accueil');


// JE VÉRIFIE SI LES IDENTIFIANTS
if (!empty($_POST)) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $login = strip_tags($login);
    $mot_de_passe = strip_tags($mot_de_passe);

    if (empty($login))
        array_push($errors, 'Entrez votre identifiant');

    if (empty($mot_de_passe))
        array_push($errors, 'Entrez votre mot de passe');

    // SI LES CHAMPS SONT REMPLIS
    if (!empty($login) && !empty($mot_de_passe)) {
        $modelUtilisateur = new ModelUtilisateur($bdd);

        // JE VÉRIFIE SI IL Y A UNE CORRESPONDANCE EN BDD
        if (!$modelUtilisateur->exists($login, $mot_de_passe))
            array_push($errors, 'Mauvais identifiants');
        else {
            $modelDroit = new ModelDroit($bdd);
            $_SESSION['utilisateur'] = $login;
            $_SESSION['droits'] = $modelDroit->getDroits($login);



            header('Location:' . URL . 'accueil');



        }
    }
}

$t = 'Connexion';

require_once('views/viewLogin.php');
