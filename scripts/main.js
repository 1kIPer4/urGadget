	//Тёмная тема
	function DarkTransition() {
		$('.filter').css('transition', 'all 0.5s ease');
		$('.add__basket').css('transition', 'background 0.5s ease');
	}

	function DarkTransitionNone() {
		$('.filter').css('transition', 'none');
		$('.add__basket').css('transition', 'none');
	}

	//Ajax запрос на разрешение экрана
	/*$.post(
			'paginator.php', 
			{
				'width'		: 	screen.width
			}
	)*/

	//Local storage Тёмная тема
	if (localStorage.getItem('ShopStyle') != null) {
		DarkTransitionNone();
		let style = localStorage.getItem('ShopStyle');
		if (style == 'dark') {
			$('head').append('<link rel="stylesheet" href="css/style(dark).css"/>');
		} else {
			$('link[href="css/style(dark).css"]').remove();
		}
	}

	// Слайдер(с банерами)
	let Bwidth = $('.slider-banners .slider__images li').outerWidth(true);
	let Bcolvo = $('.slider-banners .slider__images li').length;
	if (Bcolvo < 1) {
		$('.slider-banners').hide();
	} else if (Bcolvo == 1) {
		$('.controls').hide();
		$('.slider-banners .arrow').hide();
	} else {
		$('.slider-banners').show();
	}
	let Bcount = 1;
	let Bmax_width = (Bwidth * Bcolvo) - Bcount * Bwidth;
	let slide = 1;

	let Bposition = 0;

	$('#banner__prev').on('click', () => {
		$('.slider-banners .slider__images').css('transition', 'all 400ms ease');
		if (Bposition <= 0) {
			Bposition = Bmax_width;
			slide = Bcolvo;
			$('.slider-banners .slider__images').css('left', "-" + Bmax_width + 'px');
			$('.controls label:last-child').addClass('radio_active');
			$('.controls .radio_active').not('.controls label:last-child').removeClass('radio_active');
			localStorage.setItem('SliderBanners', slide);
		}
		else {
			Bposition -= Bwidth;
			slide--;
			let prev_controls = $('.controls .radio_active').prev('.controls label');
			$('.slider-banners .slider__images').css('left', "-" + Bposition + 'px');
			prev_controls.addClass('radio_active');
			$('.controls .radio_active').not(prev_controls).removeClass('radio_active');
			localStorage.setItem('SliderBanners', slide);
		}
	});

	$('#banner__next').on('click', () => {
		$('.slider-banners .slider__images').css('transition', 'all 400ms ease');
		if (Bposition >= Bmax_width) {
			Bposition = 0;
			slide = 1;
			$('.slider-banners .slider__images').css('left', '0');
			$('.controls label:first-child').addClass('radio_active');
			$('.controls label').not('.controls .radio_active:first-child').removeClass('radio_active');
			localStorage.setItem('SliderBanners', slide);
		}
		else {
			Bposition += Bwidth;
			slide++;
			$('.slider-banners .slider__images').css('left', "-" + Bposition + 'px');
			$('.controls .radio_active + label').addClass('radio_active');
			$('.controls label').not('.controls .radio_active + label').removeClass('radio_active');
			localStorage.setItem('SliderBanners', slide);
		}
	});

	for ( i = 1; i <= Bcolvo; i++ ) {
		$('.controls').append('<label class="radio"></label>');
	}
	$('.controls label:first-child').addClass('radio_active');

	let Bcontrols = $('.controls label').length;
	let wBcontrols = $('.controls label').outerWidth(true);
	let Width_Bcontrols = wBcontrols * Bcontrols + 1 + 'px';
	$('.controls').css('width', Width_Bcontrols);

	$('.controls label').on('click', function() {
		$('.slider-banners .slider__images').css('transition', 'all 400ms ease');
		let index = $(this).index();
		let ControlsBposition = index * Bwidth;
		Bposition = (index + 1) * Bwidth - Bwidth;
		$('.slider-banners .slider__images').css('left', "-" + ControlsBposition + 'px');
		$('.radio_active').removeClass('radio_active');
		$(this).addClass('radio_active');
		localStorage.setItem('SliderBanners', index + 1);
	});

	//Local storage Слайдер(банер)
	if (localStorage.getItem('SliderBanners') != null) {
		$('.slider-banners .slider__images').css('transition', 'none');
		let banner = localStorage.getItem('SliderBanners');
		Bposition = banner * Bwidth - Bwidth;
		slide = banner;
		$('.slider-banners .slider__images').css('left', "-" + Bposition + 'px');
		let control = $('.controls label:nth-child(' + banner + ')');
		control.addClass('radio_active');
		$('.controls .radio_active').not(control).removeClass('radio_active');
	}

/*let Wwidth = $(window).width();
	alert(Wwidth);
	if (Wwidth <=  572) {
		$('#banner1').css('margin-left', - (Wwidth - (Wwidth-120)) + 'px');
		alert(- (Wwidth - (Wwidth-120)) + 'px');
	}*/

$(document).ready(function(){

	//Лого тёмная тема
	$('.logo').on('click', () => {
		DarkTransition();
		if (localStorage.getItem('ShopStyle') == null || localStorage.getItem('ShopStyle') == 'default') {
			$('head').append('<link rel="stylesheet" href="css/style(dark).css"/>');
			localStorage.setItem('ShopStyle', 'dark');
		} else {
			$('link[href="css/style(dark).css"]').remove();
			localStorage.setItem('ShopStyle', 'default');
		}
	});

	// Попап
	function popup__close() {
		$('.modal').removeClass('open');
		$('.modal__background').removeClass('open__modal__background');
		$('.modal__window').removeClass('open__window');
		localStorage.setItem('Window', 'close');
	}
	$('.login').on('click', () => {
		$('#input').addClass('open');
		$('#input .modal__background').addClass('open__modal__background');
		$('#input .modal__window').addClass('open__window');
	});
	$('.popup__close').on('click', () => {
		popup__close();
	});
	$('.reg').on('click', () => {
		$('#input').removeClass('open');
		$('#registration').addClass('open');
		$('#registration .modal__background').addClass('open__modal__background');
		$('#registration .modal__window').addClass('open__window');
	});
	$('.log').on('click', () => {
		$('#registration').removeClass('open');
		$('#input').addClass('open');
		$('#input .modal__background').addClass('open__modal__background');
		$('#input .modal__window').addClass('open__window');
	});
	$('.reg__btn').on('click', (e) => {
		let valName = $('#registration #Rname').val().trim();
		let valEmail = $('#registration #Remail').val().trim();
		let valPassword = $('#registration #Rpassword').val().trim();
		let valPassword2 = $('#registration #Rpassword2').val().trim();
		if (valName == '') {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__name').text('Введите имя!');
			$('#registration #Rname').addClass('error__input');
			/*localStorage.setItem('Window', 'open'); <----------- ЗАКОММЕНТИТЬ!*/
			/*$('#registration h3:first-child').append('<h3 class="reg__error">Введите имя!</h3>');
			$('#registration h3:first-child').css('box-shadow', '0 0 2px 2px red');*/
			e.preventDefault();
		} else if (valEmail == '') {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__email').text('Введите Email!');
			$('#registration #Remail').addClass('error__input');
			e.preventDefault();
		} else if (!valEmail.includes('@')) {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__email').text('Должен присутсвовать символ "@"');
			$('#registration #Remail').addClass('error__input');
			e.preventDefault();
		} else if (valPassword == '') {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__password').text('Введите пароль!');
			$('#registration #Rpassword').addClass('error__input');
			e.preventDefault();
		} else if (valPassword2 == '') {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__password2').text('Повторите пароль!');
			$('#registration #Rpassword2').addClass('error__input');
			e.preventDefault();
		} else if (valPassword2 != valPassword) {
			$('#registration h4').text('');
			$('#registration input').removeClass('error__input');
			$('#registration .error__password2').text('Повторный пароль введён не верно!');
			$('#registration #Rpassword2').addClass('error__input');
			e.preventDefault();
		} else {
			popup__close();
		}
	});

	$('.log__btn').on('click', (e) => {
		let valEmail = $('#input #Iemail').val().trim();
		let valPassword = $('#input #Ipassword').val().trim();
		if (valEmail == '') {
			$('#input h4').text('');
			$('#input input').removeClass('error__input');
			$('#input .error__email').text('Введите Email!');
			$('#input #Iemail').addClass('error__input');
			e.preventDefault();
		} else if (valPassword == '') {
			$('#input h4').text('');
			$('#input input').removeClass('error__input');
			$('#input .error__password').text('Введите пароль!');
			$('#input #Ipassword').addClass('error__input');
			e.preventDefault();
		} else {
			popup__close();
		}
	});

	//Local storage Попап
/*	if (localStorage.getItem('Window') != null) {
		let window_reg = localStorage.getItem('Window');
		if (window_reg == 'open') {
			$('#registration').addClass('open');
			$('#registration .modal__background').addClass('open__modal__background');
			$('#registration .modal__window').addClass('open__window');
		} else {
			$('#registration').removeClass('open');
			$('#registration .modal__background').removeClass('open__modal__background');
			$('#registration .modal__window').removeClass('open__window');
			localStorage.setItem('Window', 'close');
		}
	}
*/	/*$('.reg__btn').on('click', function() {
		let val = $('.modal input').val();
		if (val == '') {
			$('#registration').addClass('open');
			$('#registration .modal__background').addClass('open__modal__background');
			$('#registration .modal__window').addClass('open__window');
			$('h3:first-child').append('<h3 class="reg__error">Введите имя!</h3>');
			$(this).css('box-shadow', '0 0 2px 2px red');
		} else {
			popup__close();
		}
	});*/

	//Фильтр
	$('.filter__buttons button').on('click', function() {
		$(this).addClass('f_active');
		$('.filter__buttons button').not(this).removeClass('f_active');
		localStorage.setItem('filter', $(this).index());
	});
	if (localStorage.getItem('filter') != null) {
		let fIndex =  localStorage.getItem('filter');
		let fButtons = $('.filter__buttons button');
		let fButton = fButtons.eq(fIndex);
		fButton.addClass('f_active');
		fButtons.not(fButton).removeClass('f_active');
	}
	$('.button__filter').on('click', () => {
		$('.filter').fadeToggle(300);
		/*$('.filter').slideToggle(300);*/
	});

	//Купить в один клик
	$('.by_one_click').on('click', (e) => {
		$('#by_one_click').addClass('open');
		$('#by_one_click .modal__background').addClass('open__modal__background');
		$('#by_one_click .modal__window').addClass('open__window');
		e.preventDefault();
	});

	$('.flags').on('click', () => {
		$('#flags__arrow').toggleClass('open__byOneClick__arrow');
		$('.byOneClick__arrow').not('#flags__arrow').removeClass('open__byOneClick__arrow');
		$('#flags__ul').slideToggle(200);
		$('.byOneClick__ul').not('#flags__ul').slideUp(200);
	});
	$('#country__arrow, #country__ul').on('click', () => {
		$('#country__arrow').toggleClass('open__byOneClick__arrow');
		$('.byOneClick__arrow').not('#country__arrow').removeClass('open__byOneClick__arrow');
		$('#country__ul').slideToggle(200);
		$('.byOneClick__ul').not('#country__ul').slideUp(200);
	});
	$('#by_one_click .close').on('click', () => {
		$('.byOneClick__ul').slideUp(200);
	});

	//Удалить товар
	$('#your__products .close__product').on('click', function() {
		$('#confirmation').addClass('open');
		$('#confirmation .modal__background').addClass('open__modal__background');
		$('#confirmation .modal__window').addClass('open__window');
		$idProduct = $(this).val();
		$('#your__products .form__container .Yes').val($idProduct);
	});
	$('#your__products .form__container .No').on('click', (e) => {
		popup__close();
		e.preventDefault();
	});

	// Каталог 
	if ($(window).width() >= 768)
	{
		$('.catalog__btn').on('click', () => {
			$('.catalog__dop').css('transition', 'all 0.3s ease');
			$('.catalog').toggleClass('open');
			$('.hamburger').toggleClass('open__hamburger');
		});

		//Якорь на характиристики
		$('.info__category h4').on('click', () => {
			$('html, body').animate({ scrollTop: $('.controls').offset().top }, 500); 
		});
	}
	if ($(window).width() < 768)
	{
		//Каталог
		$('.catalog__btn').on('click', () => {
			$('.hamburger').toggleClass('open__hamburger');
			$('.catalog__dop').slideToggle(300);
			$('.catalog__category').toggleClass('catalog__category__visible');
		});

		function list__slide (elem, categorys, arrows, autoList) {
			index = elem.index();
			category = categorys.eq(index);
			category.slideToggle(300);
			arrow = arrows.eq(index);
			arrow.toggleClass('open__arrow');
			if (autoList) {
				categorys.not(category).slideUp(300);
				arrows.not(arrow).removeClass('open__arrow');
			}
		}

		$('.catalog__list').on('click', function() {
			autoList = true;
			list__slide($(this), $('.catalog__list ul'), $('.catalog__dop .arrow'), autoList);
		});

		//Футер
		$('.footer__list').on('click', function() {
			autoList = true;
			list__slide($(this), $('.footer__menu ul'), $('.footer .arrow'), autoList);
		});

		//Инфо о товаре
		$('.tab').on('click', function() {
			autoList = false;
			list__slide($(this), $('.info__content'), $('.info .arrow'), autoList);
		});
	}

	//Выбор цвета
	$('.color').on('click', function() {
		$(this).addClass('color_active');
		$('.color').not(this).removeClass('color_active');
	});

	//Добавить в избранное
	$('.add_to_favorites i, .add_to_favorites a').on('click', () => {
		$('.add_to_favorites i:first-child').toggleClass('active__icon');
		$('.add_to_favorites i:last-child').toggleClass('notactive__icon');
	});

	//Галерея
	$('.image-main__container img:first-child').show();
	$('.product .slider__images li:first-child').addClass('slider__images__li_active');

	$('.product .slider__images li').on('click', function() {
		let index = $(this).index();
		$(this).addClass('slider__images__li_active');
		$('.product .slider__images li').not(this).removeClass('slider__images__li_active');
		let images = $('.image-main__container img');
		$('.image-main__container img').hide();
		images.eq(index).show();
	});

	//Слайдер галлереи
	let Pwidth = $('.product .slider__images li').outerWidth(true);
	let Pcolvo = $('#product__slider__images li').length;
	let Pcount = 4;
	let Pmax_width = (Pwidth * Pcolvo) - Pcount * Pwidth;
	if (Pcolvo < 5) {
		$('.product .arrow').addClass('invis');
	}

	let Pposition = 0;

	$('#gallery__prev').on('click', () => {
		if (Pposition <= 0) {}
		else {
			Pposition -= Pwidth;
			$('.slider-product .slider__images').css('left', "-" + Pposition + 'px');
		}
	});

	$('#gallery__next').on('click', () => {
		if (Pposition >= Pmax_width) {}
		else {
			Pposition += Pwidth;
			$('.slider-product .slider__images').css('left', "-" + Pposition + 'px');
		}
	});
});