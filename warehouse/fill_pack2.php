<?php
    require 'database.php';
     
    if ( !empty($_POST)) {
    	$id = $_POST['productId'];
        $pack_quantity = $_POST['pack_quantity'];
        $pack_id= $_POST['pack'];
        // create a product
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO product_per_pack (pack_id,id,pack_quantity) values (?,?,?)";
		//$sql = "INSERT INTO product (name,quantity) values (?,".$quantity.")";
		$q = $pdo->prepare($sql);
		$q->execute(array($pack_id,$id,$pack_quantity));
		//$q->execute(array($name));
		Database::disconnect();
		header("Location: index.php");
    }
?>