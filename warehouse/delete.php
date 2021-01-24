<?php
    require 'database.php';
    $id = -1;
     
    if (!empty($_POST)) {
        // keep track post values
        $id = $_POST['productId'];
        echo $id;
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql2 = "DELETE FROM product_per_pack  WHERE id = ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($id));
        $sql = "DELETE FROM product  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }
?>