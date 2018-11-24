<?php
	include("classes/categorie.class.php");
	try
	{
		if (isset($_POST["CodeProduit"])&($_POST["CodeProduit"]!=0))
	   {
			$produit = categorie::getUnProduit($_POST["CodeProduit"]);
			$prix = $produit->prix;
	   //var_dump($reponse);
	   echo json_encode($prix);
	   }

	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
?>
