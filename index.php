<?php
	//I hope we can work together 🧐
	require_once('config.php');
	require('main.php');
	$cProducts = new CProducts($HOST, $LOGIN, $PASSWORD, $DB_NAME);
	$rows = $cProducts->GetProducts();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>All Products | TestTask</title>
		<link rel="stylesheet" href="static/style.css">
		<style>
			body{
				font-family: sans-serif;
			}
			.main{
				width: 700px;
				max-width: 90%;
				display: flex;
				flex-direction: column;
				align-items: center;
				margin: 0 auto;
			}
			.product{
				width: 100%;
				display: flex;
				align-items: center;
				justify-content: flex-start;
			}
			.titles{
				width: 100%;
				display: flex;
				align-items: center;
				justify-content: flex-start;
			}
			span{
				height: 2em;
				font-size: .9em;
				width: 14%;
				padding: .7em .2em;
			}
		</style>
	</head>
	<body>
		<section class="main">
			<h1>Products list</h1>
			<div class="titles">
				<span>Id</span>
				<span>Product Id</span>
				<span>Product Name</span>
				<span>Product Price</span>
				<span>Product Article</span>
				<span>Date</span>
			</div>
			<?php foreach($rows as $row=>$value): ?>
				<div class="product" id="<?=$value['ID'];?>">
					<span><?=$value['ID'];?></span>
					<span><?=$value['PRODUCT_ID'];?></span>
					<span><?=$value['PRODUCT_NAME'];?></span>
					<span><?=$value['PRODUCT_PRICE'];?></span>
					<span><?=$value['PRODUCT_ARTICLE'];?></span>
					<span><?=$value['DATE_CREATE'];?></span>
					<div class="buttons">
						<button onclick='changeQuantity(<?=$value['ID'];?>, -1)'>-</button>

						<p id="quantity<?=$value['ID'];?>"><?=$value['PRODUCT_QUANTITY'];?></p>
						
						<button onclick='changeQuantity(<?=$value['ID'];?>, 1)'>+</button>
						<button onclick='hideProduct(<?=$value['ID'];?>)'>Hide</button>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>