<?php
// JE VÉRIFIE LE PARAMÈTRE GET
if(empty($_GET['id']) OR !is_numeric($_GET['id']))
    throw new Exception('Page introuvable'); 
else
{
    extract($_GET);
    $id = strip_tags($id);
    
    $modelArticle = new ModelArticle($bdd);
    $modelComment = new ModelComment($bdd);
    
    // JE VÉRIFIE SI UN COMMENTAIRE EST POSTÉ
    if(!empty($_POST['add']))
    {
        extract($_POST);
        $errors = array();
        // JE SÉCURISE LES DONNÉES
        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if(empty($author))
            array_push($errors, 'Entrez votre nom');

        if(!empty($author) && strlen($author)<3)
            array_push($errors, '3 caractères minimum...');

        if(empty($comment))
            array_push($errors, 'Entrez votre commentaire');

        if(!empty($comment) && strlen($comment)<15)
            array_push($errors, '15 caractères minimum...');

        // SI TOUT EST OK, LE COMMENTAIRE EST AJOUTÉ EN BDD
        if(count($errors) == 0)
        { 
            // AJOUT DU COMMENTAIRE EN BDD
            $com = new Comment(array('articleId'=>$id, 'author'=>$author, 'comment'=>$comment));
            $modelComment->addComment($com);

            $success = 'Votre commentaire a été publié';

            unset($author);
            unset($comment);
        }
    }

    // JE VÉRIFIE UN COMMENTAIRE EST SIGNALÉ
    if(!empty($_POST['alert']))
    {
        extract($_POST);

        $modelComment->alertComment($comid);

        $ok = 'Le commentaire a été signalé';     
    }

    // JE RÉCUPÈRE L'ARTICLE CORRESPONDANT AU GET, SI IL EXISTE
    $article = $modelArticle->getArticle($id);   

    // JE RÉCUPÈRE L'ARTICLE PRÉCÉDENT, SI IL EXISTE
    $previousArticle = $modelArticle->getPreviousArticle($id);   

    // JE RÉCUPÈRE L'ARTICLE SUIVANT, SI IL EXISTE
    $nextArticle = $modelArticle->getNextArticle($id);               

    // JE RÉCUPÈRE LES 3 PREMIERS COMMENTAIRES ASSOCIÉS À CETTE ARTICLE
    $comments =  $modelComment->getComments($id, 0);

    // JE RÉCUPÈRE LE NOMBRE DE COMMENTAIRES ASSOCIÉS À CETTE ARTICLE
    $countComments = $modelComment->countComments($id);

    $t = $article->title();
    
    require_once('views/viewEpisode.php');
}


