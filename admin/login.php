<?php

session_start();
$_SESSION["Validado"]="aceptado";
header('Location: Home.php');