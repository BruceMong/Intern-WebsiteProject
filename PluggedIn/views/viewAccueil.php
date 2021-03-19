
<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class="banniere_image">
        <img src="content/images/bannierePluggedIn.jpg" alt="Banniere Home" />
    </div>


    <div class = bloc_page>
    
        <article>
        <h1>Information</h1>
            <div class = "conception" >
            <h2> Conception </h2>
            <p>Architecture du site web: MVC (Model, View, Controller)</p>
            <img src="content/images/mvc-schema.png" alt="Banniere Home" />
            <p> L’approche MVC apporte de réels avantages:
                </br> Une conception claire et efficace grâce à la séparation des données de la vue et du contrôleur
                </br>Un gain de temps de maintenance et d’évolution du site
                </br>Une plus grande souplesse pour organiser le développement du site entre différents développeurs (indépendance des données, de l’affichage (webdesign) et des actions)
            </p>
            </div>


            
            <div class="icons-intro">
            <h2> Développeur: </h2>
                <ul>
                    <li>
                        <img src="content/images/hadrien.jpg">
                        <h3>Hadrien</h3>
                    </li>
                    <li>
                        <img src="content/images/bruce.jpg" >
                        <h3>Bruce</h3>
                    </li>
                    <li>
                        <img src="content/images/bruce.jpg">
                        <h3>Erica</h3>
                    </li>
                </ul>
            </div>
            </article>
    </div>


<?php require_once('views/footer.php'); ?>