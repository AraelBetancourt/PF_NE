<?php

/**
 * Created by PhpStorm.
 * User: beta
 * Date: 14/05/17
 * Time: 02:16 PM
 */
require_once "Pagos.php";
if($_POST['IdAlumna']==""){
    echo "ia";
}else if($_POST['nom']==""){
    echo "3";
} else if($_POST['Ape']==""){
    echo "4";
}else if($_POST['Folio']==""){
    echo "fo";
} else if($_POST['FechaPago']==""){
    echo "5";
}else if($_FILES["file"]['name']) {
    $dir_subida = '/var/www/html/PF_NE/imagen/';
    $validextensions = array("pdf", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "application/pdf")
        ) && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "nes";
        }
        else
        {
            if (file_exists($dir_subida . $_FILES["file"]["name"])) {

                $re="";
                $date=date('U');
                $name=str_replace(" ", "_", $_FILES['file']['name']);
                $archivo1=$date.'_'.$name;
                //$archivo1=$date.'_'.$_FILES["file"]["name"];
                $Ficero="../imagen/". $archivo1;
                $fichero_subido = $dir_subida . $archivo1;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                    $p=new Pagos();
                    $re=$p->AddPago($_POST['IdAlumna'],$_POST['nom'],$_POST['Ape'],$_POST['FechaPago'],$Ficero,$_POST['Folio']);
                    echo $re;
                } else {
                    echo "Error";
                }
            }
            else
            {
                $re="";
                $date=date('U');
                $name=str_replace(" ", "_", $_FILES['file']['name']);
                $archivo1=$date.'_'.$name;
                $Ficero="../imagen/". $archivo1;
                $fichero_subido = $dir_subida .$archivo1;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                    $p=new Pagos();
                    $re=$p->AddPago($_POST['IdAlumna'],$_POST['nom'],$_POST['Ape'],$_POST['FechaPago'],$Ficero,$_POST['Folio']);
                    echo $re;
                } else {
                    echo "Error";
                }
            }
        }
    }
    else
    {
        echo "Tipo";
    }
}else
    echo "6";
?>
