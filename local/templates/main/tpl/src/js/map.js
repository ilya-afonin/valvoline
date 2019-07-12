'use strict';

function map() {
	if ($('#map').length > 0) {

		var dlat = 0,
		    dlng = 0;

		var offices = [{
			ID: 0,
			LAT: 55.750304,
			LNG: 37.648439,
			LOGO: 'assets/images/static/marker-1.svg',
			// PERCENT: 150
			NAME: 'ООО МаслаТорг',
			TEXT: 'Москва, ул. Пушкинская, 23 / Телефон: +7 (789) 789-45-12 / E-mail: info@maslatorg.ru / WebSite: maslatorg.ru'
		}, {
			ID: 1,
			LAT: 55.741989,
			LNG: 37.641702,
			LOGO: 'assets/images/static/marker-2.svg',
			NAME: 'ООО МаслаТорг',
			TEXT: 'Москва, ул. Пушкинская, 23 / Телефон: +7 (789) 789-45-12 / E-mail: info@maslatorg.ru / WebSite: maslatorg.ru'
		}];

		mapboxgl.accessToken = 'pk.eyJ1IjoiZGltYTE1MDEiLCJhIjoiY2p4aXcydHZmMDA1NjN0bzdrOHUxeWs3eCJ9.1CwUTHoTLPGSpkx0_4I8eg';

		var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/light-v9',
			center: [37.623557, 55.752509],
			zoom: 13.3
		});

		map.addControl(new MapboxLanguage({
		  defaultLanguage: 'ru'
		}));

		map.scrollZoom.disable();

		var markers = [];

		for (var i = 0; i < offices.length; i++) {

			var el = document.createElement('div');
			el.className = 'marker';
			el.style.backgroundImage = 'url(' + offices[i].LOGO + ')';
			el.dataset.id = offices[i].ID;
			el.dataset.name = offices[i].NAME;
			el.dataset.text = offices[i].TEXT;

			markers[i] = new mapboxgl.Marker({
				element: el,
				anchor: 'top',
				draggable: false
			}).setLngLat([eval(offices[i].LNG), eval(offices[i].LAT)]).addTo(map);
		}

		$('.mapboxgl-marker').each(function () {

			var name = $(this).attr('data-name');
			var text = $(this).attr('data-text');

			$(this).append('<div class="marker__descr"> <div class="marker__closer"></div> <div class="marker__descr-name">' + name + '</div> <div class="marker__descr-content"></div>  </div>');

			for (var i = 0; i < text.split('/').length; i++) {

				$(this).find('.marker__descr-content').append('<span>' + text.split('/')[i] + '</span>');
			}
		});

		$('.mapboxgl-marker').on('click', function () {

			if (!$(this).hasClass('is-opened')) {
				$('.mapboxgl-marker').removeClass('is-opened')
				$(this).addClass('is-opened')
			}
		})

		$('.marker__closer').on('click', function () {

			$('.mapboxgl-marker').removeClass('is-opened')

			return false
		})

		$(document).mouseup(function (e) {
			var container = $(".mapboxgl-marker");

    		if (!container.is(e.target) && container.has(e.target).length === 0) {
      			$('.mapboxgl-marker').removeClass('is-opened')
    		}
		});

	}
}
