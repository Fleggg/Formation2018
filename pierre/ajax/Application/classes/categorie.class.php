<?php

include("produit.class.php");
class Categorie
{
	private $codeCateg;
	private $nomCateg;
	private $lesProduits;

	function __construct($codeCateg,$nomCateg) {
		$this ->codeCateg=$codeCateg ;
		$this ->nomCateg=$nomCateg ;
		$this ->lesProduits=array();

    }

    /******************* Mutateurs publics *********************/
	// mutateurs magiques
	  public function __set($attribut,$valeur){

		switch ($attribut) {
	case'codeCateg': {$this->codeCateg=$valeur;break;}
	case'nomCateg': {$this->nomCateg=$valeur;break;}
	case'lesProduits': {$this->lesProduits=$valeur;break;}
		}
	}


    /*************************** Accesseurs publics ***************************/
    // Accesseur magique n�cessaire � TBS
	public function __get($attribut){
	switch ($attribut) {
	case'codeCateg': return $this->codeCateg;
	case'nomCateg':return $this->nomCateg;
	case'lesProduits':return $this->lesProduits;

	}
	}

	public function __toString() {
	$lesProduits="";
	foreach ($this->lesProduits as $unProduit)
	{ $lesProduits=$lesProduits."/ ".$unProduit->codeProduit." ".$unProduit->nomProduit." ".$unProduit->prix;
	}

     return "Code cat�gorie: $this->codeCateg   Nom de la cat�gorie : $this->nomCateg  les Produits : $lesProduits \n";
   }

	public function getProduitsByCategorie()
   {

   include ("connexion/connect.php");

   if(!is_null($this->codeCateg))
   {
	   try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost; dbname=baseproduits','root','', $pdo_options);

			$reponse = $bdd->prepare('SELECT codeProduit, nomProduit, prix FROM produits WHERE CodeCateg = :codeCateg');
			$reponse->bindParam(':codeCateg', $this->codeCateg, PDO::PARAM_INT);
			$reponse->execute();

			while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
			{
				$this->lesProduits[] = new Produit($donnees['codeProduit'], $donnees['nomProduit'], $donnees['prix']);
			}

			return true;
		}
		catch (Exception $e)
		{
	        die('Erreur : ' . $e->getMessage());
		}
   }
   }
    public static function getUnProduit($idProduit)
 {
   //Cette m�thode renvoie un objet produit dont le code est $idProduit
   include ("connexion/connect.php");
   try
   {
	   $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	   $bdd = new PDO('mysql:host=localhost; dbname=baseproduits','root','', $pdo_options);

	   $reponse = $bdd->prepare('SELECT codeProduit, nomProduit, prix FROM produits WHERE codeProduit = :codeProd');
	   $reponse->bindParam(':codeProd', $idProduit, PDO::PARAM_INT);
	   $reponse->execute();
	   $donnees = $reponse->fetch();

	   return $produits = new Produit($donnees['codeProduit'], $donnees['nomProduit'], $donnees['prix']);
   }
   catch (Exception $e)
   {
   		die('Erreur : ' . $e->getMessage());
   }


}
}

?>
