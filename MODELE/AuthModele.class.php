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
}
	public function getMaxID() {
		// recupere l'idmax de l'association qui vient d'être insérée
		if ($this->idcASS) {
			$req= "SELECT max(IDASS) as MAXIDASS from association";
			$resultID = $this->idcASS->query($req)->fetch()->MAXIDASS;
			return $resultID;
		}
	}
	public function getAssociationS() {
		// recupere TOUTES les Associations de  la BDD
		if ($this->idcASS) {
			$req ="SELECT * from association ORDER BY NOMASS ASC;" ;
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}
}
?>
