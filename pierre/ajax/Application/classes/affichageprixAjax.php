<?php
require ('categorie.class.php');

$produit = categorie::getUnProduit($_POST['CodeProduit']);

echo $produit->prix." €";

 ?>
