<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<a href="disconnect" class="btn btn-danger disconnect"><span class="glyphicon glyphicon-remove-sign"></span> Déconnexion</a>

<div class="profil-container">

    <div class="detail_profil">
        <h1><span>Profil</span></h1>
        <div class="image_profil">
        <img src="https://avatars.githubusercontent.com/u/58480180?s=460&u=26466fe2b0d08716e7ccba2e757b50a1e10165bc&v=4" alt="error">
        <h2>Nom : <?= $utilisateur->nom() ?>  Prénom : <?= $utilisateur->prenom() ?></h2>

        </div> 
        <p>Login : <?= $utilisateur->login() ?> </p>
        <p>Promo : <?= $promotion->libelle()  ?>  </p>
        <p>Centre : <?= $utilisateur->centre() ?> </p> 
        <p>Role :   <?= $profil->libelle() ?> </p>

        <p>Role :   <?= var_dump($droit) ?> </p>

    </div>


    
    Do you need wheelchair access?
    <input type="checkbox" name="formWheelchair" value="Yes" />

    <div class="permission_profil">
    <form action="checkbox-form.php" method="post">
        <table>
            <thead>
                <th>Permission</th>
                <th>Autorisation</th>
            </thead>
            <tbody>
                <td>
                    Gestion entreprises
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
                        <br>
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
                    Offres de stages
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
                    <br>
                    <label>
                        <input type="checkbox">
                        Supprimer
                    </label>
                </td>
            </tbody>
            <tbody>
                <td>
                    Gestion Pilotes
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                        Rechercher
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
                        Supprimer
                    </label>
                </td>
            </tbody>
            <tbody>
                <td>
                    Gestion Délégués
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                        Rechercher
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
                        Supprimer
                    </label>
                </td>
            </tbody>
            <tbody>
                <td>
                    Gestion Etudiants
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                        Rechercher
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
                        Supprimer
                    </label>
                </td>
            </tbody>
            <tbody>
                <td>
                    Gestion Candidatures
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                        Ajouter à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Supprimer à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Postuler à une offre
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Informer le système de l'avancement 1
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Informer le système de l'avancement 2
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Informer le système de l'avancement 3
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Informer le système de l'avancement 4
                    </label>
                    <br>
                    <label>
                        <input type="checkbox">
                        Informer le système de l'avancement 5
                    </label>
                </td>
            </tbody>
        </table>
        </form>
    </div>
</div>


<?php require_once('views/footer.php'); ?>