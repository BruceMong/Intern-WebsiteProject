<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');


if ($_SESSION['droits'][0]->creer_entreprise() != 1) {
    header('Location:' . URL . 'error');
}


$modelEntreprise = new ModelEntreprise($bdd);


// JE VÉRIFIE SI UN ARTICLE EST POSTÉ
if (!empty($_POST)) {
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
        $ent = new Entreprise(array('nom' => $nom, 'secteur_activite' => $secteur_activite, 'nombre_stagiaire_cesi' => $nombre_stagiaire_cesi, 'confiance_pilote' => $confiance_pilote, 'evaluation_entreprise' => $evaluation_entreprise, 'image' => $image, 'localite' => $localite, 'mail' => $mail));
        $modelEntreprise->addEntreprise($ent);
        $success = 'Votre article a bien été publié';
        header('Location:' . URL . 'searchEntreprise');

        //unset($title);
    }
}



$t = 'Création Entreprise';

require_once('views/viewCreateEntreprise.php');
