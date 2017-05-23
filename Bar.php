<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 11/05/17
 * Time: 05:18 PM
 */
require_once "imports.php";
?>
<nav>

    <div class="nav-wrapper purple darken-1">
        <a href="index.php" class="brand-logo">Danzlife</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="Lugares.php">Lugares</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="Lugares.php">Lugares</a></li>
        </ul>
    </div>
</nav>
<script>
    $(".button-collapse").sideNav();
</script>