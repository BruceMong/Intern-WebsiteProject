<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">

        <div class="detail_presentation">
            <img src="" alt="">
            <h2>Nom entreprise : </h2>
            <br>
            <p>Secteur d'activité : </p>
            <p>Localité : </p>
            <p>Nombre stagiaires CESI : </p>
            <p>Confiance pilote : </p>
            <p>Evaluation entreprise : </p>
            <p>Coontact entreprise ; </p>


        </div>
        <div class="bouton_crud">


            <div class="detail_modif">

                <form action="" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <h3>Nom entreprise : </h3>
                        <br>
                        <p>Secteur d'activité : </p>
                        <p>Localité : </p>
                        <p>Nombre stagiaires CESI : </p>
                        <p>Confiance pilote : </p>
                        <p>Evaluation entreprise : </p>
                        <p>Contact entreprise : </p>

                        <input type="text" value="">
                        <center style="margin-top: 1px;">
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
    </div>

</div>
<?php require_once('views/footer.php'); ?>