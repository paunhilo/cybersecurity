<?php
session_start ();
include ('../Class/autoload.php');
require_once ('../MODELE/AuthModele.class.php');

$AUTH = new AuthModele();

if ((isset ( $_POST ['email'] )) && (isset ( $_POST ['password'] ))) {
    if ($AUTH->getI($_POST ['email']) === ($_POST ['email']) && ($AUTH->getP(md5($_POST ['password'], false)) === md5($_POST ['password'], false))) {
        
        $_SESSION ['email'] = $_POST ['email'];
        $_SESSION ['password'] = $_POST ['password'];
        header ('Location:success.php');		
    } else {
            header ('Location:index.php');
    }
}