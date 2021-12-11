<?php
//スマホのユーザーエージェント定義
function is_mobile(){
    $ua = $_SERVER['HTTP_USER_AGENT'];
	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
		return 1;
	exit();
	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
		return 0;
	exit();
	} else {
		return 0;
	exit();
	}
}

//不要なメタタグ削除
remove_action('wp_head', 'wp_generator'); // WordPressバージョン表記を削除
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer manifestを削除
remove_action('wp_head', 'rsd_link'); // EditURIを削除


//ヘッダーにRSSコード表示
add_theme_support( 'automatic-feed-links' );
//タイトル関数実装
add_theme_support( 'title-tag' );


//セパレーターの初期値設定
function jin_default_sepalater(){
  return get_option( 'seo_title_sepalater',"｜");//第1引数にID、第2引数にデフォルト値を設定する
}

function wp_jin_title_custom( $title ) {
	global $post;
	$sep_setting = jin_default_sepalater();
	$sep = $sep_setting;
	$site_name = trim( get_bloginfo('name'));
	$post_title = trim( get_the_title() );
	
	$site_desc = get_bloginfo('description');
	
	if( is_home() ){
		if( ! empty( $site_desc ) ){
			$title = $site_name.$sep.$site_desc;
		}else{
			$title = $site_name;
		}
	}elseif( is_front_page() ){
		if( ! get_post_meta($post->ID, 'jin_seotitle',true) == null ){
			$title = get_post_meta($post->ID, 'jin_seotitle',true);
		}else{
			$title = $site_name.$sep.$site_desc;
		}
	}elseif( is_page() || is_single() ){
		if( ! get_post_meta($post->ID, 'jin_seotitle',true) == null ){
			$title = get_post_meta($post->ID, 'jin_seotitle',true).$sep.$site_name;
		}else{
			$title = $post_title.$sep.$site_name;
		}
	}elseif( is_category() ){
		$title = cps_category_title().$sep.$site_name;
	}elseif( is_tag() ){
		$title = "【".single_tag_title( '', false )."】タグの記事一覧".$sep.$site_name;
	}elseif( is_month() ){
		$title = get_the_time( "Y年m月" )."の記事一覧".$sep.$site_name;
	}elseif( is_year() ){
		$title = get_the_time( "Y年" )."の記事一覧".$sep.$site_name;
	}elseif( is_search() ){
		$title = "検索結果".$sep.$site_name;
	}elseif( is_404() ){
		$title = "ページが見つかりませんでした";
	}else{
		$title = $site_name;
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'wp_jin_title_custom');



function cps_jq_script() {
	if( ! is_admin() ){
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), false, true);
		wp_enqueue_script('jquery');
	}
}
add_action( 'wp_enqueue_scripts', 'cps_jq_script' );


//cssの読み込み
function jin_themeslug_enqueue_style() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	if( get_option( 'jin_fa_read_setting' ) == null ){
		wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
	}
	wp_enqueue_style( 'swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css' );
}

//jsの読み込み
function jin_themeslug_enqueue_script() {
	wp_enqueue_script('cps-common', get_template_directory_uri() . '/js/common.js', array('jquery'), false,true);
	wp_enqueue_script('jin-h-icons', get_template_directory_uri() . '/js/jin_h_icons.js', array('jquery'), false,true);
	wp_enqueue_script('cps-swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array(), false, true);
	if( get_option( 'jin_fa_read_setting' ) == null ){
		wp_enqueue_script( 'fontowesome5', 'https://use.fontawesome.com/releases/v5.6.3/js/all.js', array( 'jquery' ), false, true );
	}
}
add_action( 'wp_enqueue_scripts', 'jin_themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'jin_themeslug_enqueue_script' );


//管理画面でcssの読み込み
function jin_admin_print_styles() {
	wp_enqueue_style( 'wp-color-picker' );
	if( get_option( 'jin_fa_read_setting' ) == null ){
		wp_enqueue_style( 'my-fa-script','https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
	}
}
add_action('admin_print_styles', 'jin_admin_print_styles');

//管理画面でjsの読み込み
function jin_admin_print_scripts() {
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'my-admin-script', get_template_directory_uri() . '/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
	if( get_option( 'jin_fa_read_setting' ) == null ){
		wp_enqueue_script( 'my-fontowesome', 'https://use.fontawesome.com/releases/v5.6.3/js/all.js', array( 'jquery' ), false, true );
	}
}
add_action('admin_print_scripts', 'jin_admin_print_scripts');




// 投稿画面にオリジナルのスタイルを適用
function jin_editor_css(){
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'jin_editor_css');




// 管理画面（ビジュアルエディタ）にオリジナルのクラスを適用
function custom_editor_settings( $initArray ){
	if( ! get_option('hl_custom_check')){
		$style1 = get_theme_mod( 'h2_style', 'h2-style01' );
		$style2 = get_theme_mod( 'h3_style', 'h3-style01' );
		$style3 = get_theme_mod( 'h4_style', 'h4-style01' );
		
		$initArray['body_class'] = $style1." ".$style2." ".$style3;
		$initArray['valid_children'] = '+body[style],+div[div|span],+span[span],+td[style]';
	}else{
		$style1 = 'hl-custom';
		$initArray['body_class'] = $style1;
		$initArray['valid_children'] = '+body[style],+div[div|span],+span[span],+td[style]';
	}
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );





$upload_path = wp_upload_dir();

function wp_isset_widets($index = 1,$echo = false) {
	global $wp_registered_sidebars;

	if (is_int($index)) {
		$index = "sidebar-$index";
	} else {
		$index = sanitize_title($index);
		foreach((array)$wp_registered_sidebars as $key => $value) {
			if (sanitize_title($value['name']) == $index) {
				$index = $key;
				break;
			}
		}
	}

	$sidebar_widgets = wp_get_sidebars_widgets();

	if (empty($wp_registered_sidebars[$index]) || !array_key_exists($index,$sidebar_widgets) || !is_array($sidebar_widgets[$index]) || empty($sidebar_widgets[$index])) return false;

	$result = count($sidebar_widgets[$index]);

	if ($echo) {
		return $result;
	} else {
		return $result;
	}
}




//カテゴリー投稿数のタグカスタマイズ
function pt_list_categories( $output ) {
	$output  = preg_replace('/<\/a> \(([0-9,]*)\)/', ' <span class="count">${1}</span></a>', $output);
	return $output;
}
add_filter( 'wp_list_categories', 'pt_list_categories');

//アーカイブ投稿数のタグカスタマイズ
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' <span class="count">$2</span></a>',$output);
  return $output;
}
add_filter( 'get_archives_link', 'my_archives_link' );

//オリジナルパーツ読み込み
get_template_part( 'include/custom-widget' );
get_template_part( 'include/custom' );
get_template_part( 'include/custom-ad' );
get_template_part( 'include/custom-post' );
get_template_part( 'include/custom-field' );
get_template_part( 'include/custom-editor' );
get_template_part( 'include/custom-shortcode' );
get_template_part( 'include/custom-category' );
get_template_part( 'include/custom-space' );
get_template_part( 'include/custom-seo' );
get_template_part( 'gb-custom/gb-custom' );

//テキストウィジェットでショートコード読み込み
add_filter('widget_text', 'do_shortcode');



//ウィジェット
register_sidebar( array(
	'name' => 'サイドバー',
	'id' => 'sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );
register_sidebar( array(
	'name' => 'サイドバー追尾【PC】',
	'id' => 'sidebar-tracking',
	'description' => 'PCだけに表示される追尾用のウィジットエリアです。',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );


//トップページ上部ウィジェット
register_sidebar( array(
	'name' => 'トップページ上部',
	'id' => 'home-top-widget',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );


//トップページ下部ウィジェット
register_sidebar( array(
	'name' => 'トップページ下部',
	'id' => 'home-bottom-widget',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );


// 記事ページ上部ウィジェット
register_sidebar( array(
	'name' => '記事上部',
	'id' => 'post-top-widget',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );


//記事ページ下部ウィジェット
register_sidebar( array(
	'name' => '記事下部',
	'id' => 'post-bottom-widget',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widgettitle ef">',
	'after_title' => '</div>',
) );


//フッターウィジェット
if( is_footer_design() == "footer_style1" ){
	register_sidebar( array(
		'name' => 'フッター【左】',
		'id' => 'footer-menu-left',
		'description' => 'フッター【左】のウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => 'フッター【中央 -左-】',
		'id' => 'footer-menu-center1',
		'description' => '【ナビゲーションメニュー】【カテゴリー】【アーカイブ】ウィジェットのみ対応（投稿数は未対応）',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => 'フッター【中央 -右-】',
		'id' => 'footer-menu-center2',
		'description' => '【ナビゲーションメニュー】【カテゴリー】【アーカイブ】ウィジェットのみ対応（投稿数は未対応）',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => 'フッター【右】',
		'id' => 'footer-menu-right',
		'description' => 'フッター【右】のウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );
}elseif( is_footer_design() == "footer_style2" ){
	register_sidebar( array(
		'name' => 'フッター【左】',
		'id' => 'footer-menu-left',
		'description' => 'フッター【左】のウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => 'フッター【中央】',
		'id' => 'footer-menu-center',
		'description' => 'フッター【中央】のウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => 'フッター【右】',
		'id' => 'footer-menu-right',
		'description' => 'フッター【右】のウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle ef">',
		'after_title' => '</div>',
	) );
}



//追尾ウィジェット設定時のjs読み込み
if ( wp_isset_widets( 'sidebar-tracking',true ) ){
	function followwidget_enqueue_script() {
		wp_enqueue_script('cps-followwidget', get_template_directory_uri() . '/js/followwidget.js', array('jquery'), false,true);
	}
	add_action( 'wp_enqueue_scripts', 'followwidget_enqueue_script' );
}

//カスタムカテゴリーのタイトル取得
function cps_category_title(){
  global $post;

  $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
  $cat_class = get_category($t_id);
  $cat_option = get_option($t_id);

  if( isset($cat_option['cps_meta_title']) && $cat_option['cps_meta_title'] !== '' ){
    $category_title = $cat_option['cps_meta_title'];
  }else{
    $category_title = $cat_class->name;
  }
  return esc_html($category_title);
}

//カスタムカテゴリーのコンテンツ取得
function cps_category_description(){
  global $post;

  $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
  $cat_class = get_category($t_id);
  $cat_option = get_option($t_id);

  if( is_array($cat_option) ){
    $cat_option = array_merge(array('cont'=>''),$cat_option);
  }

  echo $content = apply_filters( 'the_content', stripslashes($cat_option['cps_meta_content']), 10 );
}


//カスタムカテゴリーの色取得
function cps_category_color(){
	$category=get_the_category();
	foreach($category as $cate){
		$cat_data=get_option(intval($cate->term_id));
		if(isset($cat_data['cps_meta_category_color'])){
			$cat_color=esc_html($cat_data['cps_meta_category_color']);
		}
		if(isset($cat_color)){
			echo $cat_color;
		}
	} 
}

//カスタムカテゴリーのディスクリプション取得
function cps_category_desc(){
  global $post;

  $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
  $cat_class = get_category($t_id);
  $cat_option = get_option($t_id);

  if( isset($cat_option['cps_meta_desc']) && $cat_option['cps_meta_desc'] !== '' ){
    $category_desc = $cat_option['cps_meta_desc'];
  }else{
    $category_desc = $cat_class->name;
  }
  echo esc_html($category_desc);
}


//カスタムカテゴリーのアイキャッチ画像取得
function cps_category_eyecatch(){
  global $post;

  $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
  $cat_class = get_category($t_id);
  $cat_option = get_option($t_id);

  if( isset($cat_option['cps_image_cat']) && $cat_option['cps_image_cat'] !== '' ){
    $category_eyecatch = $cat_option['cps_image_cat'];
  }
  echo esc_html($category_eyecatch);
}

//カスタムカテゴリーのピックアップ画像取得OGP用
function cps_category_eyecatch_pickup(){
  global $post;
	
  $t_id = get_category( intval( get_query_var('cat') ) )->term_id;
  $cat_class = get_category($t_id);
  $cat_option = get_option($t_id);

  if( isset($cat_option['cps_image_cat_pickup']) && $cat_option['cps_image_cat_pickup'] !== '' ){
    $category_eyecatch = $cat_option['cps_image_cat_pickup'];
  }
  echo esc_html($category_eyecatch);
}



//カスタムメニュー対応
add_theme_support( 'menus' );
register_nav_menus(array(
		'glonavi' => 'グローバルナビゲーション',
		'sp-footer-menu' => 'スマホ固定フッターメニュー',
		'sp-slide-menu' => 'スマホのスライドメニュー',
		'sp-sidemenu' => 'スマホのボタンメニュー',
		'pickup-contents' => 'トップページのピックアップコンテンツ',
	)
);


//カスタムメニューに「説明」を反映
add_filter( 'walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4 );
function description_in_nav_menu($item_output, $item, $depth, $args ){
	if ( !empty( $item->description ) ) {
		$item_output = str_replace( '">' . $args->link_before . $item->title, '">' . $args->link_before .'<span><i class="'.$item->description.'" aria-hidden="true"></i></span>' . $item->title, $item_output );
	}
	return $item_output;
}


// ID を削除する
add_filter('nav_menu_item_id', 'removeId', 10);
function removeId( $id ){
    return $id = array();
}


// ショートコード内の<p></p> を削除する
function priority_change(){
     remove_filter( 'the_content', 'do_shortcode', 11 );
     add_filter('the_content', 'do_shortcode', 1);
 }
 add_action('init', 'priority_change');



function cps_delete_span($content) {
    $array = array (
        '<span>[' => '[',
        ']</span>' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'cps_delete_span',1);



function jin_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	if ( $size_array[0] >= 856 ) {
		$width                = 856;
		$sources[$width]      = [
		'url'        =>$image_src,
		'descriptor' => 'w',
		'value'      => $width,
		];
		return $sources;
	}
}
add_filter( 'wp_calculate_image_srcset', 'jin_image_srcset', 10, 5 );


//ブログカード設定
//サイトドメインを取得
function get_this_site_domain(){
	//ドメイン情報を$results[1]に取得する
	preg_match( '/https?:\/\/(.+?)\//i', admin_url(), $results );
	return $results[1];
}

function cps_excerpt($content, $length) {
	$length = ($length ? $length : 70);//デフォルトの長さを指定する
	$content =  preg_replace('/<!--more-->.+/is',"",$content); //moreタグ以降削除
	$content =  strip_shortcodes($content);//ショートコード削除
	$content =  strip_tags($content);//タグの除去
	$content =  str_replace("&nbsp;","",$content);//特殊文字の削除（今回はスペースのみ）
	$content =  mb_substr($content,0,$length);//文字列を指定した長さで切り取る
	return $content;
}


function url_to_blog_card($the_content) {
	if ( is_singular() || is_category() || is_front_page() ) {
		
		preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/'.preg_quote(get_this_site_domain()).'\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);

		$value_count = array_count_values($m[0]);
		$max = '';
		if( !empty($value_count) ){
			$max = max($value_count);
		}
		$count=1;
		foreach ($m[0] as $match) {
			$url = strip_tags($match);
			$id = url_to_postid( $url );

			if ( ! $id ) continue;//IDを取得できない場合はループを飛ばす
				$post = get_post($id);
				$title = $post->post_title;
				if( ! get_post_meta($post->ID, 'post_desc',true) == null ){
					$excerpt = get_post_meta($post->ID, 'post_desc',true);
				}else{
					$excerpt = cps_excerpt($post->post_content,68);
				}
				$logo = esc_url( get_site_icon_url( 32 ) ) ;
				$sitetitle = get_bloginfo('name');
				$thumbnail = get_the_post_thumbnail($id, 'cps_thumbnails', array('width ' => '162','height ' => '91','class' => 'blog-card-thumb-image'));
				if ( ! $thumbnail ) {
					if ( get_theme_mod( 'jin_noimg_url') ) {
						$thumbnail = '<img src="'.get_theme_mod( 'jin_noimg_url').'" width="162" height="91" />';
					}else{
						$thumbnail = '<img src="'.get_template_directory_uri().'/img/noimg320.png" width="162" height="91" />';
					}
				}
			
			$tag = '<a href="'.$url.'" class="blog-card"><div class="blog-card-hl-box"><i class="jic jin-ifont-post"></i><span class="blog-card-hl"></span></div><div class="blog-card-box"><div class="blog-card-thumbnail">'.$thumbnail.'</div><div class="blog-card-content"><span class="blog-card-title">'.$title.'</span><span class="blog-card-excerpt">'.$excerpt.'...</span></div></div></a>';
			
			$count ++;
			
			if ($max == 1) {
				$the_content = preg_replace('{^' . preg_quote($match, '{}') . '}im', $tag , $the_content, 1);
			} else {
				$the_content = preg_replace('{'.preg_quote($tag).'}', $match, $the_content, $count);
				$the_content = preg_replace('{^' . preg_quote($match, '{}') . '}im', $tag , $the_content, $count);
			}
		}
	}
	return $the_content;
}
add_filter('the_content','url_to_blog_card');




//標準機能のoEmbedを無効にする設定
//oembed無効
add_filter( 'embed_oembed_discover', '__return_false' );
//Embeds
remove_action( 'parse_query', 'wp_oembed_parse_query' );
remove_action( 'wp_head', 'wp_oembed_remove_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_remove_host_js' );
//Wordpress4.5.3でポスト時に再び表示されるようになってしまったので対処
remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result');


/* 投稿画面のタイトルに文字カウンター */
function excerpt_count_js(){
$current_screen = get_current_screen();
	if ( ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) || ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) ) {
		// グーテンベルグ
	} else {
		// クラシック
		echo '<script>jQuery(document).ready(function(){
		jQuery("#titlewrap").after("<div style=\"position:absolute;top:43px;right:5px;color:#666;\"><small>タイトル文字数: </small><input type=\"text\" value=\"0\" maxlength=\"3\" size=\"3\" id=\"title_counter\" readonly=\"\" style=\"background:#fff;\"></div>");
		jQuery("#title_counter").val(jQuery("#title").val().length);
		jQuery("#title").keyup( function() {
		jQuery("#title_counter").val(jQuery("#title").val().length);
		});
		});</script>';
	}
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');


//コピーライトの自動取得
function get_copyright_date () {
	$all_posts = get_posts('post_status=publish&order=ASC');
	$first_post = $all_posts[0];
	$then = get_the_date('Y', $first_post);
	$now = date('Y');
	if ($then < $now) {
		return $then.'–'.$now;
	} else {
		return $then;
	}
}

//wp_titleの$sepが「｜」または半角スペースの場合は余分な空白削除
function my_title_fix($title, $sep, $seplocation){
    if(!$sep || $sep == "｜"){
        $title = str_replace(' '.$sep.' ', $sep, $title);
    }
    return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);


//アイキャッチ画像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(150, 150, true );


// 画像サイズを追加する
add_image_size('cps_thumbnails', 320, 180,true);
add_image_size('small_size', 640, 360,true);
add_image_size('large_size', 1280, 720,true);


// メディアライブラリに画像サイズを登録する
add_filter( 'image_size_names_choose', 'my_custom_image_sizes' );
if( ! function_exists('my_custom_image_sizes') ) {
	function my_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'small_size' => __('中サイズ（16：9）'),
			'large_size' => __('大サイズ（16：9）')
		) );
	}
}

//アイキャッチ画像のaltを取得
function jin_image_alt($size){
	if( $size == "large_size" ){
		$size_num = "1280x720";
	}elseif( $size == "small_size"){
		$size_num = "640x360";
	}elseif( $size == "cps_thumbnails"){
		$size_num = "320x180";
	}
	
	if(has_post_thumbnail()) {
		$load_image_url = get_the_post_thumbnail_url(get_the_ID(),$size);
		$alt_img_url = str_replace('-'.$size_num, '', $load_image_url );
		$img_id = attachment_url_to_postid($alt_img_url);
		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
	}else{
		$alt="";
	}
	return $alt;
}
function jin_image_alt_echo($size){
	if( $size == "large_size" ){
		$size_num = "1280x720";
	}elseif( $size == "small_size"){
		$size_num = "640x360";
	}elseif( $size == "cps_thumbnails"){
		$size_num = "320x180";
	}
	
	if(has_post_thumbnail()) {
		$load_image_url = get_the_post_thumbnail_url(get_the_ID(),$size);
		$alt_img_url = str_replace('-'.$size_num, '', $load_image_url );
		$img_id = attachment_url_to_postid($alt_img_url);
		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
	}else{
		$alt="";
	}
	echo $alt;
}
//アタッチメント画像のaltを取得（リサイズ型）
function jin_attach_resize_alt($attach_url,$size){
	if( $size == "large_size" ){
		$size_num = "1280x720";
	}elseif( $size == "small_size"){
		$size_num = "640x360";
	}elseif( $size == "cps_thumbnails"){
		$size_num = "320x180";
	}
	$load_image_url = $attach_url;
	$alt_img_url = str_replace('-'.$size_num, '', $load_image_url );
	$img_id = attachment_url_to_postid($alt_img_url);
	$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

	echo $alt;
}
//アタッチメント画像のaltを取得
function jin_attach_alt($attach_url){
	$load_image_url = $attach_url;
	$img_id = attachment_url_to_postid($load_image_url);
	$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

	echo $alt;
}


// post_thumbnail で出力されるimgタグのカスタマイズ
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
add_filter( 'post_thumbnail_html', 'custom_attribute' );


// the excerptのカスタマイズ
function post_list_excerpt($length) {
	global $post;
	if(! is_404()){
		$content = mb_substr(strip_tags($post->post_excerpt),0,$length);
		if(!$content){
			$content =  $post->post_content;
			$content =  strip_shortcodes($content);
			$content =  strip_tags($content);
			$content =  str_replace("&nbsp;","",$content);
			$content =  html_entity_decode($content,ENT_QUOTES,"UTF-8");
			$content =  mb_substr($content,0,$length);
		}
		return $content;
	}
}


function my_excerpt($content){
	$content = str_replace(']]>', ']]&gt;', $content);
	$trimMatch = array("&nbsp;" , "&nbsp" , "&nbs" , "&nb" , "&n" , "&");
	return str_replace($trimMatch , "" , $content);
}
add_filter('get_the_excerpt', 'my_excerpt');

function custom_excerpt_more($more) {
	return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );


add_post_type_support( 'page', 'excerpt' );



function cps_thumb_info($info) {
	global $post;
	$thumbnail_id = get_post_thumbnail_id($post->ID); //アタッチメントIDの取得
	$image = wp_get_attachment_image_src( $thumbnail_id, 'small_size' ); //「full」サイズのアイキャッチの情報を取得
	$thumb_src = $image[0]; //url
	$thumb_width = $image[1]; //横幅
	$thumb_height = $image[2]; //高さ
	if ($info == "url"){
		echo $thumb_src;
	}elseif ($info == "width"){
		echo $thumb_width;
	}elseif ($info == "height"){
		echo $thumb_height;
	}
}



//ループ外で使うdescriptionの自動設定
function jin_auto_desc_func() {
	$post_id = get_the_ID();
	$post = get_post( $post_id );
	$auto_desc	= wp_html_excerpt( $post->post_content, 60, '' );
	
	return esc_attr( $auto_desc );
}


remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
function rel_next_prev_link_tags() {
  if(is_single() || is_page()) {
    global $wp_query;
    $multipage = check_multi_page();
    if($multipage[0] > 1) {
      $prev = generate_multipage_url('prev');
      $next = generate_multipage_url('next');
      if($prev) {
        echo '<link rel="prev" href="'.$prev.'" />'.PHP_EOL;
      }
      if($next) {
        echo '<link rel="next" href="'.$next.'" />'.PHP_EOL;
      }
    }
  } else{
    global $paged;
    if ( get_previous_posts_link() ){
      echo '<link rel="prev" href="'.get_pagenum_link( $paged - 1 ).'" />'.PHP_EOL;
    }
    if ( get_next_posts_link() ){
      echo '<link rel="next" href="'.get_pagenum_link( $paged + 1 ).'" />'.PHP_EOL;
    }
  }
}
add_action( 'wp_head', 'rel_next_prev_link_tags' );


function generate_multipage_url($rel='prev') {
  global $post;
  $url = '';
  $multipage = check_multi_page();
  if($multipage[0] > 1) {
    $numpages = $multipage[0];
    $page = $multipage[0] == 0 ? 1 : $multipage[0];
    $i = 'prev' == $rel ? $page - 1 : $page + 1;
    if($i && $i > 0 && $i <= $numpages) {
      if(1 == $i) {
        $url = get_permalink();
      } else {
        if ('' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending'))) {
          $url = add_query_arg('page', $i, get_permalink());
        } else {
          $url = trailingslashit(get_permalink()).user_trailingslashit($i, 'single_paged');
        }
      }
    }
  }
  return $url;
}


// nextpage記法対応
function check_multi_page() {
  $num_pages    = substr_count(
      $GLOBALS['post']->post_content,
      '<!--nextpage-->'
  ) + 1;
  $current_page = get_query_var( 'page' );
  return array ( $num_pages, $current_page );
}


// imgタグのpタグを削除
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');



add_shortcode('caption', 'cps_caption_shortcode');
// captionショートコードで吐き出されるHTMLを調整
function cps_caption_shortcode($attr, $content = null) {
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>s*)?<img [^>]+>(?:s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr, 'caption'));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<span class="wp-caption-text">' . $caption . '</span></div>';
}






// この記事を書いた人用のSNS情報
function author_sns_meta($sns){
	$sns['twitter'] = 'Twitter';
	$sns['facebook'] = 'Facebook';
	$sns['instagram'] = 'Instagram';
	$sns['youtube'] = 'YouTube';
	$sns['line'] = 'LINE';
	$sns['contact'] = 'お問い合わせページ';
	
	return $sns;
}
add_filter('user_contactmethods', 'author_sns_meta');


function pre_get_posts_custom($query) {
	if( is_admin() || ! $query->is_main_query() ){
		return;
	}
	
	if ( $query->is_home() ) {
		$delete_cat_id_sum = get_theme_mod('toppost_list_cat_delete');
		$query->set( 'cat',$delete_cat_id_sum );
		return;
	}
}
add_action( 'pre_get_posts', 'pre_get_posts_custom' );


//カテゴリー一覧画面にカテゴリーID表示
function add_jin_category_columns($columns){
    $index = 2; 

    return array_merge(
        array_slice($columns, 0, $index),
        array('id' => 'カテゴリーID'),
        array_slice($columns, $index)
    );
}
add_filter('manage_edit-category_columns', 'add_jin_category_columns');

function add_jin_categoryid_custom_fields($deprecated, $column_name, $term_id){
    if ($column_name == 'id') {
        echo $term_id;
    }
}
add_action('manage_category_custom_column', 'add_jin_categoryid_custom_fields', 10, 3);


//タグ一覧画面にカテゴリーID表示
function add_jin_tag_columns($columns){
    $index = 2; 

    return array_merge(
        array_slice($columns, 0, $index),
        array('id' => 'タグID'),
        array_slice($columns, $index)
    );
}
add_filter('manage_edit-post_tag_columns', 'add_jin_tag_columns');

function add_jin_tagid_custom_fields($deprecated, $column_name, $term_id){
    if ($column_name == 'id') {
        echo $term_id;
    }
}
add_action('manage_post_tag_custom_column', 'add_jin_tagid_custom_fields', 10, 3);



//投稿一覧画面に記事ID表示
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
	$defaults['wps_post_id'] = __('ID');
	return $defaults;
}
function posts_custom_id_columns($column_name, $id){
	if($column_name === 'wps_post_id'){
		echo $id;
	}
}



//記事中の最初のh2タグの上に広告自動設置
function content_insert_ad($the_content) {
	global $post;
	// 投稿のみに適用
	if ( ! is_single() ) {
		return $the_content;
	}
	$h2_ad = get_post_meta($post->ID, 'custom_ad_off', true);
	$ad_text = get_option('ad_setting_text');
	if( ! $h2_ad == 'この記事で広告を表示しない' ){
		if( ! is_mobile() && ! get_option('ad_single_h2_pc') == null ){
			$ad = '<div class="sponsor-h2-center">'.$ad_text.'</div><div class="ad-single-h2">'.get_option('ad_single_h2_pc').'</div>';
			$tag = '/<h2.*?>/i';
			if ( preg_match( $tag, $the_content, $tags )) {
				$the_content = preg_replace($tag, $ad.$tags[0], $the_content, 1);
			}
		}elseif( is_mobile() && ! get_option('ad_single_h2_sp') == null ){
			$ad = '<div class="sponsor-h2-center">'.$ad_text.'</div><div class="ad-single-h2">'.get_option('ad_single_h2_sp').'</div>';
			$tag = '/<h2.*?>/i';
			if ( preg_match( $tag, $the_content, $tags )) {
				$the_content = preg_replace($tag, $ad.$tags[0], $the_content, 1);
			}
		}
	}
	return $the_content;
}
add_filter('the_content','content_insert_ad');


//ページャー
function responsive_pagination($pages = '', $range = 4){
	
	if( is_mobile() ){
		$range = 1;
	}
		
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;

	//ページ情報の取得
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}

	if(1 != $pages){
		echo '<ul class="pagination ef" role="menubar" aria-label="Pagination">';
		
		if( is_mobile() ){
			if( $paged > 3 ){
				echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>1</span></a></li><li class="spancount"><span>...</span></li>';
			}elseif( $paged == 3 && $pages > 3 ){
				echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>1</span></a></li>';
			}
		}else{
			if( $paged == 5 && $pages > 5 ){
				
				
			}elseif( $pages > 10 && $paged > 5 ){
				echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>1</span></a></li><li class="spancount"><span>...</span></li>';
			}
		}
		
		//番号つきページ送りボタン
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? '<li class="current"><a><span>'.$i.'</span></a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" ><span>'.$i.'</span></a></li>';
			}
		}
		
		//最後尾へ
		if( is_mobile() ){
			if( $paged < ($pages-2) ){
				echo '<li class="spancount"><span>...</span></li><li class="last"><a href="'.get_pagenum_link($pages).'"><span>'.$pages.'</span></a></li>';
			}elseif( $paged == ($pages-2) && $pages > 3 ){
				echo '<li><a href="'.get_pagenum_link($pages).'"><span>'.$pages.'</span></a></li>';
			}
		}else{
			if( $pages < 10 ){

			}elseif( $paged < ($pages-5) ){
				echo '<li class="spancount"><span>...</span></li><li class="last"><a href="'.get_pagenum_link($pages).'"><span>'.$pages.'</span></a></li>';
			}elseif( $paged == ($pages-5) && $pages > 6 ){
				echo '<li><a href="'.get_pagenum_link($pages).'"><span>'.$pages.'</span></a></li>';
			}
		}
		
		echo '</ul>';
	}
}


//投稿日と更新日
function get_modtime($format) {
    $modtime = get_the_modified_time('Y.m.d');
    $pubtime = get_the_time('Y.m.d');
    if ($pubtime > $modtime) {
        return get_the_time($format);
    } elseif ($pubtime === $modtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}


//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
  if ( is_singular() || is_category() ) {
    //YouTube動画にラッパーを装着
    $the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="video">${0}</div>', $the_content);
    //Instagram動画にラッパーを装着
    $the_content = preg_replace('/<iframe[^>]+?instagram\.com[^<]+?<\/iframe>/is', '<div class="instagram">${0}</div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');



//アクセスカウント
function set_post_views() {
  $postID = get_the_ID();
  $num = (int)date_i18n('H'); // 現在時間で番号取得
  $key = 'pv_count';
  $count_key = '_pv_count';
  $count_array = get_post_meta( $postID, $count_key, true );
  $sum_count = get_post_meta( $postID, $key, true );

  if( !is_array($count_array) ) { //配列ではない
    $count_array = array();
    $count_array[$num] = 1;
  } else { //配列である
    if ( isset( $count_array[$num] ) ) { //カウント配列[n]が存在する
      $count_array[$num] += 1;
    } else { //カウント配列[n]が存在しない
      $count_array[$num] = 1;
    }
  }

  //アクセス数を更新する
  update_post_meta( $postID, $count_key, $count_array );
  update_post_meta( $postID, $key, $sum_count + 1 );
}



//実行間隔の追加
function my_interval( $schedules ) {
  // 1時間ごとを追加
  $schedules['1hours'] = array(
    'interval' => 10,
    'display' => 'every 1 hours'
  );
  return $schedules;
}
add_filter( 'cron_schedules', 'my_interval' );

//アクションフックを定期的に実行するスケジュールイベントの追加
function my_activation() {
  if ( ! wp_next_scheduled( 'set_hours_event' ) ) {
    wp_schedule_event( 1451574000, '1hours', 'set_hours_event' );
  }
}
add_action('wp', 'my_activation');

//ボットの判別
function isBot() {
    $bot_list = array (
        'Googlebot',
        'Yahoo! Slurp',
        'Mediapartners-Google',
        'msnbot',
        'bingbot',
        'MJ12bot',
        'Ezooms',
        'pirst; MSIE 8.0;',
        'Google Web Preview',
        'ia_archiver',
        'Sogou web spider',
        'Googlebot-Mobile',
        'AhrefsBot',
        'YandexBot',
        'Purebot',
        'Baiduspider',
        'UnwindFetchor',
        'TweetmemeBot',
        'MetaURI',
        'PaperLiBot',
        'Showyoubot',
        'JS-Kit',
        'PostRank',
        'Crowsnest',
        'PycURL',
        'bitlybot',
        'Hatena',
        'facebookexternalhit',
        'NINJA bot',
        'YahooCacheSystem',
        'NHN Corp.',
        'Steeler',
        'DoCoMo',
    );
    $is_bot = false;
    foreach ($bot_list as $bot) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
            $is_bot = true;
            break;
        }
    }
    return $is_bot;
}


// 管理バーにログアウトを追加
function jin_add_new_item_in_admin_bar() {
	global $wp_admin_bar;

	$args = [
		'id' => 'custom_admin_bar_menu_id',
		'title' => 'JINマニュアル',
		'href' => 'https://jin-theme.com/manual/',
		'meta' => array('target' => '_blank')
	];
	$wp_admin_bar->add_menu($args);

	$args_submenu_1 = [
		'id' => 'cusotm-sub-menu-1',
		'title' => 'JINマニュアル',
		'parent' => 'custom_admin_bar_menu_id',
		'href' => 'https://jin-theme.com/manual/',
		'meta' => array('target' => '_blank')
	];
	$wp_admin_bar->add_menu($args_submenu_1);

	$args_submenu_2 = [
		'id' => 'cusotm-sub-menu-2',
		'title' => 'JINショートコード一覧',
		'parent' => 'custom_admin_bar_menu_id',
		'href' => 'https://jin-theme.com/manual/shortcord-list/',
		'meta' => array('target' => '_blank')
	];
	$wp_admin_bar->add_menu($args_submenu_2);

	$args_submenu_3 = [
		'id' => 'cusotm-sub-menu-3',
		'title' => 'JINアイコン一覧',
		'parent' => 'custom_admin_bar_menu_id',
		'href' => 'https://jin-theme.com/original-icon/',
		'meta' => array('target' => '_blank')
	];
	$wp_admin_bar->add_menu($args_submenu_3);

	$wp_admin_bar->add_menu(array(
		'id' => 'new_item_in_admin_bar',
		'title' => __('ログアウト'),
		'href' => wp_logout_url()
	));
}
add_action('wp_before_admin_bar_render', 'jin_add_new_item_in_admin_bar');


//アップデートチェック
require_once( 'theme-update.php' );
// 引数に api の URL を指定
$ATPU_Theme = new ATPU_Theme( 'https://jin-dev.com/jin/api/' );
?>