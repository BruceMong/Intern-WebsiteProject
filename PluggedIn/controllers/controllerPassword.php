<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if (empty($_SESSION['admin']))
    header('Location:' . URL . 'login');

$modelAdmin = new ModelUtilisateur($bdd);

// JE RÉCUPÈRE LES INFOS SUR L'ADMIN
$utilisateur = $modelUtilisateur->getUtilisateur($_SESSION['utilisateur']);

// JE VÉRIFIE LA MODIFICATION DU MOT DE PASSE
if (!empty($_POST)) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $mot_de_passe = strip_tags($mot_de_passe);
    $new_mot_de_passe = strip_tags($new_mot_de_passe);
    $confirm = strip_tags($confirm);

    if (empty($pass))
        array_push($errors, 'Entrez le mot de passe actuel');

    if (!empty($mot_de_passe) && sha1($mot_de_passe) != $utilisateur->mot_de_passe())
        array_push($errors, 'Le mot de passe actuel n\'est pas bon');

    if (empty($newpass))
        array_push($errors, 'Entrez le nouveau mot de passe');

    if (!empty($newpass) && strlen($newpass) < 6)
        array_push($errors, '6 caractères minimum...');

    if ($confirm != $newpass)
        array_push($errors, 'Le mot de passe de confirmation ne correspond pas');

    // SI TOUT EST OK, LE MOT DE PASSE EST MODIFÉ
    if (count($errors) == 0) {
        $utilisateur->setPass(sha1($new_mot_de_passe));

        $modelmot_de_passe->updatePass($utilisateur);

        $success = 'Votre mot de passe a bien été modifié';

        unset($mot_de_passe);
        unset($newpass);
        unset($confirm);
    }
}

$t = 'Mot de passe';

require_once('views/viewPassword.php');
