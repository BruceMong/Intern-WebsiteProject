<?php require_once('views/header.php'); ?>

        </header>
        <section id="commentaires-signales" class="container">
            <h1><span>Commentaires signalés</span></h1>
            <br />
            <a href="admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            <br /><br />
            <?php 
            // SI LE SUBMIT C'EST BIEN PASSÉ
            if(isset($success)): ?>
            <div class="alert alert-success">
                <p><?= $success ?></p>
            </div>
            <?php endif; ?>
            
            <?php
            // SI IL N'Y A PAS DE COMMENTAIRE SIGNALÉ
            if($alertComments == null){
                echo '<p>Pas de commentaire sur signalé</p>';
                exit;
            }
            ?>
            <article>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Auteurs</th>
                        <th>Commentaires</th>
                        <th>Dates commentaires</th>
                        <th>Signalements</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    // J'AFFICHE LES COMMENTAIRES SIGNALÉS
                    foreach($alertComments as $alertComment): ?>
                        <tr>
                            <td><?= ucfirst($alertComment->author()) ?></td>
                            <td><?= $alertComment->comment() ?></td>
                            <td>le <?= $alertComment->commentDate() ?></td>
                            <td class="text-danger"><?= $alertComment->alert() ?> signalement(s)</td>
                            <!-- FORMULAIRE -->
                            <form action="commentairesSignales" method="post">
                                <input type="hidden" name="comid" value="<?= $alertComment->id() ?>" />
                                <td><input type="submit" name="delete" class="btn btn-danger" value="Supprimer" onclick="return(confirm('Etes-vous sûr de cette action ?'));" /></td>
                            </form>
                            <!-- -->
                        </tr>
                    <?php endforeach; ?>
                </table>
            </article>
        </section>

<?php require_once('views/footer.php'); ?>