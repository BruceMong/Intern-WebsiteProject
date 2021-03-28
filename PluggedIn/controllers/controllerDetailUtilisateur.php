<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'utilisateur';

if ($_SESSION['droits'][0]->consulter_stats_etudiants() != 1 || !isset($_POST['id'])) {
    header('Location:' . URL . 'error');
}

$modelUtilisateur = new ModelUtilisateur($bdd);
$utilisateur = $modelUtilisateur->getUtilisateur($_POST['id']);

$modelProfil = new ModelProfil($bdd);
$profil = $modelProfil->getProfil($utilisateur->id_profil());
$profils = $modelProfil->getProfils();

$modelPromotion = new ModelPromotion($bdd);
$promotion = $modelPromotion->getPromotion($utilisateur->id_promotion());
$promotions = $modelPromotion->getPromotions();

$modelDroit = new ModelDroit($bdd);
$droit = $modelDroit->getDroit($utilisateur->login());


if (isset($_POST['delete'])) {
    $modelUtilisateur->deleteUtilisateur($utilisateur->login());
    header('Location:' . URL . 'searchUtilisateur');
}

if (isset($_POST['nom'])) {

    $errors = array();

    extract($_POST);

    $nom = strip_tags($nom);
    $prenom = strip_tags($prenom);
    $login = strip_tags($login);
    $promo = strip_tags($promo);
    $centre = strip_tags($centre);
    $role = strip_tags($role);

    if (empty($nom))
        array_push($errors, 'Entrez un nom');

    if (empty($prenom))
        array_push($errors, 'Entrez un prenom');

    if (empty($login))
        array_push($errors, 'Entrez un login');

    if (empty($promo))
        array_push($errors, 'Entrez une promotion');

    if (empty($centre))
        array_push($errors, 'Entrez un centre');

    if (empty($role))
        array_push($errors, 'Entrez un role');

    if (count($errors) == 0) {
        $utilisateur->setNom($nom);
        $utilisateur->setPrenom($prenom);
        $utilisateur->setLogin($login);
        $utilisateur->setCentre($centre);

        $promo = $modelPromotion->getPromotionFromName($promo);
        $role = $modelProfil->getProfilFromName($role);

        $utilisateur->setId_promotion($promo->id_promotion());
        $utilisateur->setId_profil($role->id_profil());


        $modelUtilisateur->updateUtilisateur($utilisateur, $utilisateur->login());
        if ($utilisateur->login() != $_POST['id'])
            $modelUtilisateur->updateLogin($utilisateur->login(), $_POST['id']); //peux etre aurait fallut mettre des clés étrangeres


        $success = 'Votre article a bien été modifié';

        unset($nom);
        unset($prenom);
        unset($login);
        unset($centre);
        unset($promo);
        unset($role);
    }
}



if (isset($_POST['modif'])) {
    $errors = array();

    extract($_POST);

    $authentifier = (isset($_POST['authentifier'])) ? 1 : 0;
    $rechercher_entreprise = (isset($_POST['rechercher_entreprise'])) ? 1 : 0;
    $creer_entreprise =  (isset($_POST['creer_entreprise'])) ? 1 : 0;
    $modifier_entreprise = (isset($_POST['modifier_entreprise'])) ? 1 : 0;
    $evaluer_entreprise = (isset($_POST['evaluer_entreprise'])) ? 1 : 0;
    $supprimer_entreprise = (isset($_POST['supprimer_entreprise'])) ? 1 : 0;
    $consulter_stats_entreprises = (isset($_POST['consulter_stats_entreprises'])) ? 1 : 0;
    $rechercher_offre = (isset($_POST['rechercher_offre'])) ? 1 : 0;
    $creer_offre = (isset($_POST['creer_offre'])) ? 1 : 0;
    $modifier_offre = (isset($_POST['modifier_offre'])) ? 1 : 0;
    $supprimer_offre = (isset($_POST['supprimer_offre'])) ? 1 : 0;
    $consulter_stats_offres = (isset($_POST['consulter_stats_offres'])) ? 1 : 0;
    $rechercher_compte_pilote = (isset($_POST['rechercher_compte_pilote'])) ? 1 : 0;
    $creer_compte_pilote = (isset($_POST['creer_compte_pilote'])) ? 1 : 0;
    $modifier_compte_pilote = (isset($_POST['modifier_compte_pilote'])) ? 1 : 0;
    $supprimer_compte_pilote = (isset($_POST['supprimer_compte_pilote'])) ? 1 : 0;
    $assigner_droits_delegue = (isset($_POST['assigner_droits_delegue'])) ? 1 : 0;
    $rechercher_compte_etudiant = (isset($_POST['rechercher_compte_etudiant'])) ? 1 : 0;
    $creer_compte_etudiant = (isset($_POST['creer_compte_etudiant'])) ? 1 : 0;
    $modifier_compte_etudiant = (isset($_POST['modifier_compte_etudiant'])) ? 1 : 0;
    $supprimer_compte_etudiant = (isset($_POST['supprimer_compte_etudiant'])) ? 1 : 0;
    $consulter_stats_etudiants = (isset($_POST['consulter_stats_etudiants'])) ? 1 : 0;
    $ajouter_offre_wish_list = (isset($_POST['ajouter_offre_wish_list'])) ? 1 : 0;
    $retirer_offre_wish_list = (isset($_POST['retirer_offre_wish_list'])) ? 1 : 0;
    $postuler_offre = (isset($_POST['postuler_offre'])) ? 1 : 0;
    $info_sys_avance_candi1 = (isset($_POST['info_sys_avance_candi1'])) ? 1 : 0;
    $info_sys_avance_candi2 = (isset($_POST['info_sys_avance_candi2'])) ? 1 : 0;
    $info_sys_avance_candi3 = (isset($_POST['info_sys_avance_candi3'])) ? 1 : 0;
    $info_sys_avance_candi4 = (isset($_POST['info_sys_avance_candi4'])) ? 1 : 0;
    $info_sys_avance_candi5 = (isset($_POST['info_sys_avance_candi5'])) ? 1 : 0;


    $authentifier = strip_tags($authentifier);
    $rechercher_entreprise = strip_tags($rechercher_entreprise);
    $creer_entreprise = strip_tags($creer_entreprise);
    $modifier_entreprise = strip_tags($modifier_entreprise);
    $evaluer_entreprise = strip_tags($evaluer_entreprise);
    $supprimer_entreprise = strip_tags($supprimer_entreprise);
    $consulter_stats_entreprises = strip_tags($consulter_stats_entreprises);
    $rechercher_offre = strip_tags($rechercher_offre);
    $creer_offre = strip_tags($creer_offre);
    $modifier_offre = strip_tags($modifier_offre);
    $supprimer_offre = strip_tags($supprimer_offre);
    $consulter_stats_offres = strip_tags($consulter_stats_offres);
    $rechercher_compte_pilote = strip_tags($rechercher_compte_pilote);
    $creer_compte_pilote = strip_tags($creer_compte_pilote);
    $modifier_compte_pilote = strip_tags($modifier_compte_pilote);
    $supprimer_compte_pilote = strip_tags($supprimer_compte_pilote);
    $rechercher_compte_delegue = strip_tags($rechercher_compte_delegue);
    $creer_compte_delegue = strip_tags($creer_compte_delegue);
    $modifier_compte_delegue = strip_tags($modifier_compte_delegue);
    $supprimer_compte_delegue = strip_tags($supprimer_compte_delegue);
    $assigner_droits_delegue = strip_tags($assigner_droits_delegue);
    $rechercher_compte_etudiant = strip_tags($rechercher_compte_etudiant);
    $creer_compte_etudiant = strip_tags($creer_compte_etudiant);
    $modifier_compte_etudiant = strip_tags($modifier_compte_etudiant);
    $supprimer_compte_etudiant = strip_tags($supprimer_compte_etudiant);
    $consulter_stats_etudiants = strip_tags($consulter_stats_etudiants);
    $ajouter_offre_wish_list = strip_tags($ajouter_offre_wish_list);
    $retirer_offre_wish_list = strip_tags($retirer_offre_wish_list);
    $postuler_offre = strip_tags($postuler_offre);
    $info_sys_avance_candi1 = strip_tags($info_sys_avance_candi1);
    $info_sys_avance_candi2 = strip_tags($info_sys_avance_candi2);
    $info_sys_avance_candi3 = strip_tags($info_sys_avance_candi3);
    $info_sys_avance_candi4 = strip_tags($info_sys_avance_candi4);
    $info_sys_avance_candi5 = strip_tags($info_sys_avance_candi5);


    // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
    if (count($errors) == 0) {

        $droit->setAuthentifier($authentifier);
        $droit->setRechercher_entreprise($rechercher_entreprise);
        $droit->setCreer_entreprise($creer_entreprise);
        $droit->setModifier_entreprise($modifier_entreprise);
        $droit->setEvaluer_entreprise($evaluer_entreprise);
        $droit->setSupprimer_entreprise($supprimer_entreprise);
        $droit->setConsulter_stats_entreprises($consulter_stats_entreprises);
        $droit->setRechercher_offre($rechercher_offre);
        $droit->setCreer_offre($creer_offre);
        $droit->setModifier_offre($modifier_offre);
        $droit->setSupprimer_offre($supprimer_offre);
        $droit->setConsulter_stats_offres($consulter_stats_offres);
        $droit->setRechercher_compte_pilote($rechercher_compte_pilote);
        $droit->setCreer_compte_pilote($creer_compte_pilote);
        $droit->setModifier_compte_pilote($modifier_compte_pilote);
        $droit->setSupprimer_compte_pilote($supprimer_compte_pilote);
        $droit->setRechercher_compte_delegue($rechercher_compte_delegue);
        $droit->setCreer_compte_delegue($creer_compte_delegue);
        $droit->setModifier_compte_delegue($modifier_compte_delegue);
        $droit->setSupprimer_compte_delegue($supprimer_compte_delegue);
        $droit->setAssigner_droits_delegue($assigner_droits_delegue);
        $droit->setRechercher_compte_etudiant($rechercher_compte_etudiant);
        $droit->setCreer_compte_etudiant($creer_compte_etudiant);
        $droit->setModifier_compte_etudiant($modifier_compte_etudiant);
        $droit->setSupprimer_compte_etudiant($supprimer_compte_etudiant);
        $droit->setConsulter_stats_etudiants($consulter_stats_etudiants);
        $droit->setAjouter_offre_wish_list($ajouter_offre_wish_list);
        $droit->setRetirer_offre_wish_list($retirer_offre_wish_list);
        $droit->setPostuler_offre($postuler_offre);
        $droit->setInfo_sys_avance_candi1($info_sys_avance_candi1);
        $droit->setInfo_sys_avance_candi2($info_sys_avance_candi2);
        $droit->setInfo_sys_avance_candi3($info_sys_avance_candi3);
        $droit->setInfo_sys_avance_candi4($info_sys_avance_candi4);
        $droit->setInfo_sys_avance_candi5($info_sys_avance_candi5);

        $modelDroit->updateDroit($droit, $utilisateur->login());
        $success = 'Votre article a bien été modifié';

        //unset($nom);
    }
}


require_once('views/viewDetailUtilisateur.php');
