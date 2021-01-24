<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
	<body>
		<form id="updateFrom" action="fill_pack2.php" method="POST">
		<table border="1" cellpadding="10">
			<tr align='center'>
				<td>Product Quantity in the pack</th>
				<td><input name="pack_quantity" type="text" value=""/></td>
			</tr>
		</table>
		 <h3>Choose Category</h3> 
		<select name="pack">
		<?php
			   include 'database.php';
			   $id = $_POST['productId'];
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM pack ORDER BY pack_name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo '<option value="'. $row['Pack_id'].'">'.$row['Pack_name'].'</option>'  ;
			   }
			   Database::disconnect();
			  ?>
			</select>
			<br>
			<input type="hidden" id="productId" name="productId" value="<?php echo $id;?>"/>
		<button type="submit">Fill pack</button>
		</form>
	</body>
</html>