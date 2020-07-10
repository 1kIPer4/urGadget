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
	<section class="content" class="cart">
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
					/*$products = $user->sharedProductsList;*/

					$search = $data['search'];
					if (isset($data['do_search']) && $search != '') {
						$products = $user->withCondition('(name = "" ORDER BY `price` DESC')->sharedProductsList;
					} else {
						$products = $user->sharedProductsList;
					}
					

					/*$search = $data['search'];
					if (isset($data['do_search']) && $search != '') {
						$products1 = $user->sharedProductsList;
						foreach ( $products1 as $products2) {
							$products_id = $products2->id;
							$products = R::find('products', 'name LIKE :search AND id = :id', [':id' => (int) $products_id, ':search' => "%$search%"]);
						}
							dumb($products);
					} else {
						$products = $user->sharedProductsList;
					}*/
				}
			?>
			<h1  class="cart__title">
				Ваша корзина товаров<?php if (!isset($_SESSION['logged_user']) || $products__cart <= 0) : ?> пуста <?php endif; ?>
			</h1>
			<ul>
				<?php
					if (isset($_SESSION['logged_user'])) {
						/*$search = $data['search'];
						if (isset($data['do_search']) && $search != '') {
							foreach ( $products as $product)
							{
								$products_id = $product->id;
								$products = R::find('products', 'name LIKE :search AND id = :id', [':id' => (int) $products_id, ':search' => "%$search%"]);
							}
						}*/
						foreach ( $products as $product)
						{
							$price = $product['price'];
							$discount = $product->discount;
							$pricer = $price - ($price * $discount / 100);
							$pricered = floor($pricer/1000) * 1000 + 999;
							$benefit = ceil(($price - $pricered) /1000 ) * 1000;
							?>
								<li class="your__product">
									<img src="img/<?php echo $product['img']; ?>/<?php echo $product['img']; ?>.png" alt="<?php echo $product['name']; ?>.png" alt="smartphone"/>
									<div class="cart__offer">
										<h2><?php echo $product['name'];?></h2>
										<div class="offer__info">
											<ul>
												<li class="cart-info">Гарантия: 1 год</li>
												<li class="cart-info">Разрешение экрана: 2560x1080</li>
												<li class="cart-info">Батарея: 3700 м/Ам</li>
												<li class="cart-info">Камера: 24 Mп</li>
												<li class="cart-info">Диагональ экрана: 5.8”</li>
												<li class="cart-info">Вес товара: 175 гр.</li>
											</ul>
											<div class="cart__price">
												<div class="offer__price">
													<div class="offer__right clearfix">
														<h4 class="price"><?php echo $product['price'];?>р.<span class="red-line"></span></h4>
													</div>
													<div class="offer__left">
														<h1 class="price-red"><?php echo $pricered;?>р.</h2>
													</div>
												</div>
											</div>
										</div>
										<h3>Ваша выгода составила: <?php echo $benefit;?> рублей</h3>
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
	</section>
	
	<!-- Футер -->
	<?php
		include_once('blocks/footer.php');
	?>
</body>
</html>