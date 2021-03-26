<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Wish_List';


// On détermine sur quelle page on se trouve
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}

$modelWish_list = new ModelWish_list($bdd);
$nbArticle = $modelWish_list->countWish_list();
$parPage = 5;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;


//$utilisateurs = $modelUtilisateur->getUtilisateurs();
$wish_list = $modelWish_list->getWish_listPagination($premier, $parPage, 'Bruce.Mongthe');

$modelOffer = new ModelOffer($bdd);








require_once('views/viewWish_list.php');
