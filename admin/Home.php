<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 15/05/17
 * Time: 06:32 PM
 */
session_start();
if(!isset($_SESSION["Validado"])) {
    header("location:index.php");
}
else {
if($_SESSION['Validado']=="aceptado"){
require_once "imports.php";
require_once "Bar.php";
?>
<div class="row">
    <div class="col s6 offset-s3">
        <div class="card hoverable">
            <div class="card-image">
                <img src="Danzlife.jpg">
            </div>
            <!--<div class="card-content">
                <p></p>
            </div>-->
        </div>
    </div>
</div>

<?php } } ?>