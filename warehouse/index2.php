<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<script type="text/javascript">
	function doDBAction(id,page_name) {
		//alert(page_name);
		document.getElementById("productId").value = id;
		document.forms["viewFrom"].action = page_name;
		document.forms["viewFrom"].submit(); 
	}
	</script>
</head>
	<body>
	<h3>Eshop CRUD App - Database lab of TEIPIR</h3>
		<table border="1" cellpadding="10">
			<tr align='center'>
				<th>Name</th>
				<th>Quantity</th>
				<th>Action</th>
			</tr>
			<form id="viewFrom" method="POST">
			<input type="hidden" id="productId" name="productId" value=""/>
			  <?php
			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM product ORDER BY name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo "<tr align='center'>";
						echo '<td>'. $row['name'] . '</td>';
						echo '<td>'. $row['quantity'] . '</td>';
						echo '<td><button type="button" onclick="doDBAction('.$row['id'].',\'view.php\')">view</button><button type="button" onclick="doDBAction('.$row['id'].',\'update.php\')">update</button><button type="button" onclick="doDBAction('.$row['id'].',\'delete.php\')">delete</button></td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </form>
		</table>
		<form id="createFrom" action="create.html" method="POST">
			<button type="submit">createtest</button>
		</form>
		<form id="create_catFrom" action="create_cat.html" method="POST">
			<button type="submit">create_cat</button>
		</form>
	</body>
</html>