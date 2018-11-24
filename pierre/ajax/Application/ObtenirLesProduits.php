<?php
	include("classes/Listecategories.class.php");
	try
	{
		if (isset($_POST["codeCateg"])&($_POST["codeCateg"]!=0))
		{
		 $maListeCategorie=new ListeCategorie();
		 $maListeCategorie -> chargeLesCategories();
		 $macategorie=$maListeCategorie->GetUneCategorie($_POST["codeCateg"]);
		 $macategorie->getProduitsByCategorie();

		if(count($macategorie->lesProduits)!=0)
		{
			?>
			<?php
			$reponse=array();
			foreach($macategorie->lesProduits as $unProduit)
			{
				$reponse[$unProduit->codeProduit] = utf8_encode($unProduit->nomProduit);
			}
		}
		else
		{
			$reponse[0] = utf8_encode('Aucun Produit');
		}
		//var_dump($reponse);
		echo json_encode($reponse);
		}

		/* while(list($index, $valeur) = each($reponse)){
				echo "$index = $valeur <br>";
				} */


		//var_dump($reponse);

	}
	catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
