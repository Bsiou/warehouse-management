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
		$sql = "SELECT * FROM product where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		$quantity = $data['quantity'];
		$price=$data['price'];
		Database::disconnect();
	  ?>
		<form id="updateFrom" action="update2.php" method="POST">
		<table border="1" cellpadding="10">
			<tr align='center'>
				<td>Name</th>
				<td><input name="name" type="text" value="<?php echo $name;?>"/></td>
			</tr>
			<tr align='center'>
				<td>Quantity</th>
				<td><input name="quantity" type="text" value="<?php echo $quantity;?>"/></td>
			</tr>
			<tr align='center'>
				<td>Price</th>
				<td><input name="price" type="text" value="<?php echo $price;?>"/></td>
			</tr>
		</table>
		<select name="category">
			<?php
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM product_category ORDER BY category_name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo '<option value="'. $row['category_id'].'">'.$row['category_name'].'</option>' ;
			   }
			   Database::disconnect();
			  ?>
			</select>
			<br>
		<input type="hidden" id="productId" name="productId" value="<?php echo $id;?>"/>
		<button type="submit">update</button>
		</form>

	</body>
</html>