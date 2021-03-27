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

                <form action="detailUtilisateur" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <h3>Nom : <input name="nom" type="text"  value="<?= $utilisateur->nom() ?>"></h3>
                        <h3>Prénom : <input name="prenom" type="text" value="<?= $utilisateur->prenom() ?>"></h3>
                        <p>Login : <input name="login" type="text" value="<?= $utilisateur->login() ?>"></p>
                        <br>
                        
                        <p> Role: <select name="role"> 
                           <?php foreach($profils as $role) : ?>
                                    <option value="<?= $role->libelle()?>"><?= $role->libelle()?></option>
                                <?php endforeach; ?>
                                </select>
                        <br>
                           </p>
                        <p>Centre de formation : <input name="centre" type="text" value="<?= $utilisateur->centre() ?>"></p>
                        <br>
                        <br>
                        <p> Promotion: <select name="promo"> Promotion
                           <?php foreach($promotions as $promoSelect) : ?>
                                    <option value="<?= $promoSelect->libelle()?>"><?= $promoSelect->libelle()?></option>
                                <?php endforeach; ?>
                                </select>
                           </p>
                        <center style="margin-top: 100px;">
                            <button class="form-btn" type="submit" name=id value="<?= $utilisateur->login()?>" onclick="hide('popupmodif')">Confirmer</button>
                            <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popupmodif')" >Annuler</button>
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
                        <input type="text" name="delete" id="droitmodif" value=true>

                        <button class="form-btn" type="submit" name=id value="<?= $utilisateur->login()?>" onclick="hide('popupmodif')">Confirmer</button>
                        <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popupmodif')" >Annuler</button>
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
        <form action="detailUtilisateur" method="post">
        <input type="text" name="modif" id="droitmodif" value=true>
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
                        <input type="checkbox" name="authentifier"  value=1 
                        <?php
                        if($droit->authentifier() == 1)  
                            echo ' checked ';
                        ?>
                        />
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
                                <input type="checkbox" name="rechercher_entreprise"  value=1  
                                <?php
                        if($droit->rechercher_entreprise() == 1)  
                            echo ' checked ';
                        ?>/>
                                Rechercher
                            </label>
                            <label>
                                <input type="checkbox" name="consulter_stats_entreprises" value=1                                 <?php
                        if($droit->consulter_stats_entreprises() == 1)  
                            echo ' checked ';
                        ?>/> 
                                Voir stats
                            </label>
                            <label>
                                <input type="checkbox" name="creer_entreprise" value=1 
                                <?php
                        if($droit->creer_entreprise() == 1)  
                            echo ' checked ';
                        ?>/>
                        
                                Créer
                            </label>
                            <label>
                                <input type="checkbox" name="modifier_entreprise" value=1                                 <?php
                        if($droit->modifier_entreprise() == 1)  
                            echo ' checked ';
                        ?>/>
                        
                                Modifier
                            </label>
                            <label>
                                <input type="checkbox" name="evaluer_entreprise" value=1                                 <?php
                        if($droit->evaluer_entreprise() == 1)  
                            echo ' checked ';
                        ?>/>
                        
                                Evaluer
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name="supprimer_entreprise" value=1 
                                <?php
                        if($droit->supprimer_entreprise() == 1)  
                            echo ' checked ';
                        ?>/>
                        
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
                            <input type="checkbox" name="rechercher_offre" value=1                                 <?php
                        if($droit->rechercher_offre() == 1)  
                            echo ' checked ';
                        ?>/>
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" name="consulter_stats_offres" value=1                                 <?php
                        if($droit->consulter_stats_offres() == 1)  
                            echo ' checked ';
                        ?>/>
                            Voir stats
                        </label>
                        <label>
                            <input type="checkbox" name="creer_offre" value=1                                 <?php
                        if($droit->creer_offre() == 1)  
                            echo ' checked ';
                        ?>/>
                            Créer
                        </label>
                        <label>
                            <input type="checkbox" name="modifier_offre" value=1                                 <?php
                        if($droit->modifier_offre() == 1)  
                            echo ' checked ';
                        ?>/>
                            Modifier
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="supprimer_offre" value=1                                 <?php
                        if($droit->supprimer_offre() == 1)  
                            echo ' checked ';
                        ?>/>
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
                            <input type="checkbox" name="rechercher_compte_pilote" value=1                                 <?php
                        if($droit->rechercher_compte_pilote() == 1)  
                            echo ' checked ';
                        ?>/>
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" name="creer_compte_pilote" value=1                                 <?php
                        if($droit->creer_compte_pilote() == 1)  
                            echo ' checked ';
                        ?>/>
                            Créer
                        </label>
                        <label>
                            <input type="checkbox" name="modifier_compte_pilote" value=1                                 <?php
                        if($droit->modifier_compte_pilote() == 1)  
                            echo ' checked ';
                        ?>/>
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox" name="supprimer_compte_pilote" value=1                                 <?php
                        if($droit->supprimer_compte_pilote() == 1)  
                            echo ' checked ';
                        ?>/>
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
                            <input type="checkbox" name="rechercher_compte_delegue" value=1                                 <?php
                        if($droit->rechercher_compte_delegue() == 1)  
                            echo ' checked ';
                        ?>/>
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" name="creer_compte_delegue" value=1                                 <?php
                        if($droit->creer_compte_delegue() == 1)  
                            echo ' checked ';
                        ?>/>
                            Créer
                        </label>
                        <label>
                            <input type="checkbox" name="modifier_compte_delegue" value=1                                 <?php
                        if($droit->modifier_compte_delegue() == 1)  
                            echo ' checked ';
                        ?>/>
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox" name="supprimer_compte_delegue" value=1                                 <?php
                        if($droit->supprimer_compte_delegue() == 1)  
                            echo ' checked ';
                        ?>/>
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
                            <input type="checkbox" name="rechercher_compte_etudiant" value=1                                 <?php
                        if($droit->rechercher_compte_etudiant() == 1)  
                            echo ' checked ';
                        ?>/>
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" name="creer_compte_etudiant" value=1                                 <?php
                        if($droit->creer_compte_etudiant() == 1)  
                            echo ' checked ';
                        ?>/>
                            Créer
                        </label>
                        <label>
                            <input type="checkbox" name="modifier_compte_etudiant" value=1                                 <?php
                        if($droit->modifier_compte_etudiant() == 1)  
                            echo ' checked ';
                        ?>/>
                            Modifier
                        </label>
                        <label>
                            <input type="checkbox" name="supprimer_compte_etudiant" value=1                                 <?php
                        if($droit->supprimer_compte_etudiant() == 1)  
                            echo ' checked ';
                        ?>/>
                            Supprimer
                        </label>
                        <label>
                            <input type="checkbox" name="consulter_stats_etudiants" value=1                                 <?php
                        if($droit->consulter_stats_etudiants() == 1)  
                            echo ' checked ';
                        ?>/>
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
                            <input type="checkbox" name="ajouter_offre_wish_list" value=1                                 <?php
                        if($droit->ajouter_offre_wish_list() == 1)  
                            echo ' checked ';
                        ?>/>
                            Ajouter à wish-list
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="retirer_offre_wish_list" value=1                                 <?php
                        if($droit->retirer_offre_wish_list() == 1)  
                            echo ' checked ';
                        ?>/>
                            Supprimer à wish-list
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="postuler_offre" value=1                                 <?php
                        if($droit->postuler_offre() == 1)  
                            echo ' checked ';
                        ?>/>
                            Postuler à une offre
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="info_sys_avance_candi1" value=1                                 <?php
                        if($droit->info_sys_avance_candi1() == 1)  
                            echo ' checked ';
                        ?>/>
                            Informer le système de l'avancement 1
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="info_sys_avance_candi2" value=1                                 <?php
                        if($droit->info_sys_avance_candi2() == 1)  
                            echo ' checked ';
                        ?>/>
                            Informer le système de l'avancement 2
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="info_sys_avance_candi3" value=1                                 <?php
                        if($droit->info_sys_avance_candi3() == 1)  
                            echo ' checked ';
                        ?>/>
                            Informer le système de l'avancement 3
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="info_sys_avance_candi4" value=1                                 <?php
                        if($droit->info_sys_avance_candi4() == 1)  
                            echo ' checked ';
                        ?>/>
                            Informer le système de l'avancement 4
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="info_sys_avance_candi5"  value=1                                  <?php
                        if($droit->info_sys_avance_candi5() == 1)  
                            echo ' checked ';
                        ?>/>
                            Informer le système de l'avancement 5
                        </label>
                    </td>
                </tbody>
            </table>
            <button class="form-btn" type="submit" name=id value="<?= $utilisateur->login()?>" onclick="hide('popupmodif')">Modifier Droit</button>
        </form>
        <script>
            $('input[type="checkbox"]').change(function(){
                this.value = (Number(this.checked));
            });
        </script>

        </div>
    </div>

</div>
<?php require_once('views/footer.php'); ?>