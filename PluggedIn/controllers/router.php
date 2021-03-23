<?php
try {
    //******************
    //
    // CHOIX DE L'ACTION
    //
    //******************
    if (isset($_GET['action'])) {
        if (file_exists('controllers/controller' . ucfirst($_GET['action']) . '.php'))
            require_once('controllers/controller' . ucfirst($_GET['action']) . '.php');
        else
            throw new Exception('Page introuvable');
    } else
        require_once('controllers/controllerAccueil.php');
}
//********************
//
// GÉSTION DES ERREURS
//
//********************
catch (Exception $e) {
    $errorMsg = $e->getMessage();
    require_once('views/viewError.php');
}
