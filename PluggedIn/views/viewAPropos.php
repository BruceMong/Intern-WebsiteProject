<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>



<div class=bloc_page>

    <article class = blocAPropos>
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
        <div class="specification">
            <h2>Spécifications Techniques</h2>
            <h3>Organisation</h3>
            <p>Utilisation de GIT : utilisation de Git, avec branches et commit, en respectant les conventions d’usage</p>

            <h3>Hébergement</h3>
            <ul>
                <li>Apache : 
                    <ul>
                        <li>Description : le site web doit être hébergé sous un serveur Apache. Le système d’exploitation hôte n’est pas imposé (Windows, Linux ou Mac).
                        </li>
                    </ul>
                </li>
                <li>Virtual Hosts : 
                    <ul>
                        <li>Description : vous devez créer deux vhost sur votre serveur. L’un d’eux hébergera les données statiques que sont les fichiers images et les fichiers css. L’autre sera le vhost principal et hébergera toutes les autres ressources. Les 2 vhosts seront sous le même nom de domaine.
                        </li>
                    </ul>
                </li>
                <li>Authentification : 
                    <ul>
                        <li>Description : Le vhost principal sera protégé au niveau Apache. Seules certaines IP peuvent y accéder.
                        </li>
                    </ul>
                </li>
            </ul>

            <h3>Syntaxe</h3>
            <ul>
                <li> Architecture code HTML
                    <ul>
                        <li>Description : Chaque page HTML doit contenir une syntaxe précise constituée de balises référencées.</li>
                        <li>Outils techniques (suggestions) : Visual Studio Code / Sublime Text /Notepad++.</li>
                    </ul>
                </li>
                <li>Formulaire
                    <ul>
                        <li>Description : Les champs obligatoires des formulaires devront être vérifiés. A
                            minima un attribut HTML permettant de spécifier les champs requis.
                        </li>
                    </ul>
                </li>
                <li>Interdiction d’utiliser les CMS
                    <ul>
                        <li>Description : Pas d’utilisation de CMS.
                        </li>
                    </ul>
                </li>
                <li>Validateur W3C
                    <ul>
                        <li>Description : Chaque page HTML générée doit être validée par le W3C (HTML)
                        </li>
                        <li>Outils technique : https://validator.w3.org/
                        </li>
                    </ul>
                </li>
            </ul>
            <h3>Langage de programmation (front)</h3>
            <ul>
                <li>Langages
                    <ul>
                        <li>HTML5 / CSS3 ( Pas d’utilisation de CMS. )
                        </li>
                        <li>Outils techniques (suggestions) : Visual Studio Code / Sublime Text /Notepad++.
                        </li>
                    </ul>
                </li>
                <li>Librairies
                    <ul>
                        <li>jQuery Core 3.5.0
                        </li>
                    </ul>
                </li>
                <li>Préprocesseurs CSS
                    <ul>
                        <li>Sass 1.32.8
                        </li>
                    </ul>
                </li>
                <li>Javascript
                    <ul>
                        <li>Un objet par id dans un tableau d'objets JavaScript
                        </li>
                    </ul>
                </li>
            </ul>
            <h3>Mécanismes asynchrones</h3>
            <ul>
                <li>Affichage dynamique des résultats
                    <ul>
                        <li>Description : les résultats devront être affichés dynamiquement sous forme detableau dans la page concernée sans recharger celle-ci en utilisant lesmécanismes asynchrones (AJAX).
                        </li>
                        <li>Outils techniques (suggestions) :jQuery,DataTables
                        </li>
                    </ul>
                </li>
                <li>Pagination
                    <ul>
                        <li>Description : Les résultats affichés devront être paginés.
                        </li>
                    </ul>
                </li>
                <li>Sécurité
                    <ul>
                        <li>Description : La manipulation des données devra être sécurisée. Il faudra utiliser un jeton d’authentification pour les requêtes (token).
                        </li>
                        <li>Les données récupérées devront être étanches (par exemple une ressource appelée par un utilisateur non connecté ou n’ayant pas les droits renverra une erreur).
                        </li>
                    </ul>
                </li>
            </ul>
            <h3>Back-End</h3>
            <ul>
                <li>Architecture MVC
                </li>
                <li>Utilisation d’une couche d’abstraction pour communiquer avec la base dedonnées
                </li>
                <li>Programmation Orienté Objet
                </li>
                <li>Respect de la norme PSR 12
                </li>
                <li>Utilisation obligatoire d’un moteur de template
                </li>
                <li>Les informations de connexion seront stockées dans des cookies, enrespectant les standards de sécurité.
                </li>
            </ul>
            <h3>PWA</h3>
            <ul>
                <li>Manifest web
                    <ul>
                        <li>Description : Créer un manifest en JSON et attribuer toutes les informations importantes à la description de votre site web.
                        </li>
                        <li>Outils techniques (suggestions) : Visual Studio Code / Sublime Text / Notepad++.
                        </li>
                    </ul>
                </li>
                <li>Service worker
                    <ul>
                        <li>Description : Créer le Service Worker, afin de pouvoir assurer la fonctionnalité de l’application en mode offline, et le mettre au bon endroit dans le projet (emplacement racine du projet).
                        </li>
                    </ul>
                </li>
                <li>Navigation sur mobile
                    <ul>
                        <li>Description : Utiliser Google Chrome comme navigateur sur le mobile afin d’exporter le site web en application.
                        </li>
                    </ul>
                </li>
                <li>Lighthouse
                    <ul>
                        <li>Description : Utiliser le plugin Lighthouse intégré à Google Chrome pour pouvoir tester l’application web si elle est fonctionnelle en PWA.
                        </li>
                    </ul>
                </li>
                <li>Emulateur mobile
                    <ul>
                        <li>Description : Utiliser un émulateur mobile pour pouvoir faire des tests et montrer cela lors de la soutenance.
                        </li>
                        <li>Outils techniques : Android studio / Téléphone physique sous Android.
                        </li>
                    </ul>
                </li>
            </ul>
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