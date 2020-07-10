$(function () {
	// Preloader
	// var $preloader = $('#page-preloader'),
	//	   $spinner   = $preloader.find('.spinner');
	// $spinner.fadeOut();
	// $preloader.delay(350).fadeOut('slow');

	/* Паралакс от движения мыши */

	if ($(window).width() > 960)
	{
		$('body').parallax({
			'elements': [
				{// banner1
					'selector': '#banner1 #layer1',
					'properties': {
						'x': {
							'right': {
								'initial': 0,
								'multiplier': 0.001,
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 0,
								'multiplier': 0.002,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer2',
					'properties': {
						'x': {
							'left': {
								'initial': 0,
								'multiplier': 0.0008,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer3',
					'properties': {
						'x': {
							'left': {
								'initial': -3,
								'multiplier': 0.0003,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 10,
								'multiplier': 0.003,
								'unit': '%',
								'invert': false
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer4',
					'properties': {
						'x': {
							'left': {
								'initial': 0,
								'multiplier': 0.0006,
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 1,
								'multiplier': 0.0009,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer5',
					'properties': {
						'x': {
							'right': {
								'initial': -3,
								'multiplier': 0.001,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 0,
								'multiplier': 0.007,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer6',
					'properties': {
						'x': {
							'left': {
								'initial': -2,
								'multiplier': 0.0015,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 2,
								'multiplier': 0.0009,
								'unit': '%',
								'invert': false
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer7',
					'properties': {
						'x': {
							'left': {
								'initial': 0,
								'multiplier': 0.0025,
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 8,
								'multiplier': 0.003,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner1 #layer8',
					'properties': {
						'x': {
							'left': {
								'initial': 0,
								'multiplier': 0.001,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 5,
								'multiplier': 0.01,
								'unit': '%',
								'invert': true
							}
						}
					}
				},// banner2
				{
					'selector': '#banner2 #layer1',
					'properties': {
						'x': {
							'left': {
								'initial': 1,
								'multiplier': 0.001,
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 2.5,
								'multiplier': 0.003,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner2 #layer2',
					'properties': {
						'x': {
							'left': {
								'initial': 0.8,
								'multiplier': 0.001,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 0,
								'multiplier': 0.003,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner2 #layer3',
					'properties': {
						'x': {
							'left': {
								'initial': 1.8,
								'multiplier': 0.002,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': -1,
								'multiplier': 0.006,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner2 #layer4',
					'properties': {
						'x': {
							'left': {
								'initial': 1.5,
								'multiplier': 0.002,
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 8,
								'multiplier': 0.008,
								'unit': '%',
								'invert': true
							}
						}
					}
				},
				{
					'selector': '#banner2 #layer5',
					'properties': {
						'x': {
							'left': {
								'initial': 1.5,
								'multiplier': 0.002,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 7,
								'multiplier': 0.008,
								'unit': '%',
								'invert': false
							}
						}
					}
				},
				{
					'selector': '#banner2 #layer6',
					'properties': {
						'x': {
							'left': {
								'initial': 0.8,
								'multiplier': 0.0008,
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 4,
								'multiplier': 0.01,
								'unit': '%',
								'invert': false
							}
						}
					}
				},
				{
					'selector': '#banner3 #layer2',
					'properties': {
						'x': {
							'left': {
								'initial': 0.8,
								'multiplier': 0.0008,
								'unit': '%',
								'invert': false
							}
						},
						
					}
				},
				{
					'selector': '#banner3 #layer3',
					'properties': {
						'x': {
							'left': {
								'initial': 0,/*'0.3*/
								'multiplier': 0.0007,/*' 0.0005*/  /*0.0005*/
								'unit': '%',
								'invert': true
							}
						},
						'y': {
							'top': {
								'initial': 4,/*1*/  /*3*/
								'multiplier': 0.005,/*0.0008*/  /*0.003*/
								'unit': '%',
								'invert': true
							}
						}
						
					}
				},
				{
					'selector': '#banner3 #layer4',
					'properties': {
						'x': {
							'left': {
								'initial': 0,/*'0.3*/
								'multiplier': 0.0007,/*' 0.0005*/  /*0.0005*/
								'unit': '%',
								'invert': false
							}
						},
						'y': {
							'top': {
								'initial': 4,/*1*/  /*3*/
								'multiplier': 0.005,/*0.0008*/  /*0.003*/
								'unit': '%',
								'invert': false
							}
						}
						
					}
				},
			]	
		});
	};
});