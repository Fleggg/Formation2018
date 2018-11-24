<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>

	<title>ajax listes lieacutees</title>
	<link rel="stylesheet" type="text/css" href="styles/mesStyles.css" media="all" />
	<script type="text/javascript" src="jQuery/jQuery.js"></script>
	<script type="text/javascript" src="js/monjavascript.js"></script>
</head>

<body>
<?php
include("classes/Listecategories.class.php");
try
	{
		?>
		<form name='monform'>
		<div>
				<label>Categorie des produits</label>
				<select id='choixcateg'>
					<option value=0>choisir la categorie</option>
					<?php
						$maListeCategorie=new ListeCategorie();
						$maListeCategorie->chargeLesCategories();

						 foreach( $maListeCategorie->lesCategories as $uneCategorie)
						{
							echo "<option value=$uneCategorie->codeCateg>$uneCategorie->nomCateg</option>";
						}
					?>
				</select>
		</div>

		<div id="lesProduits" >

		</div>

		<div id="lePrix"></div>

		</form>
	</body>
</html>
<?php
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
