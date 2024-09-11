/* ==========================
common 
========================== */
$(function(){
	$('.ivo').on('inview', function() {
			var delay = $(this).data('delay') ? $(this).data('delay') : 0;
			var duration = $(this).data('duration') ? $(this).data('duration') : 0;
			$(this).css('visibility', 'visible');
			$(this).addClass($(this).data('animate'));
			if( delay > 0 ){
			  $(this).css('animation-delay', delay+ 's');
			}
			if( duration > 0 ){
			  $(this).css('animation-duration', transiton+ 's');
			}
	});
});

/* ==========================
header 
========================== */
//hamburger
$(function () {
	$('.humBtn').on('click', function() {
	    $(this).toggleClass('open');
	    $('.hd').toggleClass('open');
	    $(this).next().slideToggle();
	});
});
//header bg
// $(function () {
// 	setTimeout(function(){
		
// 		if($('section').hasClass('withMV__trigger')){
// 			var hdLogoIcon = $('.hd__logo--icon img');
// 			// var loginIcon = $('.login__icon');
// 			var checkLogoWht = hdLogoIcon.attr('src').replace('blk.png' , 'wht.png');
// 			var checkLogoBlk = hdLogoIcon.attr('src').replace('wht.png' , 'blk.png');
// 			// var checkIconWht = loginIcon.attr('src').replace('blk.svg' , 'wht.svg');
// 			// var checkIconBlk = loginIcon.attr('src').replace('wht.svg' , 'blk.svg');

			
// 			//hamburger
// 			$('.humBtn').on('click', function() {
// 				if ($(this).hasClass("open")) {
// 					hdLogoIcon.attr('src', checkLogoWht);
// 				} else {
// 					if ($('body').hasClass("withMV")) {
// 						hdLogoIcon.attr('src', checkLogoBlk);
// 					}
// 				}
// 			});
// 			//color change
// 			if($('body').hasClass('withMV')){
// 				hdLogoIcon.attr('src', checkLogoBlk);
// 				// loginIcon.attr('src', checkIconBlk);
// 			}else{
// 				hdLogoIcon.attr('src', checkLogoWht);
// 				// loginIcon.attr('src', checkIconWht);
// 			}
// 			headerH   = $('.hd').height();
// 			toriggerH = $('.withMV__trigger').height();
// 			targetPos = toriggerH - headerH;
// 			$(window).on("scroll", function() {
// 				scrollPosition = $(window).scrollTop() ;
// 				if (scrollPosition > targetPos  ) {
// 					$('body').removeClass('withMV');
// 				} else {
// 					$('body').addClass('withMV');
// 				}
// 				if($('body').hasClass('withMV')){
// 					hdLogoIcon.attr('src', checkLogoBlk);
// 					// loginIcon.attr('src', checkIconBlk);
// 				}else{
// 					hdLogoIcon.attr('src', checkLogoWht);
// 					// loginIcon.attr('src', checkIconWht);
// 				}
// 			});
// 		}
// 	},500);
	
// });
$(function () {
	if($('section').hasClass('withMVwht__trigger')){
		headerH   = $('.hd').height();
		toriggerH = $('.withMVwht__trigger').height();
		targetPos = toriggerH - headerH;
		$(window).on("scroll", function() {
			scrollPosition = $(window).scrollTop() ;
			if (scrollPosition > targetPos  ) {
				$('body').removeClass('withMVwht');
			} else {
				$('body').addClass('withMVwht');
			}
		});
	}
});
//line modal
$(function () {
	$('.lineBtn').on('click', function() {
		$('.lineAdd').fadeIn();
	});
	$('.lineAdd__bg').on('click', function() {
		$('.lineAdd').fadeOut();
	});
});

/* ==============================
scroll 
============================== */
$(function () {
	$('a[href^="#"]').on('click', function() {
	  var href = $(this).attr('href');
	  var target = $(href == '#' || href == '' ? 'html' : href);
	  var targetPos = target.offset().top;
	  var startPos = $(window).scrollTop();
		  var endPos = targetPos;
	  
		  if ($(window).width() > 768) {
			  endPos -= 0;
		  } else {
			  endPos -= 0;
		  }
	  
	  $('html, body').animate({scrollTop:endPos}, 500, 'swing');
	  return false;
	});
});

/* ==============================
TOP 
============================== */
$(function () {
	var swiper = new Swiper(".topSlide", {
		loop:true,
        effect: "fade",
		speed:1000,
        autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".swiper-pagination",
		},
  	});
	$('#COLUMN01-MORE').on('click', function() {
		$(this).toggleClass('open');
		$('#COLUMN01-WRAP').slideToggle();
	});
	$('#COLUMN02-MORE').on('click', function() {
		$(this).toggleClass('open');
		$('#COLUMN02-WRAP').slideToggle();
	});
	$('#COLUMN03-MORE').on('click', function() {
		$(this).toggleClass('open');
		$('#COLUMN03-WRAP').slideToggle();
	});
});



/* ==========================
FAQ 
========================== */
$(function () {
	$('.pageFaq__blk--question').on('click', function() {
	    $(this).toggleClass('open');
	    $(this).next().slideToggle();
	});
});

/* ==============================
pageProductDetail
============================== */

$(function () {
	$('.pageProductDetail__btnArea--acd--head.js-acd').on('click', function() {
	    $(this).toggleClass('open');
	    $(this).nextAll().slideToggle();
	});
});




// TOP 固定ボタン（Products）
document.addEventListener('DOMContentLoaded', function() {
    // 要素を取得
    var fixedShop = document.querySelector('.js-fixProducts');
    var footer = document.querySelector('footer');

    // スクロールイベントを追加
    window.addEventListener('scroll', function() {
        // フッターの位置を取得
        var footerRect = footer.getBoundingClientRect();
        var windowHeight = window.innerHeight;

        // フッターが画面に入ったかをチェック
        if (footerRect.top < windowHeight && footerRect.bottom >= 0) {
            fixedShop.classList.add('off');
        } else {
            fixedShop.classList.remove('off');
        }
    });
});

// TOP Magazine スライダー
document.addEventListener('DOMContentLoaded', function() {
const topMaSwiper = new Swiper('.js-topMaSwiper', {
	// オプション
	loop: true,
	slidesPerView: 1,
	centeredSlides: true,
	spaceBetween: 25,
	speed: 1000,
	// autoHeight: true,
	// effect: "fade",
	// autoplay: {
	//   disableOnInteraction: false,
	// },

	// ページネーション
	pagination: {
	  el: '.swiper-pagination',
	  clickable: true,
	},

	// ブレイクポイント
	breakpoints: {
	  // 769px以上の場合
	  500: {
		slidesPerView: 3,
	  },
	},
  });
});