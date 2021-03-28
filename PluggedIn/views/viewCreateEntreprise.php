<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">
        <form action="createEntreprise" method="post">
            <div class="detail_presentation">
                <h2>Nom de l'entreprise: <input name="nom" type="text"> </h2>
                <p>Secteur d'activité : <input name="secteur_activite" type="text"></p>
                <p>Localité : <input name="localite" type="text"></p>
                <p>Nombre de stagiaires CESI : <input name="nombre_stagiaire_cesi" type="text"></p>
                <p>Confiance pilote : <input name="confiance_pilote" type="text"></p>
                <p>Evaluation entreprise : <input name="evaluation_entreprise" type="text"></p>
                <p>Contact entreprise : <input name="mail" type="text"></p>
                <p>Image : <input name="image" type="text"></p>
            </div>
            <div class="bouton_crud">
                <div class="detail_modif">

                    <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Créer">
                    <div class="popup" id="popup">
                        <h3>Vous êtes sûr de Créer?</h3>
                        <center>
                            <button type="submit" name=create value="" onclick="hide('popup')">Confirmer</button>
                            <button type="reset" onclick="hide('popup')">Annuler</button>
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
</div>


</div>
</div>
<?php require_once('views/footer.php'); ?>