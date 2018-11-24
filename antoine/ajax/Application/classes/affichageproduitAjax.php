<?php

require ("Listecategories.class.php");

$categorie = ListeCategorie::GetUneCategorie($_POST['choixcateg']);
$categorie->getProduitsByCategorie();

 ?>
<label>Produits </label>
<select id="listProduits" name="">


<?php

foreach ($categorie->lesProduits as $produit)
{
  echo "<option value=$produit->codeProduit>$produit->nomProduit</option>";
}

 ?>
</select>
