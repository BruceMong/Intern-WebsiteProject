<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

// JE VÉRIFIE LE PARAMÈTRE GET
if(empty($_GET['id']) OR !is_numeric($_GET['id']))
    throw new Exception('Page introuvable'); 
else
{
    extract($_GET);
    $id = strip_tags($id);
    
    $modelArticle = new ModelArticle($bdd);

    // JE RÉCUPÈRE L'ARTICLE CORRESPONDANT AU GET, SI IL EXISTE
    $article = $modelArticle->getArticle($id); 

    $t = 'Lire l\'article';
    
    require_once('views/viewLire.php');
}