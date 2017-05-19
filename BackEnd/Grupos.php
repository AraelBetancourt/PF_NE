<?php

/**
 * Created by PhpStorm.
 * User: beta
 * Date: 12/05/17
 * Time: 10:15 AM
 */
require_once "Conection.php";
class Grupos extends Conection
{
    public function __construct(){
        parent::__construct();
    }

    public function AltaCambioGrupo($ok){
        $result = $this->_db->query('call addUpdateGrupo('.$ok['id'].',"'.$ok['n'].'");');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function deleteg($ok){
        $result = $this->_db->query('call deleteGrupo('.$ok.');');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }


    public function getGrupoByID($ok){
        $result = $this->_db->query('SELECT * FROM grupos WHERE id='.$ok);
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getGrupos(){
        $result = $this->_db->query('SELECT * FROM grupos');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getGrupoAlumna($id){
        $result = $this->_db->query('select g.nombre as grupo from Alumnas a inner join grupos g on g.id=a.idgrupo where a.id='.$id.';');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }
}