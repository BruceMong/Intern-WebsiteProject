<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Détail de l\'utilisateur';



require_once('views/viewDetailUtilisateur.php');
