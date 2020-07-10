<?php
	require_once "includes/config.php";

	$data = $_POST;
	if (isset($data['do_close'])) {
		header('Location: /');
	}
	if (isset($data['do_ADinput'])) {
		$errors = array();
		if ($data['ADlogin'] == $config['login']) {
			//логин существует
			if ($data['ADpassword'] == $config['password']) {
				//Всё хорошо, логиним пользователя
				$_SESSION['admin'] = $config['login'];
				header('Location: AdminPanel.php');
				echo "string";
			} else {
				$errors[] = 'Неверно введён пароль!';
			}
		} else {
			$errors[] = 'Пользователь с таким логином не найден!';
		}
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
		include_once('blocks/head.php');
	?>
	<title>Input</title>
</head>

<body id="ADinput">
	<?php
		if (!empty($errors)) {
			echo '<div class="message_red">'.array_shift($errors).'</div>';
		}
	?>
	<form action="ADinput.php" method="POST">
		<div class="modal open">
			<div class="modal__overlay">
				<div class="modal__container">
					<div class="modal__background open__modal__background"></div>
					<div class="modal__window open__window">
						<button class="close popup__close" name="do_close">
							<span></span>
							<span></span>
						</button>
						<h1 class="input">Войти</h1>
						<div class="form__container">
							<h3>Введите ваш логин</h3>
							<input type="text" name="ADlogin" value="<?php echo @$data['ADlogin']; ?>"/>
							<h3>Пароль</h3>
							<input type="password" placeholder="Пароль" name="ADpassword"/>
						</div>
						<button class="log__btn" name="do_ADinput">Войти в аккаунт</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<script src="libs/jquery-3.4.1.min.js"></script>
	<script src="scripts/main.js"></script>
</body>
</html>