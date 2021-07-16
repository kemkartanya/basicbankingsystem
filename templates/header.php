<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style>
	.header{
		background: black;
		color: white;
		display: flex;
	}
	#home{
		margin: 15px;
	}
	.btns{
		margin-left: 300px;
		display: flex;
	}
	.button {
  		background-color: #4CAF50;
  		border: none;
  		color: white;
  		padding: 15px 30px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 16px;
  		margin: 20px 10px;
  		cursor: pointer;
	}
	.button:hover{
		background-color: #e7e7e7;
		color:black;
	}
</style>
<body>
	<div class="header">
		<a href="index.php" id="home"><img src="images/home.png" width="50" height="50"></a>
		<h1>The Sparks Bank</h1>
		<div class="btns">
			<a href="transfermoney.php" class="button">View All Customers</a><br>
			<a href="transactions.php" class="button">See recent transactions</a>
		</div>
	</div>
</body>
</html>