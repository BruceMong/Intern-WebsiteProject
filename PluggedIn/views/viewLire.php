<?php require_once('views/header.php'); ?>

</header>
<article id="lire-article" class="container">
    <h1><span>Lire l'article</span></h1>
    <br />
    <a href="admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
    <br /><br />
    <h2><?= ucfirst($article->title()) ?></h2>
    <time>le <?= $article->articleDate() ?></time>
    <p><?= $modelArticle->bbcode_to_html($article->content()) ?></p>
</article>

<?php require_once('views/footer.php'); ?>