<?php
class Produit
{
	private $codeProduit;
	private $nomProduit;
	private $prix;

	function __construct($codeProduit,$nomProduit,$prix) {
		$this ->codeProduit = $codeProduit ;
		$this ->nomProduit = $nomProduit ;
		$this ->prix = $prix;

    }

    /******************* Mutateurs publics *********************/
	// mutateurs magiques
	  public function __set($attribut,$valeur){
		switch ($attribut) {
			case'codeProduit': {$this->codeProduit=$valeur; break;}
			case'nomProduit': {$this->nomProduit=$valeur;break;}
			case'prix': {$this->prix=$valeur;break;}
		}
	}


    /*************************** Accesseurs publics ***************************/
    // Accesseur magique nécessaire
	public function __get($attribut){
	switch ($attribut) {
	case'codeProduit': return $this->codeProduit;
	case'nomProduit':return $this->nomProduit;
	case'prix':return $this->prix;

	}
	}

	public function __toString() {
     return "Code Produit: $this->codeProduit   Nom du Produit : $this->nomProduit   Prix du Produit : $this->prix\n";
   }
}

?>
