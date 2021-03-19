<?php require_once('views/header.php'); ?>

        </header>
        <section id="password" class="container">
            <h1><span>Mot de passe</span></h1>
            <br />
            <a href="admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            <br /><br />
            <form action="password" method="post">
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
           
                <p><label for="pass">Mot de passe actuel :</label>
                <input type="password" name="pass" id="pass" class="form-control" value="<?php if(isset($pass)) echo $pass;?>" /></p>
                <br />                
                <p><label for="newpass">Nouveau mot de passe :</label>
                <input type="password" name="newpass" id="newpass" class="form-control" value="<?php if(isset($newpass)) echo $newpass;?>" /></p>
                <br />
                <p><label for="confirm">Confirmation :</label>
                <input type="password" name="confirm" id="confirm" class="form-control" /></p>
                <br />
                <button type="submit" class="btn btn-default">Modifier le mot de passe</button>
            </form>
        </section>

<?php require_once('views/footer.php'); ?>