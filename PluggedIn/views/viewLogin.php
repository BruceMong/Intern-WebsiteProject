<?php require_once('views/header.php'); ?>

        </header>
        <section id="connexion" class="container">
            <h1>Connexion</h1>
            <br />
            <br />
            <form action="login" method="post">

                <?php 
                // SI LE FORMULAIRE CONTIENT DES ERREURS
                if(!empty($errors)): ?>
                <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
                
                <p><label for="login">Identifiant :</label>
                <input type="text" name="login" id="login" class="form-control" value="<?php if(isset($login)) echo $login; ?>" /></p>
                <br />
                <p><label for="pass">Mot de passe :</label>
                <input type="password" name="pass" id="pass" class="form-control" /></p>
                <br />
                <button type="submit" class="btn btn-default">Connexion</button>
            </form>
        </section>

<?php require_once('views/footer.php'); ?>