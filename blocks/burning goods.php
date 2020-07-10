<?php
	require_once "includes/handler.php";
?>

<div class="burning__goods">
	<?php
		$products = R::find('products', "ORDER BY discount DESC LIMIT 4");
	?>
		<h2 class="title_h2">Горящие товары</h2>
		<ul>
			<?php 
				foreach ( $products as $product)
				{
					$price = $product['price'];
					$discount = $product['discount'];
					$pricer = $price - ($price * $discount / 100);
					$pricered = floor($pricer/1000) * 1000 + 999;
					?>
					<li>
						<div class="good">
							<h3 class="name"><a href="/product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
							<div class="good__img">
								<img src="img/<?php echo $product['img']; ?>/<?php echo $product['img']; ?>.png" alt="<?php echo $product['name'];?>"/>
							</div>
							<div class="good__prices">
								<h2 class="price-red"><?php echo $pricered; ?>р.</h2>
								<h4 class="price"><?php echo $product['price']; ?>р.<span class="red-line"></span></h4>
							</div>
							<form method="POST">
								<div class="good__buttons">
									<button class="buy" onclick="location.href='/product.php?id=<?php echo $product['id']; ?>'">Купить</button>
									<button class="good__cart" value="<?php echo $product['id'];?>" name="do_addCart">
										<div class="cart__icon"></div>
									</button>
								</div>
							</form>
							<div class="discount">
								<span><?php echo $product['discount']; ?>%</span>
								скидка
							</div>
						</div>
					</li>
				<?php 
				}
			?>
	</ul>
</div>