<?php
$t = 'Page introuvable';

if(isset($errorMsg))
{
    require_once('views/header.php');
    ?>
                <p align="center" style="margin-top:205px">Une erreur est survenue : <?= $errorMsg ?></p><br />
    <?php 
    require_once('views/footer.php');
}
else
{
    define('ROOT', dirname(__FILE__));
    define('URL', str_replace("views/viewError.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
    require_once(ROOT.'/header.php'); ?>

                <p align="center" style="margin-top:205px">Une erreur est survenue : Page introuvable</p><br />

    <?php require_once(ROOT.'/footer.php'); 
}
