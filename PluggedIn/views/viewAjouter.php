<?php require_once('views/header.php'); ?>

        </header>
        <section id="ajouter" class="container">
            <h1><span>Ajouter un article</span></h1>
            <br />
            <a href="admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            <br /><br />
            <form action="ajouter" method="post">
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
                <input type="text" name="title" id="title" class="form-control" value="<?php if(isset($title)) echo $title; ?>" /></p>
                <br />
                <label for="content">Contenu :</label><br />
                <textarea name="content" id="content" class="tinymce" rows="5"><?php if(isset($content)) echo $content; ?></textarea>
                <br />
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </section>

<?php require_once('views/footer.php'); ?>