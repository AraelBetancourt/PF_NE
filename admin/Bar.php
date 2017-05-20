<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 11/05/17
 * Time: 05:18 PM
 */
session_start();
if(!isset($_SESSION["Validado"])) {
    header("location:index.php");
}
else {
if($_SESSION['Validado']=="aceptado"){
require_once "imports.php"
?>

<nav>

    <div class="nav-wrapper purple darken-1">
        <a href="Home.php" class="brand-logo">Danzlife</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="Alumnas.php">Alumnas</a></li>
            <li><a href="Grupos.php">Grupos</a></li>
            <li><a href="Pagos.php">Pagos</a></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="Alumnas.php">Alumnas</a></li>
            <li><a href="Grupos.php">Grupos</a></li>
            <li><a href="Pagos.php">Pagos</a></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
    </div>
</nav>
<script>
    $(".button-collapse").sideNav();
</script>



<?php } } ?>