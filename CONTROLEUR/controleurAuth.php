<?php

require_once ('../MODELE/AuthModele.class.php');
function listeEquipeAssociation()
{
$EQUMod = new EquipeModele();
return $EQUMod->getEquipesAssociations(); //requete via le modele
}
?>
