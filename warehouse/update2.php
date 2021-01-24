<?php
    require 'database.php';
 
    $id = null;
     
    if ( !empty($_POST)) {
        $id = $_POST['productId'];
		$name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $category=$_POST['category'];
        $price=$_POST['price'];
        // update data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE product set name = ?, quantity = ?, category_id= ? , price = ? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$quantity,$category,$price,$id));
		Database::disconnect();
		header("Location: index.php");
    }
?>