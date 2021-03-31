<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'offre';


if ($_SESSION['droits'][0]->consulter_stats_offres() != 1) {
    header('Location:' . URL . 'error');
}

$modelEntreprise = new ModelEntreprise($bdd);
$modelOffer = new ModelOffer($bdd);
$offer = $modelOffer->getOffer($_POST['id']);
$modelPromotion = new ModelPromotion($bdd);
$promotions = $modelPromotion->getPromotions();

$modelWish_list = new ModelWish_list($bdd);


$entreprises = $modelEntreprise->getEntreprises();


if (isset($_POST['wish_listP'])) {
    if ($_POST['wish_listP'] == "delete")
        $modelWish_list->deleteWish_list($_SESSION['utilisateur'], $offer->id_offre());
    if ($_POST['wish_listP'] == "add")
        $modelWish_list->addWish_list($_SESSION['utilisateur'], $offer->id_offre());
}


if (isset($_POST['delete'])) {
    $modelOffer->deleteOffer($offer->id_offre());
    header('Location:' . URL . 'searchOffer');
}

//if (!empty($_POST) ) 
if (isset($_POST['modif'])) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $entreprise = strip_tags($entreprise);
    $competences = strip_tags($competences);
    $type_promo_concerne = strip_tags($type_promo_concerne);
    $duree_stage = strip_tags($duree_stage);
    $duree_offre = strip_tags($duree_offre);
    $nombre_place = strip_tags($nombre_place);
    $base_remuneration = strip_tags($base_remuneration);
    $date = strip_tags($date);



    if (empty($entreprise))
        array_push($errors, 'Entrez nom entreprise');


    // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
    if (count($errors) == 0) {

        $offer->setEntreprise($entreprise);
        $offer->setCompetences($competences);
        $offer->setType_promo_concerne($type_promo_concerne);
        $offer->setDuree_stage($duree_stage);
        $offer->setDuree_offre($duree_offre);
        $offer->setNombre_place($nombre_place);
        $offer->setBase_remuneration($base_remuneration);
        $offer->setDate($date);

        $modelOffer->updateOffer($offer);

        $success = 'Votre article a bien été publié';
        //header('Location:' . URL . 'searchOffer');
    }
}

$entreprise = $modelEntreprise->getEntrepriseByName($offer->entreprise());

require_once('views/viewDetailOffer.php');
