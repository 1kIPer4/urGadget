<?php
	require_once "includes/handler.php";
?>

<header class="header" id="header">
	<div class="container">
		<div class="logo logo-default">
			<div class="logo__text">
				<span>ur</span>
				Gad
				get
			</div>
		</div>
		<div class="header-center">
			<div class="header-up">
				<div class="catalog">
					<div class="catalog__btn clearfix">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<h1 class="catalog__h1">Каталог</h1>
					</div>
					<div class="catalog__dop">
						<div class="catalog__list">
							<div class="catalog__category">
								<h2>Смартфоны и гаджеты</h2>
								<button class="arrow">
									<span></span>
									<span></span>
								</button>
							</div>
							<ul>
								<span class="catalog__border"></span>
								<a href="/">
									<li <?php echo ($page__name == 'Сотовые телефоны') ? "class='catalog__li catalog_active'" : ""; ?>  class="catalog__li">
										<p>
											<span>Сотовые телефоны</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Смарт-часы') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Смарт-часы</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Запчасти для смартфонов') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Запчасти для смартфонов</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Аксессуары для смартфонов') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Аксессуары для смартфонов</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Аксессуары для смарт-часов') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Аксессуары для смарт-часов</span>
										</p>
									</li>
								</a>
								<span class="catalog__border"></span>
							</ul>
						</div>
						<div class="catalog__list">
							<div class="catalog__category">
								<h2>Планшеты, электронные книги</h2>
								<button class="arrow">
									<span></span>
									<span></span>
								</button>
							</div>
							<ul>
								<span class="catalog__border"></span>
								<a>
									<li <?php echo ($page__name == 'Планшеты') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Планшеты</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Электронные книги') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Электронные книги</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Аксессуары для планшетов') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Аксессуары для планшетов</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Аксессуары для электронных книг') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Аксессуары для электронных книг</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Планшеты с клавиатурой') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Планшеты с клавиатурой</span>
										</p>
									</li>
								</a>
								<span class="catalog__border"></span>
							</ul>
						</div>
						<div class="catalog__list">
							<div class="catalog__category">
								<h2>Комплектующие для ПК</h2>
								<button class="arrow">
									<span></span>
									<span></span>
								</button>
							</div>
							<ul>
								<span class="catalog__border"></span>
								<a>
									<li <?php echo ($page__name == 'Блоки питания') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Блоки питания</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Видеокарты') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Видеокарты</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Процессоры') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Процессоры</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Материнские платы') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Материнские платы</span>
										</p>
									</li>
								</a>
								<a>
									<li <?php echo ($page__name == 'Оперативная память') ? "class='catalog__li catalog_active'" : ""; ?> class="catalog__li">
										<p>
											<span>Оперативная память</span>
										</p>
									</li>
								</a>
								<span class="catalog__border"></span>
							</ul>
						</div>
					</div>
				</div>
				<form <?php if ($page__name == 'Сотовые телефоны') { ?>
						action="index.php"
					  <?php
						}
					  ?>
					 method="GET">
					<div class="search">
						<input class="search__input" type="search" placeholder="Поиск" name="search" value="<?= @$_GET['search'] .$searchString ?>"/>
						<button class="search__button" name="do_search">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
			</div> 
			<div class="header-down">
				<a href="/" <?php echo ($name__page == 'burning goods') ? "class='header-down_active'" : ""; ?>>Горящие товары</a>
				<a href="#">Электроника</a>
				<a href="#">Товары для дома</a>
				<a href="#">Товары для детей</a>
				<a href="#">Одежда и обувь</a>
			</div>
		</div>
		<div class="menu">
			<?php if (isset($_SESSION['admin']) && $name__page == 'AdminPanel') { ?>
				<div class="icons logout">
					<a href="AdminPanel.php">
						<i class="far fa-user-circle icon"></i>
						<span id="admin__nickname"><?php echo $_SESSION['admin'];?></span>
					</a>
				</div>
			<?php } else if (isset($_SESSION['logged_user'])) { ?>
				<div class="icons logout">
					<a href="includes/logout.php">
						<i class="far fa-user-circle icon"></i>
						<span class="icons__name"><?php echo $_SESSION['logged_user']->name;?></span>
					</a>
				</div>
			<?php } else { ?>
				<div class="icons login">
					<a>
						<i class="far fa-user-circle icon"></i>
						<span class="icons__name">Войти</span>
					</a>
				</div>
			<?php } ?>
			<div class="icons cart">
				<a href="cart.php">
					<i class="fa fa-shopping-cart icon"></i>
					<span class="icons__name">Корзина</span>
					<?php
						$user = R::load('users', $_SESSION['logged_user']->id);
						$products_users = R::findOne('products_users');
						if ($products_users) {
							$products__cart = $user->countOwn('products_users');
						}
						if ($products__cart > 0) : ?>
							<div class="quantity"><?php echo $products__cart ?></div>
					<?php endif; ?>
				</a>
			</div>
			<div class="icons favorites">
				<a href="favorites.php">
					<i class="fa fa-heart icon"></i>
					<span class="icons__name">Избранное</span>
					<?php if ($products__favorites > 0) : ?>
						<div class="quantity"><?php echo $products__favorites ?></div>
					<?php endif; ?>
				</a>
			</div>
		</div>
	</div>

	<!-- Всплывающее окно | Вход -->
	<div class="modal" id="input">
		<div class="modal__overlay">
			<div class="modal__container">
				<div class="modal__background"></div>
				<div class="modal__window">
					<button class="close popup__close">
						<span></span>
						<span></span>
					</button>
					<h1 class="input">Войти</h1>
					<form method="POST">
						<div class="form__container">
							<h3>E-mail или номер телефона</h3>
							<h4 class="error__email"></h4>
							<input type="text" name="email"  value="<?php echo @$data['email']; ?>" id="Iemail"/>
							<h3>Пароль</h3>
							<h4 class="error__password"></h4>
							<input type="password" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>" id="Ipassword"/>
							<p>Ещё не зарегистрированы?<a class="reg">Регистрация</a></p>
						</div>
						<button type="submit" class="log__btn" name="do_login">Войти в аккаунт</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--Всплывающее окно | Регистрация  -->
	<div class="modal" id="registration">
		<div class="modal__overlay">
			<div class="modal__container">
				<div class="modal__background"></div>
				<div class="modal__window">
					<button class="close popup__close">
						<span></span>
						<span></span>
					</button>
					<h1 class="registration">Регистрация</h1>
					<form method="POST">
						<div class="form__container">
							<h3>Ваше имя</h3>
							<h4 class="error__name"></h4>
							<input type="text" name="name" value="<?php echo @$data['name']; ?>" id="Rname"/>
							<h3>E-mail</h3>
							<h4 class="error__email"></h4>
							<input type="email" placeholder="ivanov@mail.ru" name="email" value="<?php echo @$data['email']; ?>" id="Remail"/>
							<h3>Пароль</h3>
							<h4 class="error__password"></h4>
							<input type="password" placeholder="Пароль" name="password" id="Rpassword"/>
							<h4 class="error__password2"></h4>
							<input type="password" placeholder="Повторите пароль" name="password_2" id="Rpassword2"/>
							<p>Есть аккаунт?<a class="log">Войти</a></p>
						</div>
						<button type="submit" class="reg__btn" name="do_signup">Зарегистрироваться</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</header>