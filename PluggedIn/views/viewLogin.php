<?php require_once('views/header.php'); ?>

<div class = blocLogin>
        <section id="connexion" class="container">
            <h1>Connexion</h1>
            <br/>
            <br/>
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
                <p><label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" id="pass" class="form-control" /></p>
                <br />
                <button type="submit" class="btn btn-default">Connexion</button>
            </form>
        </section>
</div>

                <script type="text/javascript">
                   
                    document.querySelector(".login").style.display = "none";
                </script>

<?php require_once('views/footer.php'); ?>