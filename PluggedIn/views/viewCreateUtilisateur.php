<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="" alt="image entreprise" width="100px" height="100px">
            <h2>Nom : <input type="text"> </h2>
            <h2>Prénom : <input type="text"></h2>
            <p>Login : <input type="text"></p>
            <p>Promo : <input type="text"></p>
            <p>Centre : <input type="text"></p>
            <p>Role : <input type="text"></p>
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