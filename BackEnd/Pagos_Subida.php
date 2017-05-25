<?php

/**
 * Created by PhpStorm.
 * User: beta
 * Date: 14/05/17
 * Time: 02:16 PM
 */
require_once "Pagos.php";
if($_POST['IdAlumna']==""){
    echo json_encode("ia");
}else if($_POST['nom']==""){
    echo json_encode("3");
} else if($_POST['Ape']==""){
    echo json_encode("4");
}else if($_POST['Folio']==""){
    echo json_encode("fo");
}else if(strlen($_POST['Folio'])<6){
    echo json_encode("fol");
} else if($_POST['FechaPago']=="") {
    echo json_encode("5");
}else if($_FILES["file"]['name']) {
    $dir_subida = '/var/www/html/PF_NE/imagen/';

                $re="";
                $date=date('U');
                $name=str_replace(" ", "_",  basename($_FILES['file']['name']));
                $archivo1=$date.'_'.$name;
                $Ficero="../imagen/". $archivo1;
                $fichero_subido = $dir_subida .$archivo1;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                    $p=new Pagos();
                    $re=$p->AddPago($_POST['IdAlumna'],$_POST['nom'],$_POST['Ape'],$_POST['FechaPago'],$Ficero,$_POST['Folio']);
                    echo json_encode($re);
                } else {
                    echo json_encode("Error");
                }

                if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                   // echo "El fichero es válido y se subió con éxito.\n";
                } else {
                    //echo "¡Posible ataque de subida de ficheros!\n";
                }


}else
    echo "6";
?>
