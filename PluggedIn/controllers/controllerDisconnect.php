<?php
session_start();
unset($_SESSION['utilisateur']);
session_destroy();
header('Location:'.URL.'login');
