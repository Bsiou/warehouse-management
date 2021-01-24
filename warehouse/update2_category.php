<?php
    require 'database.php';
 
    $id = null;
     
    if ( !empty($_POST)) {
        $category_id = $_POST['categoryId'];
		$category_name = $_POST['category_name'];
           // update datas
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE product_category set category_name = ? WHERE category_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($category_name,$category_id));
		Database::disconnect();
		header("Location: index.php");
    }
?>