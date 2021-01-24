<?php
    require 'database.php';
    $id = -1;
     
    if (!empty($_POST)) {
        // keep track post values
        $category_id = $_POST['categoryId'];
        echo $category_id;
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM product_category  WHERE category_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($category_id));
        Database::disconnect();
        header("Location: index.php");
    }
?>