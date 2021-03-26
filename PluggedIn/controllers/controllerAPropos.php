<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'A Propos';

require_once('views/viewAPropos.php');
