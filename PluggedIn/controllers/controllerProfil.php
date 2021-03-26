<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

    

$modelUtilisateur = new ModelUtilisateur($bdd);
$utilisateur = $modelUtilisateur->getUtilisateur($_SESSION['utilisateur']);

$modelProfil = new ModelProfil($bdd);
$profil = $modelProfil->getProfil($utilisateur->id_profil());

$modelPromotion = new ModelPromotion($bdd);
$promotion = $modelPromotion->getPromotion($utilisateur->id_promotion());

$modelDroit = new ModelDroit($bdd);
$droit = $modelDroit->getDroit($_SESSION['utilisateur']);

$t = 'Profil ' . $utilisateur->prenom();

require_once('views/viewProfil.php');
