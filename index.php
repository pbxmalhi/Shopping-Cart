<?php session_start() ?>
<?php
include("shoppingCartClass.php");
$ob = new shopping();
?>
<?php
if (!empty($_GET['log'])) {
	session_destroy();
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>ENEST-5</title>
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
				<div class="main-img">
					<img src="images/16.png">
				</div>
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
						<p>FEATURED PRODUCTS</p>
					</div>
					<div class="Camera-info">
						<!-- <div class="cam-info"> -->
						<?php
						$products = $ob->productDisplay();
						foreach ($products as $product) {

						?>
							<div class="samsung-cam">
								<div class="cam-info">
									<img src="<?php echo $product['productimage'] ?>">
									<div class="sam-prc">
										<span><?php echo $product['productname'] ?></span>
										<p><?php echo $product['productprice'] ?></p>
									</div>
									<hr class="hr2">
									<div class="cart-btn">
										<i class="fa fa-plus-circle iconn" aria-hidden="true"></i>
										<!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
										<i class="fa fa-plus" aria-hidden="true"></i>
										<i class="fa fa-cart-plus" aria-hidden="true"></i>
										<input type="submit" name="" value="Add to cart">
									</div>
								</div>
							</div>
						<?php
						}

						?>
						<!-- </div> -->
					</div>
				</div>
				<?php
				include("footer.php");
				?>
			</div>
		</div>
	</div>
</body>

</html>