<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 12/05/17
 * Time: 09:54 AM
 */

class Alumnas extends Conection{
    public function __construct(){
        parent::__construct();
    }

    public function BajaAlumna(){

    }

    public function getAlumnas2(){
        $result = $this->_db->query('SELECT * FROM Alumnas');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getAlumnasBygrupo($id){
        $result = $this->_db->query('SELECT * FROM Alumnas where idgrupo='.$id.';');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getAlumnas(){
        $result = $this->_db->query('SELECT * FROM Alumnas_Vista');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getAlumnasbIDAlumna($id){
        $result = $this->_db->query('SELECT * FROM Alumnas WHERE id='.$id.';');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function AddorCambioAlumna($ok){
        $result = $this->_db->query("call AddorUpdateAluman(".$ok['id'].",'".$ok['n']."','".$ok['ape']."','".$ok['fn']."',".$ok['grupo'].");");
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function deleteA($ok){
        $result = $this->_db->query('call DeleteAlumna('.$ok.');');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }
}