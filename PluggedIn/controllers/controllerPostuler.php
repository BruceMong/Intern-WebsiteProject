<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ

$t = 'Postuler à une offre';

require_once('views/viewPostuler.php');
