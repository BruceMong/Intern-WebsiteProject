<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="" alt="image entreprise" width="100px" height="100px">
            <h2>Nom de l'entreprise: <input type="text"> </h2>
            <p>Secteur d'activité : <input type="text"></p>
            <p>Localité : <input type="text"></p>
            <p>Nombre de stagiaires CESI : <input type="text"></p>
            <p>Confiance pilote : <input type="text"></p>
            <p>Evaluation entreprise : <input type="text"></p>
            <p>Contact entreprise : <input type="text"></p>
                <?php /*
                $sql = mysqli_query($connection, "SELECT username FROM users");
                while ($row = $sql->fetch_assoc()) {
                    echo "<option value=\"owner1\">" . $row['username'] . "</option>";
                }*/
                ?>
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


    </div>
</div>
<?php require_once('views/footer.php'); ?>