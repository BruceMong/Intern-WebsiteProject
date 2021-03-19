<?php
require_once('config/connect.php');

$self = htmlspecialchars($_SERVER['PHP_SELF']);
define('URL', str_replace("ajax.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$self"));

// CHARGEMENT AUTOMATIQUE DES CLASSES
spl_autoload_register(function($class){
    require('models/' .$class . '.php');
});

$modelArticle = new ModelArticle($bdd);
$modelComment = new ModelComment($bdd);

if(empty($_POST))
    header('Location:'.URL);
else
{
    $id = strip_tags($_GET['id']);
    $limit = strip_tags($_POST['load']) * 3;

    // JE RÉCUPÈRE L'ARTICLE CORRESPONDANT AU GET
    $article = $modelArticle->getArticle($id);

    // JE RÉCUPÈRE LES 3 COMMENTAIRES SUIVANTS ASSOCIÉS À CETTE ARTICLE
    $comments =  $modelComment->getComments($id, $limit);

    // AFFICHAGE DE TOUS LES COMMENTAIRES
    foreach($comments as $comm): ?>
        <section>
            <h3><?= ucfirst($comm->author()) ?></h3>
            <time>le <?= $comm->commentDate() ?></time>
            <p><?= $comm->comment() ?></p>
            <!-- FORMULAIRE -->
            <form action="episode&amp;id=<?= $article->id() ?>" method="post">
                <input type="hidden" name="comid" value="<?= $comm->id() ?>" />
                <input type="submit" name="alert" class="btn btn-default" value="Signaler" onclick="return(confirm('Etes-vous sûr de cette action ?'));" />
            </form>
            <!-- -->
        </section>
        <br />
    <?php endforeach;  
}