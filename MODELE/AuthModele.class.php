<?php
require_once '../Class/Connexion.class.php';

class AuthModele {

	private $id = null;

	public function __construct() {
		// creation de la connexion afin d'executer les requetes
		try {
			$Connexion = new Connexion();
			$this->id = $Connexion->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}

	public function get($i, $p) {
		if ($this->id) {
			$req= "SELECT identifiant, password from auth WHERE identifiant = ".$i." AND password = ".$p.";";
			$auth = $this->id->query($req);
			return $auth;
		}
	}

	public function getP($p) {
		if ($this->id) {
			$req= "SELECT password from auth WHERE password = '".$p."';";
			$pass = $this->id->query($req)->fetch()->password;
			return $pass;
		}
	}

	public function getI($i) {
		if ($this->id) {
			$req= "SELECT identifiant from auth WHERE identifiant = '".$i."';";
			$id = $this->id->query($req)->fetch()->identifiant;
			return $id;
		}
	}
}
?>
