<?php

// カスタム投稿タイプ CTAを定義
function register_cpt_cta() {
 
    $labels = array(
        'name' => _x( 'CTA', 'cta' ),
        'singular_name' => _x( 'CTA', 'cta' ),
        'add_new' => _x( '新規追加', 'cta' ),
        'add_new_item' => _x( 'CTAを追加', 'cta' ),
        'edit_item' => _x( 'CTAを編集', 'cta' ),
        'new_item' => _x( '新しいCTA', 'cta' ),
        'view_item' => _x( 'CTAを見る', 'cta' ),
        'search_items' => _x( '検索', 'cta' ),
        'not_found' => _x( 'CTAがありません', 'cta' ),
        'not_found_in_trash' => _x( 'ゴミ箱にはなにもありません', 'cta' ),
        'parent_item_colon' => _x( '', 'cta' ),
        'menu_name' => _x( 'CTA', 'cta' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'CTAを掲載できます',
        'supports' => array( 'title', 'editor','thumbnail'),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
		'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'cta', $args );
}

add_action( 'init', 'register_cpt_cta' );





// アイコンを追加
function add_menu_icons_styles(){
	echo '<style>
		#adminmenu #menu-posts div.wp-menu-image:before {
			content: "\f119";
		}
		#adminmenu #menu-posts-cta div.wp-menu-image:before {
		   content: "\f481";
		}
	</style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );


?>