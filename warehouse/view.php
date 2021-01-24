<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
	<body>
	<h3>Warehouse Management CRUD Application - UNIWA Database II lab</h3>
	<?php
		include 'database.php';
		$id = $_POST['productId'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT name,quantity,product.category_id, category_name,price,price_fpa FROM product,product_category where product.category_id=product_category.category_id AND  id = ?"; 
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		$quantity = $data['quantity'];
		$price = $data ['price'];
		$price_fpa=$data ['price_fpa'];
		$category_name=$data['category_name'];
		$sql2="SELECT pack_name from pack where pack_id in(select pack_id from product_per_pack where id=?)";
		$q = $pdo->prepare($sql);
		$q2 = $pdo->prepare($sql2);
		$q2->execute(array($id));
		$data2 = $q2->fetchAll(PDO::FETCH_ASSOC);
	  ?>
		<table border="1" cellpadding="10">
			<tr align='center'>
				<td>Name</th>
				<td><?php echo $name;?></td>
			</tr>
			<tr align='center'>
				<td>Quantity</th>
				<td><?php echo $quantity;?></td>
			</tr>
			<tr align='center'>
				<td>Price</th>
				<td><?php echo $price;?></td>
			</tr>
			<tr align='center'>
				<td>Price with FPA</th>
				<td><?php echo $price_fpa;?></td>
			</tr>
			<tr align='center'>
			<td>Category Name</th>
				<td><?php echo $category_name;?></td>
			</tr>
				<td>Pack_name</th>
				<td><?php 
				for($i=0;$i<count($data2);$i++){
					echo $data2[$i]['pack_name'];
                    echo '<br>';
				}
				?></td>
			</tr>
		</table>
		<form id="returnFrom" action="index.php" method="GET">
		<button type="submit">back</button>
		</form>
	</body>
</html>

