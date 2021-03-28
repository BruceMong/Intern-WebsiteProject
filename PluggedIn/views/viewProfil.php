<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<a href="disconnect" class="btn btn-danger disconnect"><span class="glyphicon glyphicon-remove-sign"></span> Déconnexion</a>

<div class="profil-container">

    <div class="detail_profil">
        <h1><span>Profil</span></h1>
        <div class="image_profil">
            <img src="https://avatars.githubusercontent.com/u/58480180?s=460&u=26466fe2b0d08716e7ccba2e757b50a1e10165bc&v=4" alt="error">
            <h2>Nom : <?= $utilisateur->nom() ?> Prénom : <?= $utilisateur->prenom() ?></h2>

        </div>
        <p>Login : <?= $utilisateur->login() ?> </p>
        <p>Promo : <?= $promotion->libelle()  ?> </p>
        <p>Centre : <?= $utilisateur->centre() ?> </p>
        <p>Role : <?= $profil->libelle() ?> </p>

    </div>

    <div class="permission_profil">
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
                        <input type="checkbox" onclick="return false;" name="authentifier" value=1 <?php
                                                                                                    if ($droit->authentifier() == 1)
                                                                                                        echo ' checked ';
                                                                                                    ?> />
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
                            <input type="checkbox" onclick="return false;" name="rechercher_entreprise" value=1 <?php
                                                                                                                if ($droit->rechercher_entreprise() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                            Rechercher
                        </label>
                        <label>
                            <input type="checkbox" onclick="return false;" name="consulter_stats_entreprises" value=1 <?php
                                                                                                                        if ($droit->consulter_stats_entreprises() == 1)
                                                                                                                            echo ' checked ';
                                                                                                                        ?> />
                            Voir stats
                        </label>
                        <label>
                            <input type="checkbox" onclick="return false;" name="creer_entreprise" value=1 <?php
                                                                                                            if ($droit->creer_entreprise() == 1)
                                                                                                                echo ' checked ';
                                                                                                            ?> />

                            Créer
                        </label>
                        <label>
                            <input type="checkbox" onclick="return false;" name="modifier_entreprise" value=1 <?php
                                                                                                                if ($droit->modifier_entreprise() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />

                            Modifier
                        </label>
                        <label>
                            <input type="checkbox" onclick="return false;" name="evaluer_entreprise" value=1 <?php
                                                                                                                if ($droit->evaluer_entreprise() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />

                            Evaluer
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" onclick="return false;" name="supprimer_entreprise" value=1 <?php
                                                                                                                if ($droit->supprimer_entreprise() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />

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
                        <input type="checkbox" onclick="return false;" name="rechercher_offre" value=1 <?php
                                                                                                        if ($droit->rechercher_offre() == 1)
                                                                                                            echo ' checked ';
                                                                                                        ?> />
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="consulter_stats_offres" value=1 <?php
                                                                                                                if ($droit->consulter_stats_offres() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Voir stats
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="creer_offre" value=1 <?php
                                                                                                    if ($droit->creer_offre() == 1)
                                                                                                        echo ' checked ';
                                                                                                    ?> />
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="modifier_offre" value=1 <?php
                                                                                                        if ($droit->modifier_offre() == 1)
                                                                                                            echo ' checked ';
                                                                                                        ?> />
                        Modifier
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="supprimer_offre" value=1 <?php
                                                                                                        if ($droit->supprimer_offre() == 1)
                                                                                                            echo ' checked ';
                                                                                                        ?> />
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
                        <input type="checkbox" onclick="return false;" name="rechercher_compte_pilote" value=1 <?php
                                                                                                                if ($droit->rechercher_compte_pilote() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="creer_compte_pilote" value=1 <?php
                                                                                                            if ($droit->creer_compte_pilote() == 1)
                                                                                                                echo ' checked ';
                                                                                                            ?> />
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="modifier_compte_pilote" value=1 <?php
                                                                                                                if ($droit->modifier_compte_pilote() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="supprimer_compte_pilote" value=1 <?php
                                                                                                                if ($droit->supprimer_compte_pilote() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
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
                        <input type="checkbox" onclick="return false;" name="rechercher_compte_delegue" value=1 <?php
                                                                                                                if ($droit->rechercher_compte_delegue() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="creer_compte_delegue" value=1 <?php
                                                                                                            if ($droit->creer_compte_delegue() == 1)
                                                                                                                echo ' checked ';
                                                                                                            ?> />
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="modifier_compte_delegue" value=1 <?php
                                                                                                                if ($droit->modifier_compte_delegue() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="supprimer_compte_delegue" value=1 <?php
                                                                                                                if ($droit->supprimer_compte_delegue() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
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
                        <input type="checkbox" onclick="return false;" name="rechercher_compte_etudiant" value=1 <?php
                                                                                                                    if ($droit->rechercher_compte_etudiant() == 1)
                                                                                                                        echo ' checked ';
                                                                                                                    ?> />
                        Rechercher
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="creer_compte_etudiant" value=1 <?php
                                                                                                            if ($droit->creer_compte_etudiant() == 1)
                                                                                                                echo ' checked ';
                                                                                                            ?> />
                        Créer
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="modifier_compte_etudiant" value=1 <?php
                                                                                                                if ($droit->modifier_compte_etudiant() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Modifier
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="supprimer_compte_etudiant" value=1 <?php
                                                                                                                if ($droit->supprimer_compte_etudiant() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Supprimer
                    </label>
                    <label>
                        <input type="checkbox" onclick="return false;" name="consulter_stats_etudiants" value=1 <?php
                                                                                                                if ($droit->consulter_stats_etudiants() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
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
                        <input type="checkbox" onclick="return false;" name="ajouter_offre_wish_list" value=1 <?php
                                                                                                                if ($droit->ajouter_offre_wish_list() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Ajouter à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="retirer_offre_wish_list" value=1 <?php
                                                                                                                if ($droit->retirer_offre_wish_list() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Supprimer à wish-list
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="postuler_offre" value=1 <?php
                                                                                                        if ($droit->postuler_offre() == 1)
                                                                                                            echo ' checked ';
                                                                                                        ?> />
                        Postuler à une offre
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="info_sys_avance_candi1" value=1 <?php
                                                                                                                if ($droit->info_sys_avance_candi1() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Informer le système de l'avancement 1
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="info_sys_avance_candi2" value=1 <?php
                                                                                                                if ($droit->info_sys_avance_candi2() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Informer le système de l'avancement 2
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="info_sys_avance_candi3" value=1 <?php
                                                                                                                if ($droit->info_sys_avance_candi3() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Informer le système de l'avancement 3
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="info_sys_avance_candi4" value=1 <?php
                                                                                                                if ($droit->info_sys_avance_candi4() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Informer le système de l'avancement 4
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" onclick="return false;" name="info_sys_avance_candi5" value=1 <?php
                                                                                                                if ($droit->info_sys_avance_candi5() == 1)
                                                                                                                    echo ' checked ';
                                                                                                                ?> />
                        Informer le système de l'avancement 5
                    </label>
                </td>
            </tbody>
        </table>
    </div>
</div>
<?php require_once('views/footer.php'); ?>