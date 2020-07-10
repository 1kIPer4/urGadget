<div class="modal" id="by_one_click">
	<div class="modal__overlay">
		<div class="modal__container">
			<div class="modal__background"></div>
			<div class="modal__window">
				<button class="close popup__close">
					<span></span>
					<span></span>
				</button>
				<h1 class="by_one_click-window">Купить в 1 клик</h1>
				<form method="POST" action="#registration">
					<div class="form__container">
						<h3>Ваше имя</h3>
						<input type="text" name="name" placeholder="Например: Иван Иванов Иванович"/>
						<h3>Номер телефона</h3>
						<div class="tel_container">
							<div class="tel_select">
								<div class="flags">
									<div class="selected__flag">
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
									</div>
									<div class="byOneClick__arrow" id="flags__arrow">
										<span></span>
										<span></span>
									</div>
									<ul class="byOneClick__ul" id="flags__ul">
										<li class="active" value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
										<li value="Russia"><img src="img/flags/Russia.png" alt="Russia"></li>
									</ul>
								</div>
								<div class="first_number">
									+7
								</div>
							</div>
							<input type="tel" placeholder="(933)-333-33-33" name="tel" id="tel"/>
						</div>
						<div class="country">
							<div class="countryleft">
								<h3>Город</h3>
								<div class="offer__country">
									<input type="text" placeholder="Челябинск">
									<div class="byOneClick__arrow" id="country__arrow">
										<span></span>
										<span></span>
									</div>
									<ul class="byOneClick__ul" id="country__ul">
										<li class="active">Челябинск</li>
										<li class="active">Москва</li>
										<li class="active">Санкт-петербург</li>
										<li class="active">Ростов</li>
										<li class="active">Ростов</li>
										<li class="active">Ростов</li>
										<li class="active">Ростов</li>
										<li class="active">Ростов</li>
									</ul>
								</div>
							</div>
							
							<div class="countryright">
								<h3>Почтовый индекс</h3>
								<input type="text" name="index" id="index"/>
							</div>
						</div>
					</div>
					<button type="submit" class="by_one_click__btn" name="do_by_one_click">Перейти к оплате</button>
				</form>
			</div>
		</div>
	</div>
</div>