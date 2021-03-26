<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'offre';

$modelEntreprise = new ModelEntreprise($bdd);
$modelOffer = new ModelOffer($bdd);
$offer = $modelOffer->getOffer($_POST['id']);
$entreprise = $modelEntreprise->getEntrepriseByName($offer->entreprise());

require_once('views/viewDetailOffer.php');
