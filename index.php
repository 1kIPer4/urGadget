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

<?php
	$page__name = 'Сотовые телефоны';
	$page = $_GET['page'] ?? 1;
?>
<body id="<?php echo $page; ?>" class="<?php echo $page__name ?>">
	<!-- Шапка -->
	<?php 
		$name__page = 'burning goods';
		include_once('blocks/header.php');
	?>

	<section class="content" id="index">
		<div class="container">
			<div class="main">
				<!-- Слайдер -->
				<?php
					include_once('blocks/slider.php');
					//Фильтр
					include_once('blocks/filter.php');
				?>
				<div class="goods">
					<?php 
						include('blocks/burning goods.php');
					?>
					<div class="all__goods">
						<h2 class="title_h2">Смартфоны</h2>
						<ul>
							<?php
								$per_page = 8;

								$offset = ($per_page * $page) - $per_page;
								//Поиск
								$search = $_GET['search'] ?? "";
								$searchString = $search ? "&search=$search" : "";

								$total_count = R::count('products', "name LIKE ? ORDER BY id", ["%$search%"]);
								$products = R::find('products', "name LIKE ? ORDER BY id DESC LIMIT $offset,$per_page", ["%{$search}%"]);

								//Фильтр
								if (isset($_GET['do_filter'])) {
									$n = 0;
									/*if (isset($_GET['price_start'])) {
										$price_start = $_GET['price_start'];
										$products = R::find('products', 'price >= ?', $price_start);
										foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}
									if (isset($_GET['price_end'])) {
										$price_end = $_GET['price_end'];
										$products = R::find('products', 'price <= ?', $price_end);
										foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}*/
									if (isset($_GET['firm'])) {
									 	$firm = $_GET['firm'];
									 	$products = R::find('products', 'firm IN ('.R::genSlots($firm).')', $firm);
									 	foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}
									if (isset($_GET['diagonal'])) {
									 	$diagonal = $_GET['diagonal'];
									 	$products = R::find('products', 'diagonal IN ('.R::genSlots($diagonal).')', $diagonal);
									 	foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}
									if (isset($_GET['RAM'])) {
									 	$RAM = $_GET['RAM'];
									 	$products = R::find('products', 'RAM IN ('.R::genSlots($RAM).')', $RAM);
									 	foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}
									if (isset($_GET['screen'])) {
									 	$screen = $_GET['screen'];
									 	$products = R::find('products', 'screen IN ('.R::genSlots($screen).')', $screen);
									 	foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}
									if (isset($_GET['cpu'])) {
									 	$cpu = $_GET['cpu'];
									 	$products = R::find('products', 'cpu IN ('.R::genSlots($cpu).')', $cpu);
									 	foreach ($products as $prod) {
									 		$ids[] = $prod['id'];
									 	}
									 	$n++;
									}

									if ($n > 1) {
										if (isset($_SESSION['filt']) && $_SESSION['filt'] != 'or') {
											foreach( array_count_values($ids) as $key => $val ) {
												if ( $val > 1) $products__ids[] = $key;
											}
										} else {
											foreach ($ids as $key) {
												$products__ids[] = $key;
											}
										}
										
									} else if ($n == 1) {
										foreach ($ids as $key) {
											$products__ids[] = $key;
										}
									}

									$total_count = count($products__ids);
									if ($total_count > 0) $products = R::find('products', "id IN (".R::genSlots($products__ids).") ORDER BY id DESC LIMIT $offset,$per_page", $products__ids);
								}

								$total_pages = ceil($total_count / $per_page);
								if ( $page <= 1 || $page > $total_pages) {
									$page = 1;
								}
								
								if ( $total_count <= 0 ) {
									echo '<h1>Нет товаров!</h1>';
								} else {
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
													<img src="img/<?php echo $product['img']; ?>/<?php echo $product['img']; ?>.png" alt="<?php echo $product['name']; ?>"/>
												</div>	
												<div class="good__prices">
													<?php
														if ($discount) {
															?>
																<h2 class="price-red"><?php echo $pricered; ?>р.</h2>
																<h4 class="price"><?php echo $price; ?>р.<span class="red-line"></span></h4>
															<?php 
														} else {
															?>
																<h2 class="price-red"><?php echo $price; ?>р.</h2>
															<?php
														} 
													?>
												</div>
												<form method="POST">
													<div class="good__buttons">
														<button class="buy" onclick="location.href='/product.php?id=<?php echo $product['id']; ?>'">Купить</button>
														<button class="good__cart" value="<?php echo $product['id'];?>" name="do_addCart">
															<div class="cart__icon"></div>
														</button>
													</div>
												</form>
												<?php
													if ($discount) {
														?>
														<div class="discount">
															<span><?php echo $product['discount']; ?>%</span>
															скидка
														</div>
														<?php
													}
												?>
											</div>
										</li>
										<?php
									}
								}
							?>
						</ul>
					</div>
				</div>
				<?php
					include_once('blocks/paginator.php');
				?>
			</div>
		</div>
	</section>

	<!-- Футер -->
	<?php
		include_once('blocks/footer.php');
	?>
</body>
</html>