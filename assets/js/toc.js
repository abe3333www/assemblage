// hamburger
document.addEventListener('DOMContentLoaded', function () {
	const menuButton = document.querySelector('.js-hb');
	const navigation = document.querySelector('.js-nav');
	const navLinks = document.querySelectorAll('.js-nav a');
	const closeButton = document.querySelector('.js-close');
	const logo = document.querySelector('.js-logo');
	const logoImg = document.querySelector('.js-logo img');

	const navBg = document.querySelector('.js-navBg');
	const newLogoName = 'logo_hd_wht.png'; // 新しい画像のファイル名
	const originalLogoName = 'logo_hd_blk.png'; // 元の画像のファイル名


	function updateLogoImage() {
        const currentSrc = logoImg.src;
        const basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1); // ベースパスを取得
        if (logo.classList.contains('on')) {
            logoImg.src = basePath + newLogoName;
        } else {
            logoImg.src = basePath + originalLogoName;
        }
    }

	// ハンバーガー押した時
	menuButton.addEventListener('click', function () {
		navigation.classList.toggle('on');
		navBg.classList.add('on');
		logo.classList.toggle('on');


		// const currentSrc = logoImg.src;
		// const basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1); // ベースパスを取得
		// if (currentSrc.endsWith(originalLogoName)) {
		// 	logoImg.src = basePath + newLogoName;
		// } else {
		// 	logoImg.src = basePath + originalLogoName;
		// }


		updateLogoImage();
	});

	// ナビのリンク押した時
	navLinks.forEach(function (navLink) {
		navLink.addEventListener('click', function () {
			navigation.classList.remove('on');
			navBg.classList.remove('on');


			logo.classList.remove('on');

			// const currentSrc = logoImg.src;
			// const basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1); // ベースパスを取得
			// if (currentSrc.endsWith(originalLogoName)) {
			// 	logoImg.src = basePath + newLogoName;
			// } else {
			// 	logoImg.src = basePath + originalLogoName;
			// }

			// updateLogoImage();
		});


	});


	// 閉じるボタン押した時
	closeButton.addEventListener('click', function () {
		navigation.classList.remove('on');
		navBg.classList.remove('on');
		logo.classList.remove('on');


		// const currentSrc = logoImg.src;
		// const basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1); // ベースパスを取得
		// if (currentSrc.endsWith(originalLogoName)) {
		// 	logoImg.src = basePath + newLogoName;
		// } else {
		// 	logoImg.src = basePath + originalLogoName;
		// }

		// updateLogoImage();
	});


	// ナビ背景押した時
	navBg.addEventListener('click', function () {
		navigation.classList.remove('on');
		navBg.classList.remove('on');
		logo.classList.toggle('on');

		// const currentSrc = logoImg.src;
		// const basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1); // ベースパスを取得
		// if (currentSrc.endsWith(originalLogoName)) {
		// 	logoImg.src = basePath + newLogoName;
		// } else {
		// 	logoImg.src = basePath + originalLogoName;
		// }

		// updateLogoImage();
	});
});



$(function () {

	//基準点の準備
	var elem = [];

	//現在地を取得するための設定を関数でまとめる
	function PositionCheckTrend() {

		var hd = $("header.hdTc").outerHeight(true);

		$(".scroll-point").each(function (i) {
			elem[i] = Math.round(parseInt($(this).offset().top - hd - 0));
		});
	}

	//ナビゲーションに現在地のクラスをつけるための設定
	function ScrollAnimeTrend() {
		var scroll = Math.round($(window).scrollTop());

		var nav = $("header.hdTc li");
		$("header.hdTc li").removeClass('on');
		if (scroll >= 0 && scroll < elem[0]) {

		}
		else if (scroll >= elem[0] && scroll < elem[1]) {
			$(nav[1]).addClass('on');
			console.log('a');
		}
		else if (scroll >= elem[1] && scroll < elem[2]) {
			$(nav[2]).addClass('on');
		}
		else if (scroll >= elem[2] && scroll < elem[3]) {
			$(nav[3]).addClass('on');
		}
		else if (scroll >= elem[3] && scroll < elem[4]) {
			$(nav[4]).addClass('on');
		}
		else if (scroll >= elem[4] && scroll < elem[5]) {
			$(nav[5]).addClass('on');
		}
		else if (scroll >= elem[5]) {
			$(nav[6]).addClass('on');
		}
	}

	// 画面をスクロールをしたら動かしたい場合の記述
	$(window).scroll(function () {
		PositionCheckTrend();
		ScrollAnimeTrend();
	});

	// ページが読み込まれたらすぐに動かしたい場合の記述
	$(window).on('load', function () {
		PositionCheckTrend();
		ScrollAnimeTrend();
	});

	$(window).resize(function () {
		PositionCheckTrend()
	});

});

document.addEventListener('DOMContentLoaded', function() {
    // 要素を取得
    var fixedShop = document.querySelector('.js-fixShop');
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



// apクラスのマウスホバー
document.addEventListener('DOMContentLoaded', function() {
    const apLinkElements = document.querySelectorAll('.js-apLink');
    const apElements = document.querySelectorAll('.js-ap');

    apLinkElements.forEach(function(apLink) {
        apLink.addEventListener('mouseover', function() {
            apElements.forEach(function(apElement) {
                apElement.classList.add('on');
            });
        });

        apLink.addEventListener('mouseout', function() {
            apElements.forEach(function(apElement) {
                apElement.classList.remove('on');
            });
        });
    });
});
