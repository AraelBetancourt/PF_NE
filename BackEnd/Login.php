<?php

/**
 * Created by PhpStorm.
 * User: beta
 * Date: 18/05/17
 * Time: 10:37 PM
 */
class Login extends Conection
{
    public function __construct(){
        parent::__construct();
    }

    public function login($u,$p){
        $ok=$this->_db->query("call login('".$u."','".$p."')");
        //$ok=$this->_db->query("call login('admin','admin')");
        $art = $ok->fetch_all(MYSQLI_ASSOC);
        return $art;
    }
}