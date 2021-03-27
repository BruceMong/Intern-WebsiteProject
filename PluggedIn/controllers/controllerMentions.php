<?php
session_start();



if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Mentions légales';

require_once('views/viewMentions.php');
