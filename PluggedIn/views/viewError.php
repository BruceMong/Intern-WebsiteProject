<?php
$t = 'Page introuvable';



if(isset($errorMsg))
{
    require_once('views/header.php');
    require_once('views/nav.php');
    ?>
                <div class = annonceErreur> 
                    <p align="center" style="margin-top:205px">Une erreur est survenue :<br /> <?= $errorMsg ?></p><br />
                    <img src="content/images/erreur.png" alt="erreur:<?= $errorMsg ?> ">
                </div>
    <?php 
    require_once('views/footer.php');
}
else
{
    define('ROOT', dirname(__FILE__));
    define('URL', str_replace("views/viewError.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
    require_once(ROOT.'/header.php');
    require_once('views/nav.php'); ?>
                <div class = annonceErreur> 
                    <p align="center" style="margin-top:205px">Une erreur est survenue : Page introuvable</p><br />
                    <img src="content/images/erreur.png" alt="erreur:<?= $errorMsg ?> ">
                </div>
    <?php require_once(ROOT.'/footer.php'); 
}
