<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'entreprise';


if($_SESSION['droits'][0]->consulter_stats_entreprises() != 1)
{
    header('Location:' . URL . 'error');
}

$modelEntreprise = new ModelEntreprise($bdd);
$entreprise = $modelEntreprise->getEntreprise($_POST['id']);

require_once('views/viewDetailEntreprise.php');

