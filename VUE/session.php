<?php
session_start ();
include ('../Class/autoload.php');
require_once ('../MODELE/AuthModele.class.php');

$AUTH = new AuthModele();

if (isset($_SESSION ['email']) && isset($_SESSION ['password'])) {
	$_SESSION = array ();
	if (ini_get ( "session.use_cookies" )) {
		$params = session_get_cookie_params ();
		setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"] );
	}
	session_destroy ();
    header ('Location:session.php');	
} else {
    if ((isset ( $_POST ['email'] )) && (isset ( $_POST ['password'] ))) {
        if ($AUTH->getI($_POST ['email']) === ($_POST ['email']) && ($AUTH->getP(md5($_POST ['password'], false)) === md5($_POST ['password'], false))) {
            
            $_SESSION ['email'] = $_POST ['email'];
            $_SESSION ['password'] = $_POST ['password'];
            header ('Location:success.php');		
        } else {
                header ('Location:index.php');
        }
    }
}