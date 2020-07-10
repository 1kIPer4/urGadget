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
		<!-- Фильтр -->
		<?php 
			include_once('blocks/filter.php');
		?>
		</div>
		<div class="main">
			<?php
				include_once('blocks/slider.php');
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

								$categories = array();
								$valCategories = array();

							/*4**/	/*if(isset($_GET['firm'])) {
										$categories[] = ($categories[0] == "" ? "firm" : " AND firm") . " = :firm";
										$valCategories[] = "'firm' => '".[$_GET['firm']]."'";
									}*/

						 /*3**/   if (isset($_GET['firm'])) {
									$categories[] = ($categories[0] == "" ? "firm" : " AND firm") . " = :firm";
									$valCategories[] = "':firm' => ".[$_GET['firm']]."";
								}
								if (isset($_GET['diagonal'])) {
									$categories[] = ($categories[0] == "" ? "diagonal" : " AND diagonal") . " = :diagonal";
									$valCategories[] = "':diagonal' => ".[$_GET['diagonal']]."";
								}
								if (isset($_GET['RAM'])) {
									$categories[] = ($categories[0] == "" ? "ram" : " AND ram") . " = :diagonal";
									$valCategories[] = "':ram' => ".[$_GET['ram']]."";
								}
								if (isset($_GET['screen'])) {
									$categories[] = ($categories[0] == "" ? "screen" : " AND screen") . " = :diagonal";
									$valCategories[] = "':screen' => ".[$_GET['screen']]."";
								}
								if (isset($_GET['core'])) {
									$categories[] = ($categories[0] == "" ? "core" : " AND core") . " = :diagonal";
									$valCategories[] = "':core' => ".[$_GET['core']]."";
								}

								foreach ($categories as $category) {
									$categoriesUl .= $category;
								}
								foreach ($valCategories as $valCategory) {
									$valCategoriesUl ? $valCategoriesUl .= ', ' . $valCategory : $valCategoriesUl .= $valCategory;
								}
								// echo $valCategoriesUl;
								/*$total_count = R::count('products', "name LIKE ? ORDER BY id", ["%$search%"]);*/

						/* 3*  $products = R::find('products', "$categoriesUl ORDER BY id DESC LIMIT $offset,$per_page", $valCategoriesUl);

								echo $valCategoriesUl . '<br/>';
								echo "R::find('products', '".$categoriesUl." ORDER BY id DESC LIMIT $offset,$per_page, ". $valCategoriesUl."')";*/
								/*$products = R::find('products', "`firm` IN (".R::genSlots($valCategoriesUl).") ORDER BY id DESC LIMIT $offset,$per_page", [$_GET['firm']] );*/
						/* 4*   $products = R::getAll('SELECT * FROM products WHERE name = ?', ['samsung']);
								echo "$products = R::getAll('SELECT * FROM `products` WHERE $categoriesUl', [
								$valCategoriesUl])";*/
							}
					/* 1    if (isset($_GET['do_filter'])) {
								$filter = array();
								$characteristic = array();

								$Fprice = $_GET['price'] ?? "";
								$Ffirm = $_GET['firm'] ?? "";
								$Fdiagonal = $_GET['diagonal'] ?? "";
								$FRAM = $_GET['RAM'] ?? "";
								$FScreen = $_GET['Screen'] ?? "";

								if ($Fprice != '') {
									$characteristic[] = `price`;
									$filter[] = $Fprice;
								}
								if ($Ffirm != '') {
									$characteristic[] = `firm`;
									$filter[] = $Ffirm;
								}
								if ($Fdiagonal != '') {
									$characteristic[] = `diagonal`;
									$filter[] = $Fdiagonal;
								}
								if ($FRAM != '') {
									$characteristic[] = `RAM`;
									$filter[] = $FRAM;
								}
								if ($FScreen != '') {
									$characteristic[] = `Screen`;
									$filter[] = $FScreen;
								}

								if (!empty($filter)) {
									$total_count = R::count('products', "firm = ? ORDER BY id", [$Ffirm]);
									$products = R::find('products', "firm  = ? ORDER BY id DESC LIMIT $offset,$per_page", [$Ffirm]);
								}*/

								/*if(!empty($filter)) {
									$total_count = R::count('products', "filter = ? ORDER BY id", [$filter]);
									$products = R::find('products', "name = ? ORDER BY id DESC LIMIT $offset,$per_page", [$filter]);
								} else {
									$total_count = R::count('products');
									$products = R::find('products', "ORDER BY id DESC LIMIT $offset,$per_page");
								}
							}*/

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
	</section>

	<!-- Футер -->
	<?php
		include_once('blocks/footer.php');
	?>
</body>
</html>