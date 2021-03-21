<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉL:
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="content/css/style.css" />
    <link rel="stylesheet" href="content/css/nav.css" />
    <link rel="stylesheet" href="content/css/header.css" />
    <link rel="stylesheet" href="content/css/footer.css" />
    <title><?= $t ?></title>
</head>


<header>

<body>
    <div class="header_left">
        <div class="logo">
            <a href="index.php">
                <img id="logoimg" src="content/images/logo.jpg" alt="logo site TA" title="Le logo de notre site, youpi" />
            </a>
        </div>

        <div class="network">

            <ul>
                <li>
                    <a href="https://instagram.com">
                        <img src="https://i.ibb.co/ySwtH4B/instagram.png" alt="logo link instagram" width="40" height="40" title="Notre compte instagram !!" />
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com">
                        <img src="https://i.ibb.co/Wnxq2Nq/twitter.png" alt="logo link twitter" width="40" height="40" title="Notre compte twitter !!" />
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="content/images/snapchatLogo.png" alt="logo link snapchat" width="40" height="40" title="Notre compte snapchat !!" />
                    </a>
                </li>
            </ul>

        </div>

    </div>


    <div class="header_right" id="identification">
        <ul>
            <li>
                <?php if(empty($_SESSION['utilisateur']))
                {
                    echo '<a class="login" href="login">';
                    echo '<input type="button" value="Login">';
                    echo '</a>';
                }
                else
                {
                    echo '<a class="nav_compte" href="login">';
                    echo '<img src="content/images/account-icon.png">';
                    echo '<p>Voir Compte</p>';
                    echo '</a>';
                    
                }
                ?> 
            </li>
        </ul>
    </div>
    

</header>