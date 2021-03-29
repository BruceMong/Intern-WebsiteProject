<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'entreprise';


if ($_SESSION['droits'][0]->consulter_stats_entreprises() != 1) {
    header('Location:' . URL . 'error');
}

$modelEntreprise = new ModelEntreprise($bdd);
$entreprise = $modelEntreprise->getEntreprise($_POST['id']);


//if (!empty($_POST) ) 
if (isset($_POST['modif'])) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $nom = strip_tags($nom);
    $secteur_activite = strip_tags($secteur_activite);
    $nombre_stagiaire_cesi = strip_tags($nombre_stagiaire_cesi);
    $confiance_pilote = strip_tags($confiance_pilote);
    $evaluation_entreprise = strip_tags($evaluation_entreprise);
    $image = strip_tags($image);
    $localite = strip_tags($localite);
    $mail = strip_tags($mail);



    if (empty($nom))
        array_push($errors, 'Entrez nom entreprise');

    if (empty($secteur_activite))
        array_push($errors, 'Entrez secteur d\'activité ');

    if (empty($nombre_stagiaire_cesi))
        array_push($errors, 'Entrez nombre stagiaire cesi');

    if (empty($confiance_pilote))
        array_push($errors, 'Entrez confiance pilote');

    if (empty($evaluation_entreprise))
        array_push($errors, 'Entrez evaluation entreprise');

    if (empty($image))
        array_push($errors, 'Entrez image');

    if (empty($localite))
        array_push($errors, 'Entrez localite');

    if (empty($mail))
        array_push($errors, 'Entrez mail');

    // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
    if (count($errors) == 0) {

        $entreprise->setNom($nom);
        $entreprise->setSecteur_activite($secteur_activite);
        $entreprise->setNombre_stagiaire_cesi($nombre_stagiaire_cesi);
        $entreprise->setConfiance_pilote($confiance_pilote);
        $entreprise->setEvaluation_entreprise($evaluation_entreprise);
        $entreprise->setImage($image);
        $entreprise->setLocalite($localite);
        $entreprise->setMail($mail);

        $modelEntreprise->updateEntreprise($entreprise);

        $success = 'Votre article a bien été publié';
        header('Location:' . URL . 'searchEntreprise');
    }
}



require_once('views/viewDetailEntreprise.php');
