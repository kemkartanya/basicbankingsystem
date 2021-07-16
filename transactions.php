<?php

	include 'config/db_connect.php';
	$sql = 'SELECT * FROM transactions';
	$result = mysqli_query($conn, $sql);
	$trans = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$trans = array_reverse($trans);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transactions</title>
</head>
<?php include 'templates/header.php' ?>
<style type="text/css">
	body{
		background: #7fffd4;
	}
	.container{
        margin-left: 350px;
    }
	th, td {
		background: whitesmoke;
		border: 1px solid black;
		padding: 5px;
	}

</style>
<body>
	<div class="container">
	<h2>Recent Transactions</h2>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th scope="col">Sender</th>
				<th scope="col">Reciever</th>
				<th scope="col">Amount (₹)</th>
				<th scope="col">done at</th>
			</tr>
		</thead>

		<?php foreach ($trans as $tran): ?>
		
		<tr>
			<td><?php echo htmlspecialchars($tran['id']); ?></td>
			<td><?php echo htmlspecialchars($tran['sender']); ?></td>
			<td><?php echo htmlspecialchars($tran['receiver']); ?></td>
			<td>₹<?php echo htmlspecialchars($tran['amount']); ?></td>
			<td><?php echo htmlspecialchars($tran['done_at']); ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>