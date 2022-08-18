<?php
include("shoppingCartClass.php");
$ob = new shopping();
if (isset($_POST['send'])) {
	$ob->contactUs($_POST);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>ENEST-1</title>
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
						<p>CONTACT US</p>
					</div>
					<div class="costomer-info">
						<div class="costomer-service">
							<p>Customer Service:91 7508115758</p>
							<p>Ludhiana,Punjab,INDIA</p>
							<p>Yorex Infotec.</p>
						</div>
						<hr class="hr">
						<div class="info">
							<div class="required-info">
								<h4>Contact Us</h4>
								<p>Have a question? We have 24x7 Costomer Service.</p>
								<p>Befor you contact us,skim through our self Serve opton and Frequently Asked Question for Quicker answer.</p>
								<p>Want to know more about the status of the orders?</p>
								<p>Login to view our order.</p>
							</div>
						</div>
						<div class="border">
							<div class="border-1">
								<div class="border-2">
									<p>Contact Us</p>
								</div>
								<div class="requir-info">
									<span>*Required information</span>
								</div>
								<div class="input-info">
									<div class="input-information">
										<form method="POST">
											<table class=" form">
												<tr>
													<td>
														<p>full Name* </p>
													</td>
													<td><input type="text" name="name"></td>
												</tr>
												<tr>
													<td>
														<p>E-mail Address </p>
													</td>
													<td><input type="email" name="email"></td>
												</tr>
												<tr>
													<td>
														<p>Message</p>
													</td>
													<td><textarea name="message"></textarea></td>
												</tr>
											</table>
											<div class="snd-btn">
												<input type="submit" value="Send Now" name="send">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
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