<?php require_once('views/header.php'); ?>

        </header>
        <article id="article" class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= ucfirst($article->title()) ?></h1>
                    <time>le <?= $article->articleDate() ?></time>
                    <p><?= $modelArticle->bbcode_to_html($article->content()) ?></p>
                    <br />
                </div>
            </div>
            <?php 
            // J'AFFICHE UN LIEN VERS L'ARTICLE PRÉCÉDENT SI IL EXISTE
            if($previousArticle): ?>
                <a href="episode&amp;id=<?= $previousArticle->id() ?>" class="link">Episode précédent</a> 
            <?php endif; ?>

            <?php
            // J'AFFICHE UN LIEN VERS L'ARTICLE SUIVANT SI IL EXISTE
            if($nextArticle): ?>
                <a href="episode&amp;id=<?= $nextArticle->id() ?>" class="link">Episode suivant</a>   
            <?php endif; ?>
            <br /><br />
            <div class="add-comment">Laisser un commentaire</div>
        </article>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <!-- FORMULAIRE -->
                    <form id="form" action="episode&amp;id=<?= $article->id() ?>" method="post">
                        <?php 
                        // SI LE FORMULAIRE A BIEN ÉTÉ ENVOYÉ
                        if(isset($success)): ?>
                        <div class="alert alert-success">
                            <p><?= $success ?></p>
                        </div>
                        <?php endif; ?>

                        <?php 
                        // SI LE FORMULAIRE CONTIENT DES ERREURS
                        if(!empty($errors)): ?>
                        <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        
                        <p><label for="author">Votre nom :</label>
                        <input type="text" name="author" id="author" class="form-control" value="<?php if(isset($author)) echo $author; ?>"/></p>
                        <br />
                        <label for="comment">Votre commentaire :</label><br />
                        <textarea name="comment" id="comment" class="form-control" rows="5"><?php if(isset($comment)) echo $comment; ?></textarea>
                        <br />
                        <input type="submit" name="add" class="btn btn-default" value="Envoyer" />
                    </form>
                    <br />
                </div>
            </div>
        </div>
        <hr />
        <div class="container comments">
            <?php
            // SI LE COMMENTAIRE A BIEN ÉTÉ SIGNALÉ
            if(isset($ok)): ?>
            <div class="alert alert-success">
                <p><?= $ok ?></p>
            </div>
            <?php endif; ?>
            
            <h2>Commentaires</h2>
            <div class="row">
                <div class="col-md-12 ajax">
                    <?php
                    // AFFICHAGE DES COMMENTAIRES
                    foreach($comments as $comm): ?>
                        <section>
                            <h3><?= ucfirst($comm->author()) ?></h3>
                            <time>le <?= $comm->commentDate() ?></time>
                            <p><?= $comm->comment() ?></p>
                            <!-- FORMULAIRE -->
                            <form action="index.php?action=episode&amp;id=<?= $article->id() ?>" method="post">
                                <input type="hidden" name="comid" value="<?= $comm->id() ?>" />
                                <input type="submit" name="alert" class="btn btn-default" value="Signaler" onclick="return(confirm('Etes-vous sûr de cette action ?'));" />
                            </form>
                            <!-- -->
                        </section>
                        <br />
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        // SI IL N'Y A PAS DE COMMENTAIRE
        if($comments == null)
            echo '<p class="container">Pas de commentaire sur cette épisode !</p>';
        else
        {
            ?>
            <div class="container">
                <div class="loader">
                    <img src="content/images/ajax-loader.gif" alt="Chargement des commentaires" />
                </div>
                <br />
                <form id="ajax" action="ajax.php?id=<?= $article->id() ?>" method="post">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span> Plus de commentaires</button>
                </form>
            </div>
            <?php
        }

require_once('views/footer.php'); ?>