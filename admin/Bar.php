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
<!--<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">Alta Alumna</a></li>
    <li><a href="#!">Bajas Alumna</a></li>
    <li><a href="#!">Cambios Alumna</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="#!">Alta Grupo</a></li>
    <li><a href="#!">Bajas Grupo</a></li>
    <li><a href="#!">Cambios Grupo</a></li>
</ul>-->
<nav>
    <div class="nav-wrapper blue">
        <a href="Home.php" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down ">
            <!--<li><a class="dropdown-button" href="Alumnas.php" data-activates="dropdown1">Alumnas<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Grupos<i class="material-icons right">arrow_drop_down</i></a></li>-->
            <li><a href="Alumnas.php">Alumnas</a></li>
            <li><a href="Grupos.php">Grupos</a></li>
            <li><a href="Pagos.php">Pagos</a></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function () {
        $(".dropdown-button").dropdown();
    })
</script>



<?php } } ?>