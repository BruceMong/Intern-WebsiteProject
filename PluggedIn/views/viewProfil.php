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




    <div class="permission_profil">
    <form action="checkbox-form.php" method="post">
        <table>
            <thead>
                <th>Permission</th>
                <th>Autorisation</th>
            </thead>
            <tbody>
                <td>
                    Accès
                </td>
                           <label>
                         <input type="checkbox" name="authentifier" value=1 />
                            Authentification
                        </label>
                <td>
                    Gestion entreprises
                </td>
                <td>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="rechercher_entreprise" value=1 />
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" name="consulter_stats_entreprises" value=1>
                            Voir stats
                        </label>
                        <label>
                            <input type="checkbox" name="creer_entreprise" value=1>
                            Créer
                        </label>
                        <label>
                            <input type="checkbox" name="modifier_entreprise" value=1>
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox" name="evaluer_entreprise" value=1>
                            Evaluer
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="supprimer_entreprise" value=1>
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
                        <input type="checkbox" name="rechercher_offre" value=1>
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" name="consulter_stats_offres" value=1>
                        Voir stats
                    </label>
                    <label>
                        <input type="checkbox" name="creer_offre" value=1>
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" name="modifier_offre" value=1>
                        Modifier
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="supprimer_offre" value=1>
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
                        <input type="checkbox" name="rechercher_compte_pilote" value=1>
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" name="creer_compte_pilote" value=1>
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" name="modifier_compte_pilote" value=1>
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" name="supprimer_compte_pilote" value=1>
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
                        <input type="checkbox" name="rechercher_compte_delegue" value=1>
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" name="creer_compte_delegue" value=1>
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" name="modifier_compte_delegue" value=1>
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" name="supprimer_compte_delegue" value=1>
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
                        <input type="checkbox" name="rechercher_compte_etudiant" value=1>
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" name="creer_compte_etudiant" value=1>
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" name="modifier_compte_etudiant" value=1>
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" name="supprimer_compte_etudiant" value=1>
                        Supprimer
                    </label>
                    <label>
                            <input type="checkbox" name="consulter_stats_etudiants" value=1>
                            Voir stats
                        </label>
                </td>
            </tbody>
            <tbody>
                <td>
                    Gestion Candidatures
                </td>
                <td>
                    <label>
                        <input type="checkbox" name="ajouter_offre_wish_list" value=1>
                        Ajouter à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="retirer_offre_wish_list" value=1>
                        Supprimer à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="postuler_offre" value=1>
                        Postuler à une offre
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="info_sys_avance_candi1" value=1>
                        Informer le système de l'avancement 1
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="info_sys_avance_candi2" value=1>
                        Informer le système de l'avancement 2
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="info_sys_avance_candi3" value=1>
                        Informer le système de l'avancement 3
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="info_sys_avance_candi4" value=1>
                        Informer le système de l'avancement 4
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="info_sys_avance_candi5" value=1>
                        Informer le système de l'avancement 5
                    </label>
                </td>
            </tbody>
        </table>
        </form>
    </div>
</div>


<?php require_once('views/footer.php'); ?>