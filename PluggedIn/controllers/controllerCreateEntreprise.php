<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');


$t = 'Création Entreprise';

require_once('views/viewCreateEntreprise.php');
