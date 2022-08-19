<?php session_start() ?>
<?php
include("shoppingCartClass.php");
$ob = new shopping();
if (isset($_REQUEST['addToCart'])) {
	$pid = $_REQUEST['pid'];
	$uid = $_REQUEST['userid'];
	$ob->addToCart($pid, $uid);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>ENEST-3</title>
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
					<?php
					if (isset($_REQUEST['pid'])) {
						$id = $_REQUEST['pid'];
						$products = $ob->cartProduct($id);
						foreach ($products as $product) {
					?>
							<div class="contact-us">
								<p><?php echo $product['productname'] ?></p>
							</div>
							<div class="dish-info">
								<div class="machine-pic">
									<div class="img">
										<img src="<?php echo $product['productimage'] ?>">
									</div>
									<div class="stock">
										<p>In Stock: <?php echo $product['productquantity'] ?></p>
									</div>
									<div class="detail">
										<span>Details:</span>
										<p><?php echo $product['productname'] ?></p>
									</div>
								</div>
								<div class="machine-info">
									<div class="washer">
										<p><?php echo $product['productname'] ?></p>
									</div>
									<div class="model-info">
										<span>Model:<?php echo $product['productname'] ?></span>
										<p>Manufacturer:<?php echo $product['productname'] ?></p>
									</div>
									<form>
										<input type="hidden" name="pid" value="<?php echo $_GET['pid'] ?>">
										<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
										<div class="quantity">
											<table>
												<tr>
													<td class="qty">Enter quantity</td>
													<td><input type="text" name="qty"></td>
												</tr>
											</table>
											<div class="price">
												<span>Rs.<?php echo $product['productprice'] ?></span>
											</div>
										</div>
										<div class="cart">
											<?php
											if (empty($_SESSION['username'])) {

											?>
												<a href="./signUp.php"><input type="button" value="Login to Buy"></a>
											<?php
											} else {
											?>
												<input type="submit" name="addToCart" value="Add to Cart">
											<?php
											}
											?>
										</div>
									</form>
									<div class="checkout">
										<a href="./checkout.php"><input type="button" value="checkout"></a>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>
					<div class="info">
						<form>
							<table class="table-info">
								<tr>
									<td class="nme">Enter name</td>
									<td><input type="" name=""></td>
								</tr>
								<tr>
									<td class="nme">Enter Email</td>
									<td><input type="" name=""></td>
								</tr>
								<tr>
									<td class="nme">Enter Review</td>
									<td><textarea></textarea></td>
								</tr>
								<tr>
									<td class="nme">Rating</td>
									<td><input type="" name=""></td>
								</tr>
								<tr>
									<td class="btnn-1">
										<input type="submit" name="" value="Submit query">
									</td>
								</tr>
							</table>
						</form>
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