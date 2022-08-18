<?php
include("shoppingCartClass.php");
$ob = new shopping();
?>

<!DOCTYPE html>
<html>

<head>
	<title>ENEST-4</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Catamaran&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="main-div">
		<?php
		include("header.php");
		?>
		<div class="home-page">
			<?php
			include("menu.php");
			?>
		</div>
		<div class="null">

		</div>
		<div class="main-categorious">
			<div class="footer">
				<div class="categorious">
					<div class="cate-heading">
						<p>CATEGORIES</p>
					</div>
					<div class="items">
						<ul>
							<?php
							$categories = $ob->categoryDisplay();
							foreach ($categories as $category) {
							?>
								<a href="products.php?cid=<?php echo $category['id'] ?>" style="text-decoration: none;">
									<li><?php echo $category['category'] ?></li>
								</a>
							<?php
							}

							?>
						</ul>
					</div>
				</div>
				<div class="contact">
					<div class="contact-us">
						<p>Dishwasher</p>
					</div>
					<div class="product-info">
						<span>Sort by:</span>
						<form>
							<select>
								<option>product name</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</form>
					</div>
					<div class="display-product">
						<span>Displaying 1 to 5(of 6 new product)</span>
						<div class="btnnn">
							<input class="pre" type="submit" name="" value="Previous">
							<input class="nxt" type="submit" name="" value="Next">
						</div>
					</div>
					<?php
					if (isset($_REQUEST['cid'])) {
						$id = $_REQUEST['cid'];
						$products = $ob->getProduct($id);
						foreach ($products as $product) {
					?>
							<div class="dish-info">
								<div class="machine-pic">
									<div class="img">
										<img src="<?php echo $product['productimage'] ?>">
									</div>
									<div class="stock">
										<p>In Stock: <?php echo $product['productquantity'] ?></p>
									</div>
								</div>
								<div class="machine-info">
									<div class="date">
										<span> Date Added:2013-06-01 08:05:32</span>
									</div>
									<!-- <hr class="hr"> -->
									<div class="washer">
										<p><?php echo $product['productname'] ?></p>
									</div>
									<div class="model-info">
										<span>Model:<?php echo $product['productname'] ?></span>
										<p>Manufacturer:<?php echo $product['productname'] ?></p>
									</div>
									<div class="price">
										<span>Rs.<?php echo $product['productprice'] ?></span>
									</div>
									<div class="checkout">
										<a href="./buyCart.php?pid=<?php echo $product['id'] ?>">
											<input type="submit" name="" value="BUY NOW">
										</a>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
				<?php
				include("footer.php");
				?>
			</div>
		</div>
	</div>
</body>

</html>