<?php
    require 'database.php';
    if ( !empty($_POST)) {
		$cat_name = $_POST['cat_name'];
		
        // create a product
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO product_category(category_name) values (?)";
		//$sql = "INSERT INTO product (name,quantity) values (?,".$quantity.")";
		$q = $pdo->prepare($sql);
		$q->execute(array($cat_name));
		//$q->execute(array($name));
		Database::disconnect();
		header("Location: index.php");
    }
?>