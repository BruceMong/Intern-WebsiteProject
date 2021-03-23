<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

$modelComment = new ModelComment($bdd);

// JE VÉRIFIE SI UN COMMENTAIRE EST SUPPRIMÉ
if(!empty($_POST['delete']))
{
    extract($_POST);
    
    $modelComment->deleteComment($comid);

    $success = 'Le commentaire a été supprimé';     
}

$alertComments = $modelComment->getAlertComments();

$t = 'Commentaires signalés';

require_once('views/viewCommentairesSignales.php');