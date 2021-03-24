<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<a href="disconnect" class="btn btn-danger disconnect"><span class="glyphicon glyphicon-remove-sign"></span> Déconnexion</a>

<<<<<<< HEAD
=======
    <a href="disconnect" class="btn btn-danger disconnect"><span class="glyphicon glyphicon-remove-sign"></span> Déconnexion</a>
<<<<<<< HEAD
    <?php //if (checkAdmin()) 
    ?>
=======
    
>>>>>>> ea782442ca48cbdadf0578b78d1fcc95000e8d41
>>>>>>> e8d8cad0654820213aaaece3da86c077950234a0

<div class="profil-container">

    <div class="detail_profil">
        <h1><span>Profil</span></h1>
        <img src="" alt="error">
        <h2>Nom : </h2>
        <h2>Preom : </h2>
        <p>Login : </p>
        <p>Promo : </p>
        <p>Centre : </p>
        <p>Role : </p>
    </div>
    <div class="permission_profil">
        <table>
            <thead>
                <th>Permission</th>
                <th>Autorisation</th>
            </thead>
            <tbody>
                <td>
                    Gestion entreprise
                </td>
                <td>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox">
                            Voir stats
                        </label>
                        <label>
                            <input type="checkbox">
                            Créer
                        </label>
                        <label>
                            <input type="checkbox">
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox">
                            Evaluer
                        </label>
                        <label>
                            <input type="checkbox">
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox">
                            Supprimer
                        </label>
                    </div>
                </td>
            </tbody>
            <tbody>
                <td>
                    Offres de stage
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox">
                        Voir stats
                    </label>
                    <label>
                        <input type="checkbox">
                        Créer
                    </label>
                    <label>
                        <input type="checkbox">
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox">
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox">
                        Supprimer
                    </label>
                </td>
            </tbody>
        </table>
    </div>
</div>


<?php require_once('views/footer.php'); ?>