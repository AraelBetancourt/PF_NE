<?php

/**
 * Created by PhpStorm.
 * User: beta
 * Date: 14/05/17
 * Time: 08:08 PM
 */
require_once "Conection.php";
class Pagos extends Conection
{
    public function __construct(){
        parent::__construct();
    }

    public function AddPago($ida,$nom,$apm,$fechaPago,$url,$fo){
        $result=$this->_db->query('call addPago('.$ida.',"'.$nom.'","'.$apm.'","'.$fechaPago.'","'.$url.'","'.$fo.'");');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getPagosPrivados(){
        $result = $this->_db->query('SELECT * FROM AlumnasPrivada');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }

    public function getPagospublicos(){
        $result = $this->_db->query('SELECT * FROM AlumnasPrivada');
        $art = $result->fetch_all(MYSQLI_ASSOC);
        return $art;
    }
}