<?php
// 検索から固定ページを除外
// function SearchFilter($query) {
//     if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
//     $query->set( 'post_type', 'post' );
//     }
// }
// add_action( 'pre_get_posts','SearchFilter' );


//固定ページで相対パスを使用可能にする
function replaceImagePath($arg)
{
  $content = str_replace('"../assets/img/', '"' . get_bloginfo('template_directory') . '/assets/img/', $arg);
  return $content;
}
add_action('the_content', 'replaceImagePath');

//相対リンク用SC　[hurl]
add_shortcode('hurl', 'shortcode_hurl');
function shortcode_hurl()
{
  return home_url('/');
}

// function page_is_ancestor_of($slug)
// {
//   global $post;
//   // 親か判別したい固定ページスラッグからページ情報を取得
//   $page = get_page_by_path($slug);
//   $result = false;
//   if (isset($page)) {
//     foreach ($post->ancestors as $ancestor) {
//       if ($ancestor == $page->ID) {
//         $result = true;
//       }
//     }
//   }
//   return $result;
// }
function page_is_ancestor_of($slug)
{
  global $post;
  // 親か判別したい固定ページスラッグからページ情報を取得
  $page = get_page_by_path($slug);
  $result = false;
  if (isset($page)) {
    if (!empty($post->ancestors)) { // ancestorsが空でないか確認
      foreach ($post->ancestors as $ancestor) {
        if ($ancestor == $page->ID) {
          $result = true;
        }
      }
    } else {
      // ancestorsが空の場合の処理
      error_log('Warning: $post->ancestors is empty or not set');
    }
  }
  return $result;
}


//固定ページの自動整形を無効にする
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content)
{
  global $post;
  $remove_filter = false;
  $arr_types = array('page');
  $post_type = get_post_type($post->ID);
  if (in_array($post_type, $arr_types)) {
    $remove_filter = true;
  }
  if ($remove_filter) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}

function top_disable_block_editor($use_block_editor, $post)
{
  $post_type = $post->post_type;
  $post_name = $post->post_name;

  // 固定ページで、スラッグ名が「works」の場合はブロックエディタ無効化
  if ($post_type === 'page') return false;
  return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'top_disable_block_editor', 10, 2);



add_theme_support('post-thumbnails');

//  カスタム投稿 受賞歴
function awards_init()
{
  //カスタム投稿【 awards 】
  $labels = array(
    'name'               => _x('受賞歴一覧', 'post type general name'),
    'singular_name'      => _x('受賞歴一覧', 'post type singular name'),
    'add_new'            => _x('新規追加', 'awards'),
    'add_new_item'       => __('新しく受賞歴を追加する'),
    'edit_item'          => __('ページを編集'),
    'new_item'           => __('新しいページ'),
    'view_item'          => __('ページを見る'),
    'search_items'       => __('ページを探す'),
    'not_found'          => __('ページはありません'),
    'not_found_in_trash' => __('ゴミ箱にページはありません'),
    'parent_item_colon'  => '',
  );
  $args   = array(
    'labels'             => $labels,
    'description'        => '受賞歴一覧ページです。',
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'awards', 'with_front' => false),
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => 4,
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'show_in_rest'       => true,
    'supports'           => array('title', 'editor', 'thumbnail',),
    'has_archive'        => false,
  );
  register_post_type('awards', $args);
}
add_action('init', 'awards_init');



//  カスタム投稿 Magazine
function magazine_init()
{
  //カスタム投稿【 magazine 】
  $labels = array(
    'name'               => _x('Magazine一覧', 'post type general name'),
    'singular_name'      => _x('Magazine一覧', 'post type singular name'),
    'add_new'            => _x('新規追加', 'awards'),
    'add_new_item'       => __('新しくMagazineを追加する'),
    'edit_item'          => __('ページを編集'),
    'new_item'           => __('新しいページ'),
    'view_item'          => __('ページを見る'),
    'search_items'       => __('ページを探す'),
    'not_found'          => __('ページはありません'),
    'not_found_in_trash' => __('ゴミ箱にページはありません'),
    'parent_item_colon'  => '',
  );
  $args   = array(
    'labels'             => $labels,
    'description'        => 'Magazine一覧ページです。',
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'magazine', 'with_front' => false),
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => 4,
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'show_in_rest'       => true,
    'supports'           => array('title', 'editor', 'thumbnail',),
    'has_archive'        => true,
  );
  register_post_type('magazine', $args);

  // カテゴリ追加
  register_taxonomy(
    'magazine_cat',   // タクソノミーのスラッグ
    'magazine',       // カスタム投稿タイプ
    array(
      'hierarchical' => true,
      'label' => 'カテゴリ',
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'magazine', 'with_front' => false),
      'show_in_rest' => true,
    )
  );
}
add_action('init', 'magazine_init');



//  カスタム投稿 shoplist
function shoplist_init()
{
  //カスタム投稿【 shoplist 】
  $labels = array(
    'name'               => _x('shoplist一覧', 'post type general name'),
    'singular_name'      => _x('shoplist一覧', 'post type singular name'),
    'add_new'            => _x('新規追加', 'awards'),
    'add_new_item'       => __('新しく店舗を追加する'),
    'edit_item'          => __('ページを編集'),
    'new_item'           => __('新しいページ'),
    'view_item'          => __('ページを見る'),
    'search_items'       => __('ページを探す'),
    'not_found'          => __('ページはありません'),
    'not_found_in_trash' => __('ゴミ箱にページはありません'),
    'parent_item_colon'  => '',
  );
  $args   = array(
    'labels'             => $labels,
    'description'        => 'shoplist一覧ページです。',
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'shoplist', 'with_front' => false),
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-store',
    'show_in_rest'       => true,
    'supports'           => array('title'),
    'has_archive'        => true,
  );
  register_post_type('shoplist', $args);

  // カテゴリ追加
  register_taxonomy(
    'shoplist_cat',   // タクソノミーのスラッグ
    'shoplist',       // カスタム投稿タイプ
    array(
      'hierarchical' => true,
      'label' => '地域',
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'shoplist', 'with_front' => false),
      'show_in_rest' => true,
    )
  );
}
add_action('init', 'shoplist_init');


/* ****************************
カスタムフィールド
**************************** */
// カスタムフィールドを追加
function add_shoplist_meta_boxes() {
  add_meta_box(
      'shoplist_info', // メタボックスID
      '店舗情報', // メタボックスタイトル
      'display_shoplist_meta_box', // コールバック関数
      'shoplist', // カスタム投稿タイプ
      'normal', // 表示場所
      'high' // 優先度
  );
}
add_action('add_meta_boxes', 'add_shoplist_meta_boxes');

// メタボックスの中身を表示
function display_shoplist_meta_box($post) {
  $address = get_post_meta($post->ID, '_shop_address', true);
  $tel = get_post_meta($post->ID, '_shop_tel', true);
  $fax = get_post_meta($post->ID, '_shop_fax', true);
  $hours = get_post_meta($post->ID, '_shop_hours', true);
  $closed = get_post_meta($post->ID, '_shop_closed', true);
  $website = get_post_meta($post->ID, '_shop_website', true);
  wp_nonce_field(basename(__FILE__), 'shoplist_nonce');
  ?>
  <p>
      <label for="shop_address">住所</label>
      <input type="text" id="shop_address" name="shop_address" value="<?php echo esc_attr($address); ?>" style="width: 100%;" />
  </p>
  <p>
      <label for="shop_tel">Tel</label>
      <input type="text" id="shop_tel" name="shop_tel" value="<?php echo esc_attr($tel); ?>" style="width: 100%;" />
  </p>
  <p>
      <label for="shop_fax">Fax</label>
      <input type="text" id="shop_fax" name="shop_fax" value="<?php echo esc_attr($fax); ?>" style="width: 100%;" />
  </p>
  <p>
      <label for="shop_hours">営業時間</label>
      <input type="text" id="shop_hours" name="shop_hours" value="<?php echo esc_attr($hours); ?>" style="width: 100%;" />
  </p>
  <p>
      <label for="shop_closed">定休日</label>
      <input type="text" id="shop_closed" name="shop_closed" value="<?php echo esc_attr($closed); ?>" style="width: 100%;" />
  </p>
  <p>
      <label for="shop_website">サイトURL</label>
      <input type="text" id="shop_website" name="shop_website" value="<?php echo esc_attr($website); ?>" style="width: 100%;" />
  </p>
  <?php
}

// カスタムフィールドの保存
function save_shoplist_meta_box($post_id) {
  if (!isset($_POST['shoplist_nonce']) || !wp_verify_nonce($_POST['shoplist_nonce'], basename(__FILE__))) {
      return $post_id;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $post_id;
  }

  if (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // 各フィールドの保存処理
  $fields = [
      'shop_address' => '_shop_address',
      'shop_tel' => '_shop_tel',
      'shop_fax' => '_shop_fax',
      'shop_hours' => '_shop_hours',
      'shop_closed' => '_shop_closed',
      'shop_website' => '_shop_website',
  ];

  foreach ($fields as $key => $meta_key) {
      if (isset($_POST[$key])) {
          update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$key]));
      }
  }
}
add_action('save_post', 'save_shoplist_meta_box');


/* ****************************
ショートコード作成
**************************** */
// Google Maps iframeを出力するショートコードを作成
function get_google_maps_embed_without_api($address) {
  // 住所をURLエンコード
  $encoded_address = urlencode($address);

  // Google Maps埋め込み用URLを生成 (APIキーなし)
  $google_maps_url = "https://www.google.com/maps?q={$encoded_address}&output=embed";

  // iframeを返す
  return '<iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="' . esc_url($google_maps_url) . '"></iframe>';
}

// フロントエンドにGoogle Maps iframeを表示
function display_shop_google_map_without_api() {
  global $post;
  $address = get_post_meta($post->ID, '_shop_address', true);
  
  if ($address) {
      echo get_google_maps_embed_without_api($address);
  }
}
