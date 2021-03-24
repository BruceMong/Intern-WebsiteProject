<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="" alt="image entreprise" width="100px" height="100px">
            <h2>Nom de l'entreprise: </h2>
            <select name="choix entreprise" id="select_entreprise">
                <option value="">--Please choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="hamster">Hamster</option>
                <option value="parrot">Parrot</option>
                <option value="spider">Spider</option>
                <option value="goldfish">Goldfish</option>
            </select>
        </div>
        <div class="bouton_crud">
            <div class="detail_modif">
                <form action="" method="post">
                    <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Créer">
                    <div class="popup" id="popup">
                        <h3>Vous êtes sûr de Créer?</h3>
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

        <div class="detail_stats">
            <h2>Informations sur l'offre</h2> <br>
            <p>Durée du stage : </p> <input type="text" class="info_modif" value="">
            <p>Nombres de places offertes : </p><input type="text" class="info_modif" value="">
            <p>Base de rémunération : </p><input type="text" class="info_modif" value="">
            <p>Date de l'offre : </p><input type="text" class="info_modif" value="">
            <p>Typesde promotions concernées : </p><input type="text" class="info_modif" value="">

        </div>
        <div class="detail_competence">
            <h2>Compétences requises : </h2>
            <input type="text" class="info_modif" value="">

        </div>

    </div>
</div>
<?php require_once('views/footer.php'); ?>