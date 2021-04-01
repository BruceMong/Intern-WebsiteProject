<script  src="\PluggedIn-master\PluggedIn-master\PluggedIn\script" type ="text/javascript"></script>
<?php
define('ROOT', dirname(__FILE__));
$self = htmlspecialchars($_SERVER['PHP_SELF']);
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$self"));

// CHARGEMENT AUTOMATIQUE DES CLASSES
spl_autoload_register(function($class){
    require('models/' .$class. '.php');
});

require_once('config/connect.php');
require_once('controllers/router.php');

