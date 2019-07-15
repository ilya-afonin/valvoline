$(document).ready(function () {

	wSlider();

	sticky();

	dropScroll();

	artSlider();

	header();

	mCont();

	pSlider();

	scrollbar();

	map();

	newsBanner();

	headerScroll();

	aos();

	mContTabs();

	firstScreen();

    //anchors();

    ajaxMore();
});

const wSlider = () => {

	$('.w-slider__scene').each(function () {

		let scene = $(this)
		let navigation = scene.parents('.w-slider').find('.w-slider__arrows')
		let counter = scene.parents('.w-slider').find('.w-slider__counter')

		$('.w-slider__slide').each(function () {

			let index = $(this).index();
			$(this).attr('data-index', index);

		});



		let owlCount = (event) => {
			let index = $('.owl-item.active .w-slider__slide').attr('data-index')

			counter.find('.w-slider__counter-value').text('0' +event.item.count)

			if (index !== undefined) {
				counter.find('.w-slider__counter-current').text('0' + (+index + 1))
			}

			scene.parents('.w-slider').find('.w-slider__counter-line span').css({
				'animation': 'none'
			})

			scene.parents('.w-slider').find('.w-slider__counter-line span').removeClass('animated')
			scene.parents('.w-slider').find('.w-slider__counter-line span').removeAttr('style')
			scene.trigger('stop.owl.autoplay');
		

			let timeout = setTimeout(function () {
				scene.parents('.w-slider').find('.w-slider__counter-line span').addClass('animated')
				scene.trigger('play.owl.autoplay');

				clearInterval(timeout)
			}, 1)
		}

		scene.owlCarousel({
			items: 1,
			nav: true,
			dots: false,
			navText: '',
			navElement: 'a',
			navContainer: navigation,
			navClass: ['w-slider__arr w-slider__arr--prev', 'w-slider__arr w-slider__arr--next'],
			loop: true,
			onInitialized: owlCount,
			onTranslated: owlCount,

			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: false
		})
	})
}

const sticky = () => {

	if ($(window).width() > 1279) {
		
	}
	
}

const dropScroll = () => {

	$('.m-cont__drop').mCustomScrollbar();
}

const artSlider = () => {

	$('.art-slider__scene').each(function () {

		let scene = $(this)
		let navigation = scene.parents('.art-slider').find('.art-slider__arrows');
		let counter = scene.parents('.art-slider').find('.art-slider__counter')

		$('.art-slider__slide').each(function () {

			let index = $(this).index()
			$(this).attr('data-index', index)
		})

		let owlCount = (event) => {
			let index = $('.owl-item.active .art-slider__slide').attr('data-index')

			counter.find('.w-slider__counter-value').text('0' +event.item.count)

			if (index !== undefined) {
				counter.find('.w-slider__counter-current').text('0' + (+index + 1))
			}

			scene.parents('.art-slider').find('.w-slider__counter-line span').css({
				'animation': 'none'
			})

			scene.parents('.art-slider').find('.w-slider__counter-line span').removeClass('animated')
			scene.parents('.art-slider').find('.w-slider__counter-line span').removeAttr('style')
			scene.trigger('stop.owl.autoplay');
		

			let timeout = setTimeout(function () {
				scene.parents('.art-slider').find('.w-slider__counter-line span').addClass('animated')
				scene.trigger('play.owl.autoplay');

				clearInterval(timeout)
			}, 1)
		}

		scene.owlCarousel({
			items: 1,
			nav: true,
			navText: '',
			dots: false,
			navElement: 'a',
			navContainer: navigation,
			navClass: ['art-slider__arrow art-slider__arrow--prev', 'art-slider__arrow art-slider__arrow--next'],
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: false,
			onInitialized: owlCount,
			onTranslated: owlCount
		})
	})
}

const header = () => {

	$('body').on('click', '.header__burger', function () {

		$(this).toggleClass('is-opened');
		$('.header__menu').toggleClass('is-opened');
		$('.header__logo').toggleClass('is-active')
	});

    $('body').on('click', '.header__nav-link', function () {

        $('.header__burger').removeClass('is-opened');
        $('.header__menu').removeClass('is-opened');
        $('.header__logo').removeClass('is-active');

    });


}

const mCont = () => {

	$('body').on('click', '.m-cont__title-checked-name', function () {

		$(this).toggleClass('is-active')
		$('.m-cont__drop').toggleClass('is-visible')
	})

	$('body').on('click', '.m-cont__drop-link', function () {

		let name = $(this).text()

		$('.m-cont__title-checked-name').text(name)

		$('.m-cont__drop').removeClass('is-visible')

		return false
	})
}

const pSlider = () => {

     $('.p-slider__scene').owlCarousel({
		items: 1,
	 	nav: true,
	 	navText: '',
	 	loop: true,
	 	navClass: ['p-slider__arr p-slider__arr--prev', 'p-slider__arr p-slider__arr--next'],
	 	navElement: 'a',
	 	// mouseDrag: false
        onInitialize: function() {
            let indx;
            let that = $(this);
            $('.p-slider__slide').each(function(){

                if($(this).hasClass('active') ){
                    console.log($(this));
                    indx = $(this).data('index');
                    console.log(indx+1);

                    clearInterval(timer);

                    $('.owl-item').not('.active').removeClass('animated bounceInRight');
                    $(this).parent().addClass('animated bounceInRight');

                    that.trigger("to.owl.carousel", [3,1]);

                    let timer = setTimeout(function () {
                        $('.owl-item').not('.active').removeClass('animated bounceInRight')
                        clearInterval(timer)
                    }, 1000)

                }

            });
        }
	});

	$('body').on('click', '.p-slider__arr--next', function () {
		clearInterval(timer)
		$('.owl-item').not('.active').removeClass('animated bounceInRight')
		$('.owl-item.active').addClass('animated bounceInRight')

		let timer = setTimeout(function () {
			$('.owl-item').not('.active').removeClass('animated bounceInRight')



        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {'id': $('.owl-item.active').find('.p-slider__slide').data('id')},
            cache: false,
            error: function () {
                console.log("Error loading more");
            },
            success: function (loadHtml) {
                //window.history.pushState({page: url}, null, url);
                $('.product-cards').find('.js-show-more').remove();
                $('.product-cards__row').append(loadHtml);
            }
        });
            clearInterval(timer)
        }, 1000)

	})

	$('body').on('click', '.p-slider__arr--prev', function () {
		clearInterval(timer)
		$('.owl-item').not('.active').removeClass('animated bounceInLeft')
		$('.owl-item.active').addClass('animated bounceInLeft')

		let timer = setTimeout(function () {
			$('.owl-item').not('.active').removeClass('animated bounceInLeft')
			clearInterval(timer)
		}, 1000)
	})
}

const scrollbar = () => {

	$('.scrollbar').mCustomScrollbar();
} 

const newsBanner = () => {

	$('.news-banner__scene').owlCarousel({
		items: 1,
		nav: true,
		navElement: 'a',
		navText: '',
		navClass: ['news-banner__arr news-banner__arr--prev', 'news-banner__arr news-banner__arr--next']
	})
}

const headerScroll = () => {

	$(window).on('scroll', function () {

		let scrolled = $(window).scrollTop()

		if (scrolled > 300) {
			$('.header').addClass('header--scrolled')
		} else {
			$('.header').removeClass('header--scrolled')
		}
	})
}

const aos = () => {
	AOS.init();
}

const mContTabs = () => {

	$('.m-cont__tabs-button').on('click', function () {

		$('.m-cont__tabs-button').removeClass('is-active')
		$(this).addClass('is-active')

		let type = $(this).attr('data-tab');

		$('.m-cont__tabs-content-item').fadeOut(300, function () {

			$('#' + type).fadeIn()
		})
	})

	$('.m-cont__tabs-content').mCustomScrollbar();

	$('.m-cont__tabs-opener').on('click', function () {
		$(this).toggleClass('is-active');
		$('.m-cont__tabs-content').slideToggle()
	})
}

const firstScreen = () => {

	if ($('.welcome').length > 0 && $(window).width() > 1279) {

		let welcome = $('.welcome')
		let content = welcome.next('.container')
		let startOffset = $('.welcome').height()
		let overlay = $('.overlay')


		$(window).on('scroll load', function () {

			let scrolled = $(window).scrollTop()

			if (scrolled < startOffset) {

				let percent = 1 - (scrolled / startOffset);

				overlay.css({
					opacity: percent
				})

				content.css({
					'top': '0',
					'position': 'fixed',
				    'left': '50%',
    				'transform': 'translateX(-50%)'
				})

				welcome.css({
					'margin-bottom': '2000px'
				})

			} else {
				AOS.init();
				welcome.css({
					'margin-bottom': '0px'
				})
				$(".m-content__promo").stick_in_parent();

				overlay.css({
					opacity: '0'
				})
			}
			
		})
	}
}

/*const anchors = () => {

    $(function () {
        $('.scroll').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: $($(this).attr('href')).offset().top + 'px'
            }, 1100, 'swing');

        });

        if (window.location.hash) {

            // smooth scroll to the anchor id
            $('html,body').animate({
                scrollTop: $(window.location.hash).offset().top + 'px'
            }, 1100, 'swing');

        }
    });

};   */
Share = {
    vkontakte: function(purl, ptitle, pimg, text) {
        url  = 'http://vk.com/share.php?';
        url += 'url=http://'          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        Share.popup(url);
    },
    odnoklassniki: function(purl, text) {
        url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
        url += '&st.comments=' + encodeURIComponent(text);
        url += '&st._surl='    + encodeURIComponent(purl);
        Share.popup(url);
    },
    facebook: function(purl, ptitle, pimg, text) {
        url  = 'http://www.facebook.com/sharer.php?';
        url += 'u='       + encodeURIComponent(purl);
        url += '&title='     + encodeURIComponent(ptitle);
        url += '&description='   + encodeURIComponent(text);
        url += '&picture=' + encodeURIComponent(pimg);
        Share.popup(url);
    },
    telegram: function(purl, ptitle, pimg, text) {
        url  = 'https://telegram.me/share/url?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&text='       + encodeURIComponent(ptitle);
        url += '&description=' + encodeURIComponent(text);
        url += '&image='       + encodeURIComponent(pimg);
        url += '&noparse=true';
        Share.popup(url);
    },
    twitter: function(purl, ptitle) {
        url  = 'http://twitter.com/share?';
        url += 'text='      + encodeURIComponent(ptitle);
        url += '&url='      + encodeURIComponent(purl);
        url += '&counturl=' + encodeURIComponent(purl);
        Share.popup(url);
    },
    mailru: function(purl, ptitle, pimg, text) {
        url  = 'http://connect.mail.ru/share?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        url += '&description=' + encodeURIComponent(text);
        url += '&imageurl='    + encodeURIComponent(pimg);
        Share.popup(url)
    },
    google: function(purl) {
        url  = 'https://plus.google.com/share?';
        url += 'url='          + encodeURIComponent(purl);
        Share.popup(url)
    },

    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};

const ajaxMore = () => {

    $('body').on('click', '.js-show-more', function (e) {
        e.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            cache: false,
            error: function () {
                console.log("Error loading more");
            },
            success: function (loadHtml) {
                //window.history.pushState({page: url}, null, url);
                $('.product-cards').find('.js-show-more').remove();
                $('.product-cards__row').append(loadHtml);
            }
        });
    });

};