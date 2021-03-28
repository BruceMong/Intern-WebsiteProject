<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');



$modelEntreprise = new ModelEntreprise($bdd);
$modelOffer = new ModelOffer($bdd);
$modelPromotion = new ModelPromotion($bdd);
$entreprises = $modelEntreprise->getEntreprises();

$promotions = $modelPromotion->getPromotions();

if (!empty($_POST)) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES

    $competences = strip_tags($competences);
    $entreprise = strip_tags($entreprise);
    $type_promo_concerne = strip_tags($type_promo_concerne);
    $duree_offre = strip_tags($duree_offre);
    $base_remuneration = strip_tags($base_remuneration);
    $duree_stage = strip_tags($duree_stage);
    $nombre_place = strip_tags($nombre_place);
    $date = strip_tags($date);

    if (empty($competences))
        array_push($errors, 'Entrez competences ');
    if (empty($entreprise))
        array_push($errors, 'Entrez entreprise');
    if (empty($type_promo_concerne))
        array_push($errors, 'Entrez type_de_promo_concerne');
    if (empty($duree_offre))
        array_push($errors, 'Entrez duree_offre');
    if (empty($base_remuneration))
        array_push($errors, 'Entrez base_remumeration');
    if (empty($duree_stage))
        array_push($errors, 'Entrez duree_stage');
    if (empty($nombre_place))
        array_push($errors, 'Entrez nombre_place');
    if (empty($date))
        array_push($errors, 'Entrez date ');

    // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
    if (count($errors) == 0) {
        $off = new Offer(array('competences' => $competences, 'entreprise' => $entreprise, 'type_promo_concerne' => $type_promo_concerne, 'duree_stage' => $duree_stage, 'base_remuneration' => $base_remuneration, 'duree_offre' => $duree_offre, 'nombre_place' => $nombre_place, 'date' => $date));
        $modelOffer->addOffer($off);
        $success = 'Votre article a bien été publié';
        //header('Location:' . URL . 'searchOffer');
        //unset($title);
    }
}

$t = 'Création d\'offre';

require_once('views/viewCreateOffer.php');
