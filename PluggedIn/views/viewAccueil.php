
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="content/css/index.css" />
    <link rel="stylesheet" href="content/css/nav.css" />
    <link rel="stylesheet" href="content/css/header.css" />
    <link rel="stylesheet" href="content/css/footer.css" />
    <title>PluggedIn Home</title>
</head>

<body>

<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class="banniere_image">
        <img src="content/images/bannierePluggedIn.jpg" alt="Banniere Home" />
    </div>


    <div class = bloc_page>
        <article>
            <h1>Information</h1>
            <h2> Conception </h2>
            <p>Architecture du site web: MVC (Model, View, Controller)</p>
            <img src="content/images/mvc-schema.png" alt="Banniere Home" />
            <p> L’approche MVC apporte de réels avantages:
                </br> Une conception claire et efficace grâce à la séparation des données de la vue et du contrôleur
                </br>Un gain de temps de maintenance et d’évolution du site
                </br>Une plus grande souplesse pour organiser le développement du site entre différents développeurs (indépendance des données, de l’affichage (webdesign) et des actions)
            </p>

            <h2> Développeur: </h2>
            <p> Erica, Bruce, Hadrien </p>


        </article>
        
    </div>


<?php require_once('views/footer.php'); ?>