<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>
<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="" alt="">
            <h2>Nom : <?= $utilisateur->nom() ?> Prénom : <?= $utilisateur->prenom() ?> </h2>
            <br>
            <p>Login : <?= $utilisateur->login() ?> </p>
            <p>Promotion : <?php $promoUtil = $modelPromotion->getPromotion($utilisateur->id_promotion()); echo $promoUtil->libelle();   ?></p>
            <p>Centre de formation : <?= $utilisateur->centre() ?> </p>
            <p>Role : <?php $profilUtil = $modelProfil->getProfil($utilisateur->id_profil()); echo $profilUtil->libelle()  ?> </p>

        </div>
        <div class="bouton_crud">


            <div class="detail_modif">

                <form action="" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <h3>Nom : <input type="text" value="<?= $utilisateur->nom() ?>"></h3>
                        <h3>Prénom : <input type="text" value="<?= $utilisateur->prenom() ?>"></h3>
                        <p>Login : <input type="text" value="<?= $utilisateur->login() ?>"></p>
                        <br>
                        <p>Promotion : <input type="text" value="<?php $promoUtil = $modelPromotion->getPromotion($utilisateur->id_promotion()); echo $promoUtil->libelle();   ?>"></p>
                        <br>
                        <p>Centre de formation : <input type="text" value="<?= $utilisateur->centre() ?>"></p>
                        <br>
                        <p>Role : <input type="text" value="<?php $profilUtil = $modelProfil->getProfil($utilisateur->id_profil()); echo $profilUtil->libelle()  ?>"></p>
                        <center style="margin-top: 150px;">
                            <a href="#" onclick="hide('popupmodif')">Annuler</a>
                            <a href="#" onclick="hide('popupmodif')">Confirmer</a>
                        </center>
                    </div>

            </div>
            </form>

            <form action="" method="post">
                <center>
                    <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Supprimer">
                </center>
                <div class="popup" id="popup">
                    <h3>Vous êtes sûr de supprimer?</h3>
                    <center>
                        <a href="#" onclick="hide('popup')">Annuler</a>
                        <a href="#" onclick="hide('popup')">Confirmer</a>
                    </center>
                </div>

                <script>
                    $ = function(id) {
                        return document.getElementById(id);
                    }

                    var show = function(id) {
                        $(id).style.display = 'block';
                    }
                    var hide = function(id) {
                        $(id).style.display = 'none';
                    }
                </script>
            </form>
        </div>
        <div class="detail_stats">
        <form action="checkbox-form.php" method="post">
            <table style="width: 100%;">
                <thead>
                    <th>Permission</th>
                    <th>Autorisation</th>
                </thead>
                <tbody>
                    <td>
                        Accès
                    </td>
                    <td>
                    <label>
                        <input type="checkbox" name="authentifier" value=1 />
                        Authentification
                    </label>
                    </td>
                </tbody>
                <tbody>
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

</div>
<?php require_once('views/footer.php'); ?>