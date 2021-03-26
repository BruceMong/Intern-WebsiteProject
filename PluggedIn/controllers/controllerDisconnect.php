<?php
session_start();
unset($_SESSION['utilisateur']);
unset($_SESSION['droits']);
session_destroy();
header('Location:'.URL.'login');
