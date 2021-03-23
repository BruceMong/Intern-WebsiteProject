<?php require_once('views/header.php'); ?>

</header>
<section id="admin" class="container">
    <a href="disconnect" class="btn btn-danger disconnect"><span class="glyphicon glyphicon-remove-sign"></span> Déconnexion</a>
    <br />
    <div>
        <h1><span>Admin</span></h1>
        <?php
        // J'AFFICHE LE LIEN VERS LES COMMENTAIRES SIGNALÉS UNIQUEMENT SI IL Y EN A
        if ($alertComments != 0) : ?>
            <a href="commentairesSignales"><span class="glyphicon glyphicon-exclamation-sign"></span> <?= $alertComments ?> commentaire(s)</a>
        <?php endif; ?>
    </div>
    <br />
    <div>
        <a href="ajouter" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouer un article</a>
        <a href="password" class="btn btn-primary">Mot de passe</a>
    </div>
    <br />
    <?php
    // SI LE SUBMIT C'EST BIEN PASSÉ
    if (isset($success)) : ?>
        <div class="alert alert-success">
            <p><?= $success ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Lire</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        // J'AFFICHE TOUS LES ARTICLES
        foreach ($articles as $article) : ?>
            <tr>
                <td><?= ucfirst($article->title()) ?></td>
                <td><?= $modelArticle->bbcode_to_html(substr($article->content(), 0, 150)) ?>...</td>
                <td>le <?= $article->articleDate() ?></td>
                <td><a href="lire&amp;id=<?= $article->id() ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Lire l'article</a></td>
                <td><a href="modifier&amp;id=<?= $article->id() ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Modifier</a></td>
                <!-- FORMULAIRE -->
                <form action="admin" method="post">
                    <input type="hidden" name="art" value="<?= $article->id() ?>" />
                    <td><input type="submit" name="delete" class="btn btn-danger" value="Supprimer" onclick="return(confirm('Etes-vous sûr de cette action ?'));" /></td>
                </form>
                <!-- -->
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php require_once('views/footer.php'); ?>