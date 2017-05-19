<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 18/05/17
 * Time: 11:12 PM
 */

session_start();
unset($_SESSION["Validado"]);
header('Location: index.php');