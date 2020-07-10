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
	<section class="content" id="favorites">
		<?php 
			include_once('blocks/slider.php');
		?>
		<div class="main" id="your__products">
			<?php
				include "blocks/confirmation.php";
			?>
			<h1  class="cart__title">Избранное</h1>
			<ul>
				<li class="your__product">
					<img src="img/Samsung galaxy s10e 6128GB/Samsung galaxy s10e 6128GB.png" alt="smartphone"/>
					<div class="cart__offer">
						<h2>Samsung galaxy s10e 6/128GB</h2>
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
										<h4 class="price">46 990р.<span class="red-line"></span></h4>
									</div>
									<div class="offer__left">
										<h1 class="price-red">39 990р.</h2>
									</div>
								</div>
							</div>
						</div>
						<h3>Ваша выгода составила: 8 000 рублей</h3>
					</div>
					<div class="cart__buttons">
						<button class="add__cart">
							Перейти к оплате
						</button>
						<div class="by_one_click">
							<a href="#">Купить в 1 клик</a>
						</div>
					</div>
					<button class="close close__product">
						<span></span>
						<span></span>
					</button>
				</li>
				<li class="your__product">
					<img src="img/Asus Zenfone Max M2464/Asus Zenfone Max M2464.png" alt="smartphone"/>
					<div class="cart__offer">
						<h2>Samsung galaxy s10e 6/128GB</h2>
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
										<h4 class="price">13 990р.<span class="red-line"></span></h4>
									</div>
									<div class="offer__left">
										<h1 class="price-red">11 990р.</h2>
									</div>
								</div>
							</div>
						</div>
						<h3>Ваша выгода составила: 2 000 рублей</h3>
					</div>
					<div class="cart__buttons">
						<button class="add__cart">
							Перейти к оплате
						</button>
						<?php
							include('blocks/by_one_click.php');
						?>
						<div class="by_one_click">
							<a>Купить в 1 клик</a>
						</div>
					</div>
					<button class="close close__product">
						<span></span>
						<span></span>
					</button>
				</li>
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