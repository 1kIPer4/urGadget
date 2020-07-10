<?php
	require_once "includes/config.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
		include_once('blocks/head.php');
	?>
	<title>urGadget Official Website</title>
</head>

<body>
	<!-- Шапка -->
	<?php 
		include_once('blocks/header.php');
	?>
	<section class="content" id="cart">
		<div class="container">
			<?php 
				include_once('blocks/slider.php');
			?>
			<div class="main" id="your__products">
				<?php
					// buttons
					include "blocks/confirmation.php";
					include('blocks/by_one_click.php');
				?>
				<?php
					if (isset($_SESSION['logged_user'])) {
						$user = R::load('users', ($_SESSION['logged_user'])->id);

						$search = $_GET['search'] ?? "";
						$products = $user->withCondition('name LIKE ? ORDER BY id DESC', ["%{$search}%"])->sharedProductsList;
					}
				?>
				<h1  class="cart__title">
					Ваша корзина товаров<?php if (!isset($_SESSION['logged_user']) || $products__cart <= 0) : ?> пуста <?php endif; ?>
				</h1>
				<ul>
					<?php
						if (isset($_SESSION['logged_user'])) {
							foreach ( $products as $product)
							{
								$price = $product['price'];
								$discount = $product['discount'];
								$pricer = $price - ($price * $discount / 100);
								$pricered = floor($pricer/1000) * 1000 + 999;
								$benefit = ceil(($price - $pricered) /1000 ) * 1000;
								?>
									<li class="your__product">
										<img src="img/<?php echo $product['img']; ?>/<?php echo $product['img']; ?>.png" alt="<?php echo $product['name']; ?>.png"/>
										<div class="cart__offer">
											<h2><a href="/product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name'];?></a></h2>
											<div class="offer__info">
												<ul>
													<li class="cart-info">Гарантия: 1 год</li>
													<li class="cart-info">Разрешение экрана: <?php echo $product['screen']?></li>
													<li class="cart-info">Батарея: 3700 м/Ам</li>
													<li class="cart-info">Камера: 24 Mп</li>
													<li class="cart-info">Диагональ экрана: <?php echo $product['diagonal']?>”</li>
													<li class="cart-info">Вес товара: 175 гр.</li>
												</ul>
												<div class="cart__price">
													<div class="offer__price">
														<div class="offer__right clearfix">
															<h3>Итоговая цена</h3>
															<h4 class="price"><?php echo $product['price'];?>р.<span class="red-line"></span></h4>
														</div>
														<div class="offer__left">
															<h1 class="price-red"><?php echo $pricered;?>р.</h2>
														</div>
													</div>
												</div>
											</div>
											<h3 class="benefit">Ваша выгода составила: <?php echo $benefit;?>р.</h3>
										</div>
										<div class="cart__buttons">
											<button class="add__cart">
												Перейти к оплате
											</button>
											<div class="by_one_click">
												<a>Купить в 1 клик</a>
											</div>
										</div>
										<button class="close close__product" value="<?php echo $product['id'];?>">
											<span></span>
											<span></span>
										</button>
									</li>
								<?php
							}
						}
					?>
				</ul>
			</div>
			<?php  
				include('blocks/burning goods.php');
			?>
		</div>
	</section>
	
	<!-- Футер -->
	<?php
		include_once('blocks/footer.php');
	?>
</body>
</html>