<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 16/05/17
 * Time: 11:34 AM
 */
session_start();
if(!isset($_SESSION["Validado"])) {
    header("location:index.php");
}
else {
if($_SESSION['Validado']=="aceptado"){
require_once "imports.php";
//require_once "Bar2.php";
require_once "Bar.php";
require_once "../BackEnd/Pagos.php";
$p=new Pagos();
$res=$p->getPagosPrivados();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Alumnas</title>
</head>
<body>
<form >
    <div class="row">
        <div class="col l10 offset-l1 m12 s12">
            <table class="responsive-table" style="text-align: center">
                <thead>
                <th>Folio</th>
                <th>Nombre Alumna</th>
                <th>Grupo</th>
                <th>Nombre Mama</th>
                <th>Fecha de Pago</th>
                <th>Fecha de Envio</th>
                <th>Comprobante</th>
                <th>Folio</th>
                </thead>
                <tbody>
                <?php
                foreach ($res as $re){
                    echo "<tr>";
                    echo "<td>".$re['idpago']."</td>";
                    echo "<td>".$re['idalumna']." ".$re['apellido']."</td>";
                    echo "<td>".$re['idgrupo']."</td>";
                    echo "<td>".$re['nomMama']."</td>";
                    echo "<td>".$re['fechapago']."</td>";
                    echo "<td>".$re['fechaenvio']."</td>";
                    echo "<td> <a href=".$re['url']." target='_blank'>Ver</a></td>";
                    echo "<td>".$re['Folio']."</td>";
                    echo "</tr>";

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
</html>

<?php } } ?>