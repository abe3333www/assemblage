

// hamburger
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('.js-hb');
    const navigation = document.querySelector('.js-nav');
    const navLinks = document.querySelectorAll('.js-nav a');
    const closeButton = document.querySelector('.js-close');
    const navBg = document.querySelector('.js-navBg');

    menuButton.addEventListener('click', function () {
        navigation.classList.toggle('on');
        navBg.classList.add('on');
    });

    navLinks.forEach(function (navLink) {
        navLink.addEventListener('click', function () {
            navigation.classList.remove('on');
            navBg.classList.remove('on');
        });
    });

    closeButton.addEventListener('click', function () {
        navigation.classList.remove('on');
        navBg.classList.remove('on');
    });

    navBg.addEventListener('click', function () {
        navigation.classList.remove('on');
        navBg.classList.remove('on');
    });
});






// スライダー MV
$(function () {
    const tobMvSwiper = new Swiper('.js-tobMvSwiper', {
        // オプション
        loop: true,
        slidesPerView: 1,
        // centeredSlides: true,
        spaceBetween: 0,
        speed: 1000,
        autoHeight: true,
        effect: "fade",
        allowTouchMove: false,
        autoplay: {
            disableOnInteraction: false,
        },
        // ブレイクポイント
        breakpoints: {
            // 769px以上の場合
            500: {
                slidesPerView: 1,
            },
        },
    });
});

// スライダー ABOUT
$(function () {
    const abSwiper = new Swiper('.js-abSwiper', {
        // オプション
        loop: true,
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 0,
        speed: 1000,
        autoHeight: true,
        allowTouchMove: false,
        autoplay: {
            disableOnInteraction: false,
        },

        // ページネーション
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // ブレイクポイント
        breakpoints: {
            // 769px以上の場合
            500: {
                slidesPerView: 1,
            },
        },
    });
});




// slideToggle
document.addEventListener('DOMContentLoaded', function () {
    // すべてのトグルボタンを取得
    const toggleButtons = document.querySelectorAll('.js-tglBtn');

    // 各ボタンにイベントリスナーを設定
    toggleButtons.forEach(function (toggleButton) {
        toggleButton.addEventListener('click', function () {
            const toggleContent = toggleButton.nextElementSibling; // 各ボタンに隣接する要素

            // 要素が非表示状態かどうかを高さで判断
            if (toggleContent.style.height === '0px' || toggleContent.style.height === '') {
                // スライドダウン
                let fullHeight = toggleContent.scrollHeight;
                if (window.matchMedia('(max-width: 834px)').matches) {
                    // 834px以下の処理
                    toggleContent.style.height = fullHeight + 'px'; // 実際の内容の高さに設定
                } else {
                    // 835px以上の処理
                    toggleContent.style.height = fullHeight + 20 + 'px'; // 実際の内容の高さに設定
                }
                toggleButton.classList.add('on');
            } else {
                // スライドアップ
                toggleContent.style.height = '0px';
                toggleButton.classList.remove('on');
            }
        });
    });
});




// 背景固定画像、セクション通過ごとに画像を変更
document.addEventListener("DOMContentLoaded", function () {
    function updateBackgroundImagesPc(imageSuffixes) {
        var currentImageIndex = 0;
        var sections = document.querySelectorAll('.js-bgSec');
        var fixedBgImg = document.querySelector('.js-fixedBgPc');

        window.addEventListener('scroll', function () {
            sections.forEach(function (section, index) {
                var sectionOffsetTop = section.getBoundingClientRect().top + window.scrollY;
                var sectionHeight = section.offsetHeight;
                var scrollPosition = window.scrollY;

                if (scrollPosition >= sectionOffsetTop && scrollPosition < sectionOffsetTop + sectionHeight) {
                    if (currentImageIndex !== index) {
                        currentImageIndex = index % imageSuffixes.length;
                        var currentSrc = fixedBgImg.getAttribute('src');
                        var basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1);
                        var newSrc = basePath + imageSuffixes[currentImageIndex];

                        fixedBgImg.classList.add('fade-out');

                        setTimeout(function () {
                            fixedBgImg.setAttribute('src', newSrc);
                            fixedBgImg.classList.remove('fade-out');
                        }, 500); // CSSのtransition時間と合わせる
                    }
                }
            });
        });
    }


    updateBackgroundImagesPc([
        'fixed_bg1.png',
        'fixed_bg2.png',
        'fixed_bg3.png',
        'fixed_bg4.png',
        'fixed_bg5.png'
    ]);

});


document.addEventListener("DOMContentLoaded", function () {
    function updateBackgroundImagesSp(imageSuffixes) {
        var currentImageIndex = 0;
        var sections = document.querySelectorAll('.js-bgSec');
        var fixedBgImg = document.querySelector('.js-fixedBgSp');

        window.addEventListener('scroll', function () {
            sections.forEach(function (section, index) {
                var sectionOffsetTop = section.getBoundingClientRect().top + window.scrollY;
                var sectionHeight = section.offsetHeight;
                var scrollPosition = window.scrollY;

                if (scrollPosition >= sectionOffsetTop && scrollPosition < sectionOffsetTop + sectionHeight) {
                    if (currentImageIndex !== index) {
                        currentImageIndex = index % imageSuffixes.length;
                        var currentSrc = fixedBgImg.getAttribute('src');
                        var basePath = currentSrc.substring(0, currentSrc.lastIndexOf('/') + 1);
                        var newSrc = basePath + imageSuffixes[currentImageIndex];

                        fixedBgImg.classList.add('fade-out');

                        setTimeout(function () {
                            fixedBgImg.setAttribute('src', newSrc);
                            fixedBgImg.classList.remove('fade-out');
                        }, 500); // CSSのtransition時間と合わせる
                    }
                }
            });
        });
    }


    updateBackgroundImagesSp([
        'fixed_bg1_sp.png',
        'fixed_bg2_sp.png',
        'fixed_bg3_sp.png',
        'fixed_bg4_sp.png',
        'fixed_bg5_sp.png'
    ]);

});




// totopボタン
document.addEventListener("scroll", function () {
    var h = window.innerHeight;
    var scrollHeight = document.documentElement.scrollHeight;
    var scrollPosition = window.innerHeight + window.scrollY;
    var footer = document.querySelector(".js-tobFt");
    var footerHeight = footer ? footer.offsetHeight : 0;
    var toTop = document.querySelector(".js-tobTotop");

    if (scrollPosition < h + 180) {
        toTop.style.opacity = "0";
        toTop.style.bottom = "100px";
        toTop.style.transition = ".3s";
    } else {
        toTop.style.opacity = "1";
        toTop.style.bottom = "-100px";
    }

    if (scrollHeight - scrollPosition <= footerHeight) {
        toTop.style.position = "absolute";
        toTop.style.transition = "none";
        toTop.style.bottom = footerHeight + 50 + "px";
    } else {
        toTop.style.position = "fixed";
        toTop.style.bottom = "50px";
    }
});
