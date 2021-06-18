<?php
require_once ('../MODELE/AuthModele.class.php');

if (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] ) ) {
    $AUTH = new AuthModele();
		$auth = $AUTH->get( $_POST ['email'], $_POST ['password']);
}
header ( 'Location: ../VUE/inscriptionEquipeCoureurs.php?auth='.$auth');
?>
