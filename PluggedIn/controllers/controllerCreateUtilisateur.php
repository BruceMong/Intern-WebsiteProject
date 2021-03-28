<?php

session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');


$modelUtilisateur = new ModelUtilisateur($bdd);

$modelProfil = new ModelProfil($bdd);

$modelPromotion = new ModelPromotion($bdd);

$modelDroit = new ModelDroit($bdd);

$profils = $modelProfil->getProfils();
$promotions = $modelPromotion->getPromotions();

if (!empty($_POST)) {

    $errors = array();

    extract($_POST);

    $nom = strip_tags($nom);
    $prenom = strip_tags($prenom);
    $login = strip_tags($login);
    $promotion = strip_tags($promotion);
    $centre = strip_tags($centre);
    $role = strip_tags($role);
    $mot_de_passe = strip_tags($mot_de_passe);

    if (empty($nom))
        array_push($errors, 'Entrez un nom');

    if (empty($prenom))
        array_push($errors, 'Entrez un prenom');

    if (empty($login))
        array_push($errors, 'Entrez un login');

    if (empty($promotion))
        array_push($errors, 'Entrez une promotion');

    if (empty($centre))
        array_push($errors, 'Entrez un centre');

    if (empty($role))
        array_push($errors, 'Entrez un role');

    if (empty($mot_de_passe))
        array_push($errors, 'Entrez un mot de passe');

    if (count($errors) == 0) {

        if ($role == "Etudiant") {
            $modelDroit->addDroitEtudiant($login);
        }
        if ($role == "Pilote") {
            $modelDroit->addDroitPilote($login);
        }

        $promotion = $modelPromotion->getPromotionFromName($promotion);
        $role = $modelProfil->getProfilFromName($role);

        $uti = new Utilisateur(array('nom' => $nom, 'prenom' => $prenom, 'login' => $login, 'mot_de_passe' => $mot_de_passe, 'centre' => $centre, 'id_promotion' => $promotion->id_promotion(), 'id_profil' => $role->id_profil()));

        $modelUtilisateur->addUtilisateur($uti);
        //header('Location:' . URL . 'searchUtilisateur');

        $success = 'Votre article a bien été Créer';

        unset($nom);
        unset($prenom);
        unset($login);
        unset($centre);
        unset($promo);
        unset($role);
    }
}



$t = 'Création d\'utilisateur';

require_once('views/viewCreateUtilisateur.php');
