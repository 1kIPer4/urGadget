<?php
	require_once "includes/config.php";
	//Рарешение экрана
	$screenWidth = isset($_POST['width']);
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
	$page = 1;
	if ( isset($_GET['page']) ) {
		$page = (int) $_GET['page'];
	}
?>
<body id="<?php echo $page; ?>" class="<?php echo $page__name ?>">
	<!-- Шапка -->
	<?php 
		include_once('blocks/header.php');
	?>

	<section class="content" id="product">
		<div class="product-main">
			<?php 
				include_once('blocks/slider.php');
			?>
			<?php
				$product = R::load('products', (int) $_GET['id']);
				$price = $product->price;
				$discount = $product->discount;
				$pricer = $price - ($price * $discount / 100);
				$pricered = floor($pricer/1000) * 1000 + 999;
			?>
				<div class="product">
					<div class="slider-product">
						<h1><?php echo $product['name'];?></h1>
						<?php
							$image = R::find('gallery', 'category_id = ? ORDER BY id LIMIT 10', [(int) $_GET['id']]);
						?>
						<div class="image-main__container">
							<?php
								foreach ($image as $img) {
									?>
										<img class="image-main" src="img/<?php echo $product['img'];?>/<?php echo $img['img'];?>.png" alt="<?php echo $product['name'];?>"/>
									<?php
								}
							?>
						</div>
						<div class="slider__carousel">
							<button class="arrow prev" id="gallery__prev">
								<span></span>
								<span></span>
							</button>
							<div class="slider__gallery">
								<ul class="slider__images" id="product__slider__images">
									<?php
										foreach ($image as $img) {
											?>
												<li><img src="img/<?php echo $product['img'];?>/<?php echo $img['img'];?>.png" alt="<?php echo $product['name'];?>"></li>
											<?php
										}
									?>
								</ul>
							</div>
							<button class="arrow next" id="gallery__next">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
					<div class="characteristics">
						<div class="characteristics__product">
							<div class="offer__colors">
								<div class="product__color">
									<h4>Цвет</h4>
									<div class="colors">
										<div class="color color_active">
											<span></span>
										</div>
										<div class="color">
											<span></span>
										</div>
										<div class="color">
											<span></span>
										</div>
									</div>
								</div>
								<div class="offer">
									<div class="offer__price">
										<div class="offer__left">
											<h2>Цена по скидке</h2>
											<h1 class="price-red"><?php echo $pricered;?>р.</h2>
										</div>
										<div class="offer__right">
											<h4 class="price"><?php echo $product['price'];?>р.<span class="red-line"></span></h4>
										</div>
									</div>
									<form method="POST">
										<button class="add__cart" value="<?php echo $product['id'];?>" name="do_addCart">Добавить в корзину</button>
									</form>
									<?php
										include('blocks/by_one_click.php');
									?>
									<div class="by_one_click"><a>Купить в один клик</a></div>
									<div class="discount">
										<span><?php echo $product['discount'];?>%</span>
										скидка
									</div>
								</div>
								<div class="add_to_favorites">
									<div class="favorites__icons">
										<i class="fas fa-heart"></i>
										<i class="far fa-heart active__icon"></i>
									</div>
									<a>Добавить в избранное</a>
								</div>
							</div>
						</div>
						<ul class="info clearfix">
							<!-- <div class="info-header"> -->
								<li class="tab description tab_active" id="description">
									<div class="info__category">
										<h4>Описание</h4>
										<button class="arrow">
											<span></span>
											<span></span>
										</button>
									</div>
									<div class="info__content">
										<span class="info__border"></span>
										<p>
											Смартфон Samsung Galaxy S8 оснащен изогнутым с двух сторон дисплеем диагональю 5,8 дюймов. Корпус защищен от пыли и влаги, это позволяет использовать устройство даже под дождем. Восьмиядерный процессор с частотой 2,3 ГГц обеспечивает быструю работу модели. Карта памяти microSD расширяет возможный объем хранения данных с 64 ГБ до 256 ГБ. Телефон воспроизводит 16 млн цветов, поэтому отображает детализированную картинку. Управление осуществляется посредством сенсорных клавиш или голосовых команд.<br/><br/>
										
											Смартфон Samsung Galaxy S8 надежно защищает информацию от посторонних лиц, так как разблокировка происходит после идентификации отпечатка пальца или радужной оболочки глаза. За счет высокого разрешения основной (12 Мп) и фронтальной (8 Мп) камер получаются четкие и реалистичные снимки, селфи и видео. В арсенале предусмотрены датчики приближения, магнитного поля и атмосферного давления. Яркость экрана автоматически настраивается, исходя из степени освещенности. Благодаря поддержке MS Office пользователь может редактировать документы прямо в самом телефоне. Без подзарядки при пиковых нагрузках модель работает до 20 часов.
										</p>
										<span class="info__border"></span>
									</div>
								</li>
								<li class="tab" id="specifications">
									<div class="info__category">
										<h4>Характеристики</h4>
										<button class="arrow">
											<span></span>
											<span></span>
										</button>
									</div>
									<div class="info__content">
										<span class="info__border"></span>
										<table class="characteristic-product">
											<tr>
												<td>Гарантия</td><td>1 год</td>
											</tr>
											<tr>
												<td>Разрешение экрана</td><td>3040x1440</td>
											</tr>
											<tr>
												<td>Диагналь экрана, дюймы</td><td>6,4</td>
											</tr>
											<tr>
												<td>Размеры, мм</td><td>157,6 х 74,1 х 7,8</td>
											</tr>
											<tr>
												<td>Разрешение основной тыловой камеры, Мпикс</td><td>12</td>
											</tr>
											<tr>
												<td>Встроенная память</td><td>8 ГБ</td>
											</tr>
											<tr>
												<td>Вес товара</td><td>175</td>
											</tr>
											<tr>
												<td>Емкость аккумулятора, мАч</td><td>4100</td>
											</tr>
											<tr>
												<td>Процессор</td><td>Exynos 9820(8 ядер)</td>
											</tr>
										</table>
										<span class="info__border"></span>
									</div>
								</li>
								<li class="tab" id="reviews">
									<div class="info__category">
										<h4>Отзывы</h4>
										<button class="arrow">
											<span></span>
											<span></span>
										</button>
									</div>
									<div class="info__content">
										<span class="info__border"></span>
										<span class="info__border"></span>
									</div>
								</li>
							<!-- </div> -->
							
						</ul>
					</div>
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