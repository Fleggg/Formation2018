<?php

include("categorie.class.php");
class ListeCategorie
{
private $lesCategories;
function __construct() {
		$this -> lesCategories=array() ;


    }
	public function __get($attribut){
	switch ($attribut) {
	case'lesCategories': return $this->lesCategories;
	}
	}

public function chargeLesCategories()
{
	include("connexion/connect.php");
   try
	{

		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost; dbname=baseproduits','root','', $pdo_options);

		$reponse = $bdd->prepare('SELECT CodeCateg, NomCateg FROM categorie');
		$reponse->execute();

		while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
        {
            $this->lesCategories[] = new Categorie($donnees['CodeCateg'], $donnees['NomCateg']);
        }

		return true;
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

}

public static function GetUneCategorie($idCategorie)
{
	include ("connexion/connect.php");
   try
	{

		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost; dbname=baseproduits','root','', $pdo_options);

		$reponse = $bdd->prepare('SELECT CodeCateg, NomCateg FROM categorie WHERE CodeCateg = ?');
		$reponse->execute(array($idCategorie));

		$donnees =$reponse->fetch();

		return $categorie = new Categorie($donnees['CodeCateg'], $donnees['NomCateg']);
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

}


}
/*
$maListeCategorie=new ListeCategorie();
$maListeCategorie -> chargeLesCategories();
foreach ($maListeCategorie->lesCategories as $uneCategorie)
{
$uneCategorie->getProduitsByCategorie();
echo $uneCategorie."<br />";
}
echo $maListeCategorie->GetUneCategorie(6); // cat�gorie viandes*/
?>
