<?php

session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Création d\'utilisateur';

require_once('views/viewCreateUtilisateur.php');
