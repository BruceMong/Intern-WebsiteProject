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

    // JE VÉRIFIE SI UN ARTICLE EST POSTÉ
    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();
        // JE SÉCURISE LES DONNÉES
        $title = strip_tags($title);
        $content = strip_tags($content);

        if(empty($title))
            array_push($errors, 'Entrez un titre');

        if(empty($content))
            array_push($errors, 'Entrez du contenu');

        if(!empty($content) && strlen($content)<15)
            array_push($errors, '15 caractères minimum...');

        // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
        if(count($errors) == 0)
        { 
            $article->setTitle($title);
            $article->setContent($content);

            $modelArticle->updateArticle($article);

            $success = 'Votre article a bien été modifié';

            unset($title);
            unset($content);
        }
    }

    $t = 'Modifier';
    
    require_once('views/viewModifier.php');
}