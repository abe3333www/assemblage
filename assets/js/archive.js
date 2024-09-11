// カテゴリー選択肢のカレント表示
jQuery(document).ready(function($) {
	// カテゴリーページかどうかを確認
	if ($('.cmnNoMvMain').hasClass('js-categoryphp')) {
		// 現在のカテゴリーに関連するクラスを操作
		$('.js-catItem1').removeClass('current-cat');
		// 新しいクラスを追加
		// 例えば、'new-current-cat' などの適切なクラス名を指定
		// $('.js-catItem1').addClass('new-current-cat');
	}
  });