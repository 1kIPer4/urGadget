<?php
	$data = $_POST;

	//Регистрация
	if (isset($data['do_signup'])) {
		$errors = array();
		if (trim($data['name']) == '') {
			$errors[] = 'Введите имя!';
		}

		if (trim($data['email']) == '') {
			$errors[] = 'Введите Email!';
		}

		if ($data['password'] == '') {
			$errors[] = 'Введите пароль!';
		}

		if ($data['password_2'] != $data['password']) {
			$errors[] = 'Повторный пароль введён не верно!';
		}

		if (R::count('users', "email = ?", array($data['email'])) > 0) {
			$errorsEmail = 'Пользователь с таким Email уже существует!';
			$errors[] = $errorsEmail;
			echo '<div class="message_red">'.$errorsEmail.'</div>';
		}

		if (empty($errors)) {
			//Всё хорошо, регистрируем
			$user = R::dispense('users');
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div class="message_green">Вы успешно зарегестрировались!</div>';
		}
	}

	//Авторизация
	if (isset($data['do_login'])) {
		$errors = array();
		if (trim($data['email']) == '') {
			$errors[] = 'Введите email!';
		}
		if (trim($data['password']) == '') {
			$errors[] = 'Введите пароль!';
		}
		
		$user = R::findOne('users', 'email = ?', array($data['email']));
		if ($user) {
			//логин существует
			if (password_verify($data['password'], $user->password)) {
				//Всё хорошо, логиним пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div class="message_green">Вы успешно авторизовались авторизовались!</div>';
			} else {
				$errors[] = 'Неверно введён пароль!';
			}
		} else {
			$errors[] = 'Пользователь с таким логином не найден!';
		}

		if (!empty($errors)) {
			echo '<div class="message_red">'.array_shift($errors).'</div>';
		}
	}

	//Корзина
	if (isset($data['do_addCart'])) {
		if (isset($_SESSION['logged_user'])) {

			$user_id = $_SESSION['logged_user']->id;
			$user = R::load('users', (int) $user_id);

			$product_id = $data['do_addCart'];
			$product = R::load('products', (int) $product_id);

			$good = R::findOne('products_users', 'users_id = :user_id AND products_id = :product_id', [':product_id' => (int) $product_id, ':user_id' => (int) $user_id]);
			if ($good) {
				R::trash($good);
			} else {
				$user->noLoad()->sharedProductList[] = $product;
				R::store($user);
			}
		} else {
			echo '<div class="message_red">Авторизуйтесь!</div>';
		}
	}

	//Удаление с корзины 
	if (isset($data['do_removeProd'])) {
		$good = R::findOne('products_users', 'users_id = :user_id AND products_id = :product_id', [':product_id' => (int) $data['do_removeProd'], ':user_id' => (int) $_SESSION['logged_user']->id]);
		R::trashBatch('products_users', $good);
	}

	//Фильтр
	if (isset($_GET['do_filt'])) {
		$_SESSION['filt'] = $_GET['do_filt'];
	}
?>