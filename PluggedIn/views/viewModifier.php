<?php require_once('views/header.php'); ?>

        </header>
        <section id="modifier" class="container">
            <h1><span>Modifier l'article</span></h1>
            <br />
            <a href="admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            <br /><br />
            <form action="modifier&amp;id=<?= $article->id() ?>" method="post">
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
                
                <p><label for="title">Titre :</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $article->title() ?>" /></p>
                <br />
                <label for="content">Contenu :</label><br />
                <textarea name="content" id="content" class="tinymce" rows="5"><?= $article->content() ?></textarea>
                <br />
                <button type="submit" class="btn btn-success">Modifier</button>
            </form>
        </section>

<?php require_once('views/footer.php'); ?>