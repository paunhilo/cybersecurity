<?php
session_start ();
include ('../Class/autoload.php');
require_once ('../MODELE/AuthModele.class.php');
$AUTH = new AuthModele();
echo $_POST ['email'];
echo $_POST ['password'];
if ((isset ( $_POST ['email'] )) && (isset ( $_POST ['password'] ))) {
    if (($_POST ['email'] === $AUTH->getI($_POST ['email'])) && ($_POST ['password'] === $AUTH->getP($_POST ['password']))) {
        echo $AUTH->getI($_POST ['email']);
        $_SESSION ['email'] = $_POST ['email'];
        $_SESSION ['password'] = $_POST ['password'];
        header ('Location:success.html');		
    } else {
            header ('Location:index.php');
    }
}