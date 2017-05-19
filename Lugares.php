<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 14/05/17
 * Time: 09:31 PM
 */

require_once "imports.php";
require_once "Bar.php";
require_once "BackEnd/Pagos.php";
$p=new Pagos();
$res=$p->getPagospublicos();
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
            <table class="striped" style="text-align: center">
                <thead>
                <th>Folio</th>
                <th>Nombre Alumna</th>
                <th>Grupo</th>
                <th>Nombre Mama</th>
                <th>Fecha de Pago</th>
                <th>Fecha de Envio</th>
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
