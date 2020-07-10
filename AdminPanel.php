<?php
	require_once "includes/config.php";
	if (!isset($_SESSION['admin'])) {
		header('Location: ADinput.php');
	}
	$data = $_POST;

	$count__forms = 1;
	if ( isset($data['count__forms']) && $data['count__forms'] != 0) {
		$count__forms = (int) $data['count__forms'];
	}		

	if (isset($data['do_addProduct'])) {
		if ( $data['name'] == '' &&
			 $data['img'] == '' &&
			 $data['price'] == '' &&
			 $data['discount'] == '' &&
			 $data['firm'] == '' &&
			 $data['diagonal'] == '' && 
			 $data['ram'] == '' &&
			 $data['screen'] == '' &&
			 $data['cpu'] == '' &&
			 $data['count'] == '') {

		} else {
			$products = R::dispense('products');
			$products->name = $data['name'];
			$products->img = $data['img'];
			$products->price = $data['price'];
			$products->discount = $data['discount'];
			$products->firm = $data['firm'];
			$products->diagonal = $data['diagonal'];
			$products->ram = $data['ram'];
			$products->screen = $data['screen'];
			$products->cpu = $data['cpu'];
			$products->count = $data['count'];
			R::store($products);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once('blocks/head.php');
	?>
	<title>urGadget Admin Panel</title>
</head>

<body id="AdminPanel">
	<!-- Шапка -->
	<?php 
		$name__page = 'AdminPanel';
		include_once('blocks/header.php');
	?>
	<section class="content">
		<div class="container">
			<h1>Добавление товаров</h1><br/>
			<form action="AdminPanel.php" method="POST">
				<div class="add__product">
					<?php
						for ($i=1; $i <= $count__forms; $i++ ) {
							?>
								<ul value="<?php echo $i;?>">
									<div class="counter">id: <?php echo $i;?></div>
									<button class="close close__form" value="<?php echo $i;?>">
										<span></span>
										<span></span>
									</button>
									<li>
										<h4>Имя товара</h4>
										<input name="name" type="text" value="<?php echo @$data['name']; ?>">
									</li>
									<li>
										<h4>Картинка</h4>
										<input name="img" type="text" value="<?php echo @$data['img']; ?>">
									</li>
									<li>
										<h4>Цена</h4>
										<input name="price" type="text" value="<?php echo @$data['price']; ?>">
									</li>
									<li>
										<h4>Скидка</h4>
										<input name="discount" type="text" value="<?php echo @$data['discount']; ?>">
									</li>
									<li>
										<h4>Фирма</h4>
										<input name="firm" type="text" value="<?php echo @$data['firm']; ?>">
									</li>
									<li>
										<h4>Диагональ</h4>
										<input name="diagonal" type="text" value="<?php echo @$data['diagonal']; ?>">
									</li>
									<li>
										<h4>Оператвная память</h4>
										<input name="ram" type="text" value="<?php echo @$data['ram']; ?>">
									</li>
									<li>
										<h4>Разрешение экрана</h4>
										<input name="screen" type="text" value="<?php echo @$data['screen']; ?>">
									</li>
									<li>
										<h4>Кол-во ядер процессора</h4>
										<input name="cpu" type="text" value="<?php echo @$data['cpu']; ?>">
									</li>
									<li>
										<h4>Кол-во товаров</h4>
										<input name="count" type="text" value="<?php echo @$data['count']; ?>">
									</li>
								</ul>
							<?php
						}
					?>
				</div>
				<div class="container__bottom">
					<button class="do__addProduct" name="do_addProduct">Добавить</button>
					<div class="count__forms">
						<h4>Кол-во форм</h4>
						<input name="count__forms" type="text" value="<?php echo $count__forms;?>">
						<button class="do__addForms" name="do_count__forms"> Добавить форму</button>
					</div>
				</div>
			</form>
		</div>	
	</section>
	<!-- Футер -->
	<?php
		include_once('blocks/footer.php');
	?>
	<script>
		$('.close__form').click(function(e){
			$val = $(this).val();
			if ($val != 1) {
				$('ul[value="'+ $val + '"]').remove();
			}
			e.preventDefault();
		});
	</script>
</body>
</html>