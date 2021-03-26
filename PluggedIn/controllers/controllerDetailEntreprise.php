<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'entreprise';

$modelEntreprise = new ModelEntreprise($bdd);
$entreprise = $modelEntreprise->getEntreprise($_POST['id']);

require_once('views/viewDetailEntreprise.php');
