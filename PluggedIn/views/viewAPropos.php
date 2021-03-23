<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>



<div class=bloc_page>

    <article>
        <h1>Informations utiles</h1>
        <div class="conception">
            <h2> Conception </h2>
            <p>Architecture du site web: MVC (Model, View, Controller)</p>
            <img src="content/images/mvc-schema.png" alt="Banniere Home" />
     <p>Modèle-vue-contrôleur ou MVC est un motif d'architecture logicielle destiné aux interfaces graphiques lancé en 1978 et très populaire pour les applications web.
</br>Le motif est composé de trois types de modules ayant trois responsabilités différentes : les modèles, les vues et les contrôleurs.
<ul>
				<li>Un modèle (Model) contient les données à afficher.</li>
				<li>Une vue (View) contient la présentation de l'interface graphique.</li>
				<li>Un contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur.</li>
			</ul>
            <p> L’approche MVC apporte de réels avantages:
                </br> Une conception claire et efficace grâce à la séparation des données de la vue et du contrôleur
                </br>Un gain de temps de maintenance et d’évolution du site
                </br>Une plus grande souplesse pour organiser le développement du site entre différents développeurs (indépendance des données, de l’affichage (webdesign) et des actions)
            </p>
        </div>



        <div class="icons-intro">
            <h2> Développeurs: </h2>
            <ul>
                <li>
                    <img src="content/images/hadrien.jpg">
                    <h3>Hadrien</h3>
                </li>
                <li>
                    <img src="content/images/bruce.jpg">
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
