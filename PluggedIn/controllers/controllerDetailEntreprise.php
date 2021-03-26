<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'entreprise';


if($_SESSION['droits']->consulter_stats_entreprises() == 1)
{

$modelEntreprise = new ModelEntreprise($bdd);
$entreprise = $modelEntreprise->getEntreprise($_POST['id']);

require_once('views/viewDetailEntreprise.php');

}