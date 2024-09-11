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
    'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
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
    'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
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
