<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 15/05/17
 * Time: 04:18 PM
 */
require_once "Grupos.php";
require_once "Alumnas.php";
require_once "Login.php";
switch ($_POST['Action']){
    case "Grupos2":
        switch ($_POST['Metodo']){
            case "DeleteG":
                $g=new Grupos();
                $res = $g->deleteg($_POST['atributos']);
                //unset($g);
                echo json_encode($res);
                //echo $res;
                break;
        }
        break;
    case "Grupos":
            switch ($_POST['Metodo']){
                case "Alumnas ID":
                    $g=new Grupos();
                    $res = $g->getGrupoAlumna($_POST['atributos']);
                    unset($g);
                    echo json_encode($res);
                    break;
                case "GetGrupos":
                    $g=new Grupos();
                    $res = $g->getGrupos();
                    unset($g);
                    echo json_encode($res);
                    break;
                case "GetGruposById":
                    $g=new Grupos();
                    $res = $g->getGrupoByID($_POST['id']);
                    unset($g);
                    echo json_encode($res);
                    break;
                case "addUpdateGrupo":
                    $g=new Grupos();
                    $res = $g->AltaCambioGrupo($_POST['atributos']);
                    unset($g);
                    echo json_encode($res);
                    break;

            }
        break;
    case "Alumnas":
        switch ($_POST['Metodo']){
            case "GetAlumnas":
                $g=new Alumnas();
                $res = $g->getAlumnas();
                unset($g);
                echo json_encode($res);
                break;
            case "GetAlumnasbyGrupo":
                $g=new Alumnas();
                $res = $g->getAlumnasBygrupo($_POST['id']);
                unset($g);
                echo json_encode($res);
                break;
            case "deleteAlumna":
                $g=new Alumnas();
                $res = $g->deleteA($_POST['atributos']);
                unset($g);
                echo json_encode($res);
                break;
            case "GetAlumnas2":
                $g=new Alumnas();
                $res = $g->getAlumnas2();
                unset($g);
                echo json_encode($res);
                //echo "Hola";
                break;
            case "GetAlumnasById":
                $g=new Alumnas();
                $res = $g->getAlumnasbIDAlumna($_POST['id']);
                unset($g);
                echo json_encode($res);
                break;
            case "Alta_Update":
                $g=new Alumnas();
                $res = $g->AddorCambioAlumna($_POST['atributos']);
                unset($g);
                echo json_encode($res);
                break;
        }
        break;
    case "Login":
            $l=new Login();
            $res=$l->login($_POST['username'],$_POST['password']);
            unset($l);
            echo json_encode($res);
        break;
    default:
        echo "No encontrado";
        break;
}