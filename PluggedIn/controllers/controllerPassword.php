<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

$modelAdmin = new ModelAdmin($bdd);

// JE RÉCUPÈRE LES INFOS SUR L'ADMIN
$admin = $modelAdmin->getAdmin($_SESSION['admin']);

// JE VÉRIFIE LA MODIFICATION DU MOT DE PASSE
if(!empty($_POST))
{
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $pass = strip_tags($pass);
    $newpass = strip_tags($newpass);
    $confirm = strip_tags($confirm);

    if(empty($pass))
        array_push($errors, 'Entrez le mot de passe actuel');
    
    if(!empty($pass) && sha1($pass) != $admin->pass())
        array_push($errors, 'Le mot de passe actuel n\'est pas bon');
    
    if(empty($newpass))
        array_push($errors, 'Entrez le nouveau mot de passe');

    if(!empty($newpass) && strlen($newpass)<6)
        array_push($errors, '6 caractères minimum...');

    if($confirm != $newpass)
        array_push($errors, 'Le mot de passe de confirmation ne correspond pas');

    // SI TOUT EST OK, LE MOT DE PASSE EST MODIFÉ
    if(count($errors) == 0)
    { 
        $admin->setPass(sha1($newpass));
        
        $modelAdmin->updatePass($admin);

        $success = 'Votre mot de passe a bien été modifié';

        unset($pass);
        unset($newpass);
        unset($confirm);
    }
}

$t = 'Mot de passe';

require_once('views/viewPassword.php');