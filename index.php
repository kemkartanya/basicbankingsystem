<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BANKING SYSTEM</title>
</head>
<style>
	#mainimage{
		margin-left: 200px;
	}
	.image{
		margin: 40px 70px;
	}
	.main{
		display: flex;
	}
	.abt{
		margin-left: 80px;
	}
</style>
<body style="background: #f0f8ff;">
	<?php include 'templates/header.php'; ?>
	<h2>Welcome to Our Banking Service</h2>
	<div class="main">
		<div class="cont">
			<div class="abt"><h3>➢ 24X7 service available</h3></div>
			<div class="abt"><h3>➢ Do banking in just one click</h3></div>
			<div class="abt"><h3>➢ Safe and guarenteed transactions</h3></div>
		</div>
		<img src="images/image1.jpg" id="mainimage">
	</div>

	<div class="images">
		<img src="images/padlock.png" width="100" height="100" class="image">
		<img src="images/mobile-banking.png" width="100" height="100" class="image">
		<img src="images/bank.png" width="100" height="100" class="image">
		<img src="images/saving.png" width="100" height="100" class="image">
		<img src="images/card.png" width="100" height="100" class="image">
	</div>	
	<script type="text/javascript">
		let current = 1;
		function imageChanger() 
		{ setInterval("changeImage()", 3000); }

		function changeImage() { 
			current++;
			if(current > 3) current=1;
			document.getElementById("mainimage").src="images/image"+current+".jpg";
		}
		imageChanger();
	</script>
	<?php include('templates/footer.php'); ?>
</body>
</html>