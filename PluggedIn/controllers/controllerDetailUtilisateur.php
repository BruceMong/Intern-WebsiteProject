<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'utilisateur';

if($_SESSION['droits'][0]->consulter_stats_etudiants() != 1)
{
    header('Location:' . URL . 'error');
}
$modelUtilisateur = new ModelUtilisateur($bdd);
$utilisateur = $modelUtilisateur->getUtilisateur($_POST['id']);

$modelProfil = new ModelProfil($bdd);
$profil = $modelProfil->getProfil($utilisateur->id_profil());

$modelPromotion = new ModelPromotion($bdd);
$promotion = $modelPromotion->getPromotion($utilisateur->id_promotion());

$modelDroit = new ModelDroit($bdd);
$droit = $modelDroit->getDroit($utilisateur->id_users());

require_once('views/viewDetailUtilisateur.php');
