<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');



$t = 'Accueil PluggedIn';

require_once('views/viewAccueil.php');