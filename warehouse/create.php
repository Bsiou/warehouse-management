<?php
    require 'database.php';
     
    if ( !empty($_POST)) {
		$name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price= $_POST['price'];
        $category= $_POST['category'];
        // create a product
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO product (category_id,name,quantity,price) values (?,?,?,?)";
		//$sql = "INSERT INTO product (name,quantity) values (?,".$quantity.")";
		$q = $pdo->prepare($sql);
		$q->execute(array($category,$name,$quantity,$price));
		//$q->execute(array($name));
		Database::disconnect();
		header("Location: index.php");
    }
?>