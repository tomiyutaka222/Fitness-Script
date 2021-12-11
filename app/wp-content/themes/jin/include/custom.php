<?php
/*テーマカスタマイザーへ項目追加と削除*/
function cps_theme_customize_base($wp_customize){
	/*テーマカスタマイザーの固定フロントページセクションを削除*/
	$wp_customize->remove_section('static_front_page');
	
	/*サイトの設定*/
	$wp_customize->add_section( 'title_tagline', array(
		'title' => __( 'サイト基本設定', 'base' ),
		'priority' => 1,
    ));
	
    $wp_customize->get_setting( 'blogname', array(
		'title' => __( 'SEO用タイトル', 'base' ),
		'description' => '検索エンジン上でサイトタイトルとして表示されます（例：JIN）',
    ) );
 
    $wp_customize->add_control( 'blogname', array(
        'label'     => __( 'SEO用タイトル', 'base' ),
        'section'   => 'title_tagline',
    ));
	
	$wp_customize->get_setting( 'blogdescription', array(
		'title' => __( 'SEO用サブタイトル', 'base' ),
    ) );
 
    $wp_customize->add_control( 'blogdescription', array(
        'label'     => __( 'SEO用サブタイトル', 'base' ),
        'section'   => 'title_tagline',
    ));
	
	$wp_customize->add_setting( 'title_text', array( 
		'default' => '',
	));
	$wp_customize->add_control( 'title_text', array(
		'label' => __( 'サイトのタイトル', 'base' ),
		'description' => '<span style="font-size:0.8em; color:#888;">SEOタイトルとは別に、見た目上のタイトルを設定できます。</span>',
        'section' => 'title_tagline',
        'settings' => 'title_text',
        'type' => 'text'
    ));
	
	$wp_customize->add_setting( 'desc_text' );
	$wp_customize->add_control( 'desc_text', array(
		'label' => __( 'ディスクリプション', 'base' ),
		'description' => '<span style="font-size:0.8em; color:#888;">このサイトがどういったコンテンツなのか、検索エンジンやユーザーに向けて説明を書くことができます。</span>',
        'section' => 'title_tagline',
        'settings' => 'desc_text',
        'type' => 'textarea'
    ));
	
	$wp_customize->add_setting('font_style', array(
	   'default' => 'nofont-style',
	));
	$wp_customize->add_control( 'font_style', array(
	    'settings' => 'font_style',
	    'label' =>'フォント選択',
	    'section' => 'title_tagline',
	    'type' => 'radio',
	    'choices' => array(
			'nofont-style' => 'デフォルト（端末の標準フォント）',
			'nts-style' => '角ゴシックフォント（Noto Sans）',
			'rm-style' => '角丸ゴシックフォント（Rounded M+ 1c）',
        ),
	));
	$wp_customize->add_setting('animation_style', array(
	   'default' => 'animate',
	));
	$wp_customize->add_control( 'animation_style', array(
	    'settings' => 'animation_style',
	    'label' =>'アニメーション機能',
	    'section' => 'title_tagline',
	    'type' => 'radio',
	    'choices' => array(
			'animate' => '有効',
			'animate-off' => '無効',
        ),
	));
	
	
	$wp_customize->add_setting('theme_pub_mod_date', array(
	   'default' => 'mod',
	));
	$wp_customize->add_control( 'theme_pub_mod_date', array(
	    'settings' => 'theme_pub_mod_date',
	    'label' =>'記事の投稿日時の表示',
	    'section' => 'title_tagline',
	    'type' => 'radio',
		'priority'	=> 99,
	    'choices' => array(
			'pub' => '公開日のみ',
            'mod' => '更新日のみ（未更新の場合は公開日を表示）',
            'pub_mod' => '更新日と公開日',
			'none' => '非表示',
        ),
	));
	
	
	
	
	/*サイトデザイン設定*/
	$wp_customize->add_section( 'basedesign_section', array(
		'title' => __( 'サイトデザイン設定', 'base' ),
		'priority' => 2,
    ));
	
	$wp_customize->add_setting( 'theme_bg_image' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_bg_image', array(
		'label' => __( '背景画像', 'basedesign_section' ),
		'section' => 'basedesign_section',
		'settings' => 'theme_bg_image',
	)));
	
	$wp_customize->add_setting('header_design', array(
	   'default' => 'header_style1',
	));
	$wp_customize->add_control( 'header_design', array(
	    'settings' => 'header_design',
	    'label' =>'ヘッダーデザインの選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'header_style1' => 'スタイル１',
            'header_style2' => 'スタイル２（ヘッダー画像あり）',
			'header_style3' => 'スタイル３',
			'header_style4' => 'スタイル４（ヘッダー画像あり）',
			'header_style5' => 'スタイル５（ヘッダー画像あり）',
			'header_style6' => 'スタイル６',
			'header_style7' => 'スタイル７（ヘッダー画像あり）',
			'header_style8' => 'スタイル８（ヘッダー画像あり）',
			'header_style9' => 'スタイル９（ヘッダー画像あり）',
			'header_style10' => 'スタイル１０（ヘッダー画像あり）',
			'header_style11' => 'スタイル１１',
        ),
	));
	
	
	$wp_customize->add_setting('sidebar_design', array(
	   'default' => 'sidebar_style1',
	));
	$wp_customize->add_control( 'sidebar_design', array(
	    'settings' => 'sidebar_design',
	    'label' =>'サイドバーデザインの選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'sidebar_style1' => 'スタイル１',
            'sidebar_style2' => 'スタイル２',
			'sidebar_style3' => 'スタイル３',
			'sidebar_style4' => 'スタイル４',
			'sidebar_style5' => 'スタイル５',
			'sidebar_style6' => 'スタイル６',
        ),
	));
	
	$wp_customize->add_setting('article_design', array(
	   'default' => 'article_style1',
	));
	$wp_customize->add_control( 'article_design', array(
	    'settings' => 'article_design',
	    'label' =>'記事エリアのデザインの選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'article_style1' => 'スタイル１',
            'article_style2' => 'スタイル２',
        ),
	));
	
	$wp_customize->add_setting('footer_type', array(
	   'default' => 'footer_type1',
	));
	$wp_customize->add_control( 'footer_type', array(
	    'settings' => 'footer_type',
	    'label' =>'フッターデザインの選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'footer_type1' => 'スタイル１',
            'footer_type2' => 'スタイル２',
        ),
	));
	
	$wp_customize->add_setting('footer_design', array(
	   'default' => 'footer_style1',
	));
	$wp_customize->add_control( 'footer_design', array(
	    'settings' => 'footer_design',
	    'label' =>'フッターのカラム選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'footer_style1' => '４カラム',
            'footer_style2' => '３カラム',
        ),
	));
	
	
	$wp_customize->add_setting('glonavi_design', array(
	   'default' => 'type1',
	));
	$wp_customize->add_control( 'glonavi_design', array(
	    'settings' => 'glonavi_design',
	    'label' =>'グローバルメニューのデザイン選択',
	    'section' => 'basedesign_section',
	    'type' => 'radio',
	    'choices' => array(
            'type1' => 'パターン１',
            'type2' => 'パターン２',
        ),
	));
	$wp_customize->add_setting('glonavi_font_size', array(
	   'default' => '14px',
	));
	$wp_customize->add_control( 'glonavi_font_size', array(
	    'settings' => 'glonavi_font_size',
	    'label' =>'【PC用】グローバルメニューの文字サイズ',
		'description' => '<span style="font-size:0.8em; color:#888;">半角で入力。</span>',
	    'section' => 'basedesign_section',
	    'type' => 'text',
	));
	
	
	
	/*ブログのカラー設定*/
	$wp_customize->add_section( 'colors', array(
		'title' => __( 'カラー設定', 'color' ),
		'priority' => 3,
		'description' => 'テーマカラーやリンク文字などのカラーを変更できます。'
    ));

	$wp_customize->add_setting( 'theme_color', array( 'default' => '#3b4675' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
		'label' => __( 'テーマカラー', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_color'
    )));
	$wp_customize->add_setting( 'theme_accent_color', array( 'default' => '#ffcd44' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_accent_color', array(
		'label' => __( 'アクセントカラー', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_accent_color'
    )));
	$wp_customize->add_setting( 'theme_bg_color', array( 'default' => '#fff' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_bg_color', array(
		'label' => __( '背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_bg_color'
    )));
	
	
	
	$wp_customize->add_setting( 'theme_header_bg_color', array( 'default' => '#3b4675' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_header_bg_color', array(
		'label' => __( 'ヘッダーの背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_header_bg_color'
    )));
	$wp_customize->add_setting( 'theme_header_text_color', array( 'default' => '#f4f4f4' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_header_text_color', array(
		'label' => __( 'タイトルの文字色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_header_text_color'
    )));
	
	
	$wp_customize->add_setting( 'theme_menu_color', array( 'default' => '#f4f4f4' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_menu_color', array(
		'label' => __( 'メニューの文字色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_menu_color'
    )));
	$wp_customize->add_setting( 'theme_menu_bg_color', array( 'default' => '#fff' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_menu_bg_color', array(
		'label' => __( 'メニューの背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_menu_bg_color'
    )));
	$wp_customize->add_setting( 'theme_header_sns_color', array( 'default' => '#f4f4f4' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_header_sns_color', array(
		'label' => __( 'SNSボタンの色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_header_sns_color'
    )));
	
	$wp_customize->add_setting( 'theme_footer_text_color', array( 'default' => '#fff' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_footer_text_color', array(
		'label' => __( 'フッターの文字色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_footer_text_color'
    )));
	$wp_customize->add_setting( 'theme_footer_bg_color', array( 'default' => '#3b4675' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_footer_bg_color', array(
		'label' => __( 'フッターの背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_footer_bg_color'
    )));
	$wp_customize->add_setting( 'theme_link_color', array( 'default' => '#008db7' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_link_color', array(
		'label' => __( 'リンクの色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_link_color'
    )));
	
	$wp_customize->add_setting( 'theme_link_hover_color', array( 'default' => '#008db7' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_link_hover_color', array(
		'label' => __( 'リンクにマウスを合わせた時の色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_link_hover_color'
    )));
	$wp_customize->add_setting( 'theme_text_color', array( 'default' => '#3b4675' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_text_color', array(
		'label' => __( 'サイト内の文字色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_text_color'
    )));
	$wp_customize->add_setting( 'sp_slide_menu_text_color', array( 'default' => '#fff' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_slide_menu_text_color', array(
		'label' => __( 'スマホ専用メニューの文字色', 'color' ),
		'section' => 'colors',
		'settings' => 'sp_slide_menu_text_color'
    )));
	$wp_customize->add_setting( 'sp_slide_menu_bg_color', array( 'default' => '#3b4675' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_slide_menu_bg_color', array(
		'label' => __( 'スマホ専用メニューの背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'sp_slide_menu_bg_color'
    )));
	$wp_customize->add_setting( 'cps_info_bg_color', array( 'default' => '#ffcd44' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cps_info_bg_color', array(
		'label' => __( 'インフォメーションバーの背景色', 'color' ),
		'section' => 'colors',
		'settings' => 'cps_info_bg_color'
    )));
	$wp_customize->add_setting( 'theme_post_icon_color', array( 'default' => '#e9546b' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_post_icon_color', array(
		'label' => __( '記事中のアイコンの色', 'color' ),
		'section' => 'colors',
		'settings' => 'theme_post_icon_color'
    )));
	
	
	
	
	/*ヘッダー設定*/
	$wp_customize->add_section( 'base_section', array(
		'title' => __( 'ヘッダー設定', 'base' ),
		'priority' => 3,
    ));
	
	$wp_customize->add_setting('top_navi_display', array(
	   'default' => 'tn_on',
	));
	$wp_customize->add_control( 'top_navi_display', array(
	    'settings' => 'top_navi_display',
	    'label' =>'ヘッダー全体の表示選択',
	    'section' => 'base_section',
	    'type' => 'radio',
	    'choices' => array(
            'tn_on' => '表示',
            'tn_off' => '非表示',
        ),
	));
	$wp_customize->add_setting( 'topnavi_logo_image_url' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'topnavi_logo_image_url', array(
		'label' => __( 'サイトロゴ', 'base' ),
		'description' => '<span style="font-size:0.8em; color:#888;">ヘッダーに表示される<a href="https://jin-theme.com/manual/logo/" target=”_blank”>ロゴ画像</a>をここで設定できます。</span>',
		'section' => 'base_section',
		'settings' => 'topnavi_logo_image_url',
	)));
	$wp_customize->add_setting('topnavi_logo_alt', array(
	   'default' => get_bloginfo('name'),
	));
	$wp_customize->add_control( 'topnavi_logo_alt', array(
	    'settings' => 'topnavi_logo_alt',
		'description' => '<span style="font-size:0.8em; color:#888;">主に検索エンジンに向けて、ロゴ画像の説明文を追加できます（例：JINのロゴ画像）</span>',
	    'label' =>'サイトロゴのaltタグ設定',
	    'section' => 'base_section',
	    'type' => 'text',
	));
	
	$wp_customize->add_setting('topnavi_logotext_size', array(
	   'default' => '160',
	));
	$wp_customize->add_control( 'topnavi_logotext_size', array(
	    'settings' => 'topnavi_logotext_size',
	    'label' =>'ロゴとフレーズの文字サイズ調整',
		'description' => '<span style="font-size:0.8em; color:#888;">ヘッダーのロゴやフレーズの大きさ（横幅％）を調整できます。半角数字で入力。単位は不要です。<br>
（例：30）</span>',
	    'section' => 'base_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('topnavi_logotext_pad', array(
	   'default' => '15',
	));
	$wp_customize->add_control( 'topnavi_logotext_pad', array(
	    'settings' => 'topnavi_logotext_pad',
	    'label' =>'ロゴとフレーズの上下の余白',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力。単位は不要です。</span>',
	    'section' => 'base_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('top_navi_sc_display', array(
	   'default' => 'tn_search_off',
	));
	$wp_customize->add_control( 'top_navi_sc_display', array(
	    'settings' => 'top_navi_sc_display',
	    'label' =>'検索ボックスの表示選択',
	    'section' => 'base_section',
	    'type' => 'radio',
	    'choices' => array(
            'tn_search_on' => '表示',
            'tn_search_off' => '非表示',
        ),
	));
	$wp_customize->add_setting('top_navi_sns_display', array(
	   'default' => 'tn_sns_off',
	));
	$wp_customize->add_control( 'top_navi_sns_display', array(
	    'settings' => 'top_navi_sns_display',
	    'label' =>'SNSアイコンの表示選択',
	    'section' => 'base_section',
	    'type' => 'radio',
	    'choices' => array(
            'tn_sns_on' => '表示',
            'tn_sns_off' => '非表示',
        ),
	));

	$wp_customize->add_setting('sp_logotext_size', array(
	   'default' => '90',
	));
	$wp_customize->add_control( 'sp_logotext_size', array(
	    'settings' => 'sp_logotext_size',
	    'label' =>'【スマホ用】ヘッダーロゴとヘッダーフレーズの文字サイズ調整',
		'description' => '<span style="font-size:0.8em; color:#888;">スマホ用のロゴとヘッダーフレーズの大きさ（横幅％）を調整できます。半角数字で入力。単位は不要です。<br>
（例：60）</span>',
	    'section' => 'base_section',
	    'type' => 'text',
	));
	
	$wp_customize->add_setting('cps_info_text', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'cps_info_text', array(
	    'settings' => 'cps_info_text',
	    'label' =>'インフォバーに表示する文字',
	    'section' => 'base_section',
	    'type' => 'text',
	));
	
	$wp_customize->add_setting('cps_info_link', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'cps_info_link', array(
	    'settings' => 'cps_info_link',
	    'label' =>'インフォバーのリンク先URL',
	    'section' => 'base_section',
	    'type' => 'text',
	));

	
	
	
	/*ヘッダー画像設定*/
	$wp_customize->add_section( 'header_image_section', array(
		'title' => __( 'ヘッダー画像設定', 'base' ),
		'priority' => 4,
    ));
	
	$wp_customize->add_setting( 'top_image_url', array(
	   'default' => get_template_directory_uri().'/img/bg_default.jpg',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'top_image_url', array(
		'label' => __( 'ヘッダー画像', 'base' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_url',
		'description' => '<span style="font-size:0.8em; color:#888;">幅2400px以上で設定するとキレイに表示されます。</span>',
	)));
	$wp_customize->add_setting('top_image_link', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'top_image_link', array(
	    'settings' => 'top_image_link',
	    'label' =>'ヘッダー画像のリンク先URL',
	    'section' => 'header_image_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('top_image_hl', array(
		'default' => 'ここにヘッダー画像の文字を入力できます',
	));
	$wp_customize->add_control( 'top_image_hl', array(
	    'settings' => 'top_image_hl',
	    'label' =>'ヘッダー画像のキャッチフレーズ',
	    'section' => 'header_image_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting( 'top_image_text_color', array( 'default' => '#555' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_image_text_color', array(
		'label' => __( 'キャッチフレーズのカラー', 'color' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_text_color'
    )));
	$wp_customize->add_setting('top_image_text_option', array(
	   'default' => 'top-image-text-option-none',
	));
	$wp_customize->add_control( 'top_image_text_option', array(
	    'settings' => 'top_image_text_option',
	    'label' =>'キャッチフレーズの文字加工',
	    'section' => 'header_image_section',
	    'type' => 'radio',
	    'choices' => array(
            'top-image-text-option-none' => '加工なし',
            'top-image-text-option-border' => '白フチ',
			'top-image-text-option-shadow' => '影',
        ),
	));
	$wp_customize->add_setting('top_image_text', array(
	   'default' => 'ここにサブテキストを入力できます。',
	));
	$wp_customize->add_control( 'top_image_text', array(
	    'settings' => 'top_image_text',
	    'label' =>'ヘッダー画像のサブテキスト',
	    'section' => 'header_image_section',
	    'type' => 'textarea',
	));
	$wp_customize->add_setting( 'top_image_subtext_color', array( 'default' => '#555' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_image_subtext_color', array(
		'label' => __( 'サブテキストのカラー', 'color' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_subtext_color'
    )));
	$wp_customize->add_setting('top_image_subtext_option', array(
	   'default' => 'top-image-subtext-option-none',
	));
	$wp_customize->add_control( 'top_image_subtext_option', array(
	    'settings' => 'top_image_subtext_option',
	    'label' =>'サブテキストの文字加工',
	    'section' => 'header_image_section',
	    'type' => 'radio',
	    'choices' => array(
            'top-image-subtext-option-none' => '加工なし',
            'top-image-subtext-option-border' => '白フチ',
			'top-image-subtext-option-shadow' => '影',
        ),
	));
	
	$wp_customize->add_setting( 'top_image_btn_color', array( 'default' => '#ffcd44' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_image_btn_color', array(
		'label' => __( 'ヘッダー画像のボタンカラー', 'color' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_btn_color'
    )));
	$wp_customize->add_setting( 'top_image_btn_link', array(
		'default' => esc_url( home_url()),
	) );
    $wp_customize->add_control( 'top_image_btn_link', array(
		'label' => __( 'ヘッダー画像のボタンのリンク先', 'color' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_btn_link'
    ));
	$wp_customize->add_setting('top_image_btn_text', array(
	   'default' => 'ボタンテキストを入力',
	));
	$wp_customize->add_control( 'top_image_btn_text', array(
	    'settings' => 'top_image_btn_text',
	    'label' =>'ヘッダー画像のボタンテキスト',
	    'section' => 'header_image_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('top_image_meta_ctrl', array(
	   'default' => '0px',
	));
	$wp_customize->add_control( 'top_image_meta_ctrl', array(
	    'settings' => 'top_image_meta_ctrl',
	    'label' =>'ヘッダー画像のテキスト位置調整',
	    'section' => 'header_image_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('top_image_meta_ctrl_sp', array(
	   'default' => '0px',
	));
	$wp_customize->add_control( 'top_image_meta_ctrl_sp', array(
	    'settings' => 'top_image_meta_ctrl_sp',
	    'label' =>'【スマホ用】ヘッダー画像のテキスト位置調整',
	    'section' => 'header_image_section',
	    'type' => 'text',
	));
	
	

	$wp_customize->add_setting('top_image_child', array(
	   'default' => 'child_none',
	));
	$wp_customize->add_control( 'top_image_child', array(
	    'settings' => 'top_image_child',
	    'label' =>'ヘッダー画像の下層ページ表示選択',
	    'section' => 'header_image_section',
	    'type' => 'radio',
	    'choices' => array(
            'child_none' => '下層ページに表示させない',
            'child_ok' => '下層ページにも表示させる',
        ),
	));
	
	$wp_customize->add_setting( 'top_image_url_sp', array(
	   'default' => get_template_directory_uri().'/img/bg_default_sp.jpg',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'top_image_url_sp', array(
		'label' => __( '【スマホ用】ヘッダー画像', 'base' ),
		'section' => 'header_image_section',
		'settings' => 'top_image_url_sp',
		'description' => '<span style="font-size:0.8em; color:#888;">幅1500px以上で設定するとキレイに表示されます。</span>',
	)));
	
	
	
	
	/* フッター*/
	$wp_customize->add_section( 'footer_section', array(
		'title' => __( 'フッター設定', 'post' ),
		'priority' => 5,
    ));
	
	$wp_customize->add_setting('theme_footer_choice', array(
	   'default' => 'both',
	));
	$wp_customize->add_control( 'theme_footer_choice', array(
	    'settings' => 'theme_footer_choice',
	    'label' =>'フッターの表示項目の選択',
		'description' => '<span style="font-size:0.8em; color:#888;">フッター（ページの最下部）に表示する情報を選択できます。</span>',
	    'section' => 'footer_section',
	    'type' => 'radio',
		'priority'	=> 99,
	    'choices' => array(
            'both' => '全て表示',
            'onlycopy' => 'コピーライトのみ',
        ),
	));
	$wp_customize->add_setting( 'footer_text_left', array(
		'default' => 'プライバシーポリシー',
	));
	$wp_customize->add_control( 'footer_text_left', array(
		'label' =>'フッターの項目【左】のテキストを変更',
        'section' => 'footer_section',
        'settings' => 'footer_text_left',
		'priority'	=> 100,
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'footer_link_left', array(
		'default' => esc_url( home_url().'/privacy'),
	));
	$wp_customize->add_control( 'footer_link_left', array(
		'label' =>'フッターの項目【左】のリンクを変更',
        'section' => 'footer_section',
        'settings' => 'footer_link_left',
		'priority'	=> 101,
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'footer_text_right', array(
		'default' => '免責事項',
	));
	$wp_customize->add_control( 'footer_text_right', array(
		'label' =>'フッターの項目【右】のテキストを変更',
        'section' => 'footer_section',
        'settings' => 'footer_text_right',
		'priority'	=> 102,
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'footer_link_right', array(
		'default' => esc_url( home_url().'/law'),
	));
	$wp_customize->add_control( 'footer_link_right', array(
		'label' =>'フッターの項目【右】のリンクを変更',
        'section' => 'footer_section',
        'settings' => 'footer_link_right',
		'priority'	=> 103,
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'sp_sidemenu_title', array(
		'default' => 'MENU',
	));
	$wp_customize->add_control( 'sp_sidemenu_title', array(
		'label' =>'スマホサイドメニューのボタンテキスト',
        'section' => 'footer_section',
        'settings' => 'sp_sidemenu_title',
		'priority'	=> 104,
        'type' => 'text'
    ));


	
	
	
	
	
	/*トップページ設定*/
	$wp_customize->add_section( 'toppage_section', array(
		'title' => __( 'トップページ設定', 'top' ),
		'priority' => 7,
    ));
	
	$wp_customize->add_setting('pickup_style', array(
	   'default' => 'menu-style',
	));
	$wp_customize->add_control( 'pickup_style', array(
	    'settings' => 'pickup_style',
		'description' => '<span style="font-size:0.8em; color:#888;"><a href="https://jin-theme.com/manual/pick-up/" target=”_blank”>ピックアップコンテンツ</a>のデザインを3タイプから選択できます。</span>',
	    'label' =>'ピックアップコンテンツのタイプ選択',
	    'section' => 'toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'menu-style' => 'メニュータイプ',
			'menu-style-notext' => 'メニュータイプ(文字なし)',
            'post-style' => '記事タイプ',
        ),
	));
	$wp_customize->add_setting('pickup_child', array(
	   'default' => 'child_none',
	));
	$wp_customize->add_control( 'pickup_child', array(
	    'settings' => 'pickup_child',
	    'label' =>'ピックアップコンテンツの下層ページ表示選択',
	    'section' => 'toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'child_none' => '下層ページに表示させない',
            'child_ok' => '下層ページにも表示させる',
        ),
	));
	
	$wp_customize->add_setting('toppage_style', array(
	   'default' => 'two_column',
	));
	$wp_customize->add_control( 'toppage_style', array(
	    'settings' => 'toppage_style',
	    'label' =>'トップページのレイアウト選択',
	    'section' => 'toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'one_column' => '１カラム',
            'two_column' => '２カラム',
        ),
	));
	
	$wp_customize->add_setting('post_list_style', array(
	   'default' => 'magazinestyle',
	));
	$wp_customize->add_control( 'post_list_style', array(
	    'settings' => 'post_list_style',
	    'label' =>'トップページの記事一覧デザイン選択',
	    'section' => 'toppage_section',
	    'type' => 'radio',
	    'choices' => array(
            'magazinestyle' => 'マガジンスタイル（スマホ２カラム）',
			'magazinestyle-sp1col' => 'マガジンスタイル（スマホ１カラム）',
            'basicstyle' => 'ベーシックスタイル',
        ),
	));
	$wp_customize->add_setting('toppost_list_cat_delete', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'toppost_list_cat_delete', array(
	    'settings' => 'toppost_list_cat_delete',
	    'label' =>'最新記事一覧から除外したいカテゴリーIDに-をつけて入力',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力（記入例：-1,-4）</span>',
	    'section' => 'toppage_section',
	    'type' => 'text',
	));
	$wp_customize->add_setting('toppost_list_cat', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'toppost_list_cat', array(
	    'settings' => 'toppost_list_cat',
	    'label' =>'トップページの記事一覧に表示させるカテゴリーID',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力（３つまで）</span>',
	    'section' => 'toppage_section',
	    'type' => 'text',
	));
	
	$wp_customize->add_setting('jin_toppost_list_name', array(
	   'default' => '最新記事',
	));
	$wp_customize->add_control( 'jin_toppost_list_name', array(
	    'settings' => 'jin_toppost_list_name',
	    'label' =>'コンテンツマガジンの【最新記事】のテキスト',
	    'section' => 'toppage_section',
	    'type' => 'text',
	));


	/*記事のデザイン*/
	$wp_customize->add_section( 'post_design', array(
		'title' => __( '記事のデザイン設定', 'post' ),
		'priority' => 8,
    ));

	$wp_customize->add_setting('font_size', array(
	   'type'  => 'option',
	   'default' => 'm-size',
	));
	$wp_customize->add_control( 'font_size', array(
	    'settings' => 'font_size',
	    'label' =>'文字サイズ',
		'description' => '<span style="font-size:0.8em; color:#888;">記事内の文字の大きさを変更できます。',
	    'section' => 'post_design',
	    'type' => 'radio',
	    'choices' => array(
			'xl-size' => 'XL',
			'l-size' => 'L',
			'm-size' => 'M',
			's-size' => 'S',
            'xs-size' => 'XS',
        ),
	));
	$wp_customize->add_setting('font_size_sp', array(
	   'type'  => 'option',
	   'default' => 'm-size-sp',
	));
	$wp_customize->add_control( 'font_size_sp', array(
	    'settings' => 'font_size_sp',
	    'label' =>'文字サイズ（スマホ）',
		'description' => '<span style="font-size:0.8em; color:#888;">記事内の文字の大きさを変更できます。',
	    'section' => 'post_design',
	    'type' => 'radio',
	    'choices' => array(
			'xl-size-sp' => 'XL',
			'l-size-sp' => 'L',
			'm-size-sp' => 'M',
			's-size-sp' => 'S',
            'xs-size-sp' => 'XS',
        ),
	));
	
	
	
	$wp_customize->add_setting( 'theme_marker_color', array( 'default' => '#ffcedb' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_marker_color', array(
		'label' => __( 'マーカー１の色', 'post' ),
		'section' => 'post_design',
		'settings' => 'theme_marker_color'
    )));
	$wp_customize->add_setting('theme_marker_type', array(
	   'default' => '60',
	));
	$wp_customize->add_control( 'theme_marker_type', array(
	    'settings' => 'theme_marker_type',
	    'label' =>'マーカー１の太さ',
	    'section' => 'post_design',
	    'type' => 'radio',
	    'choices' => array(
			'80' => '細め',
			'60' => '普通',
			'0' => '太め',
        ),
	));
	$wp_customize->add_setting( 'theme_marker_color2', array( 'default' => '#a9eaf2' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_marker_color2', array(
		'label' => __( 'マーカー２の色', 'post' ),
		'section' => 'post_design',
		'settings' => 'theme_marker_color2'
    )));
	$wp_customize->add_setting('theme_marker2_type', array(
	   'default' => '60',
	));
	$wp_customize->add_control( 'theme_marker2_type', array(
	    'settings' => 'theme_marker2_type',
	    'label' =>'マーカー２の太さ',
	    'section' => 'post_design',
	    'type' => 'radio',
	    'choices' => array(
			'80' => '細め',
			'60' => '普通',
			'0' => '太め',
        ),
	));

	$wp_customize->add_setting( 'theme_cta_bgcolor', array( 'default' => '#6FBFCA' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_cta_bgcolor', array(
		'label' => __( 'CTAの背景色', 'post' ),
		'section' => 'post_design',
		'settings' => 'theme_cta_bgcolor'
    )));
	$wp_customize->add_setting( 'theme_cta_color', array( 'default' => '#fff' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_cta_color', array(
		'label' => __( 'CTA内の文字色', 'post' ),
		'section' => 'post_design',
		'settings' => 'theme_cta_color'
    )));
	
	$wp_customize->add_setting('related_type', array(
	   'default' => 'slide',
	));
	$wp_customize->add_control( 'related_type', array(
	    'settings' => 'related_type',
	    'label' =>'関連記事の表示形式',
	    'section' => 'post_design',
	    'type' => 'radio',
	    'choices' => array(
			'slide' => 'スライドスタイル',
			'basic1' => 'ベーシックスタイル',
			'magazine1' => 'マガジンスタイル（２カラム）',
			'magazine2' => 'マガジンスタイル（３カラム）',
        ),
	));
	$wp_customize->add_setting('related_title', array(
	   'default' => 'RELATED POST',
	));
	$wp_customize->add_control( 'related_title', array(
	    'settings' => 'related_title',
	    'label' =>'関連記事の見出し',
	    'section' => 'post_design',
	    'type' => 'text',
	));
	$wp_customize->add_setting('related_num', array(
	   'default' => '6',
	));
	$wp_customize->add_control( 'related_num', array(
	    'settings' => 'related_num',
	    'label' =>'関連記事の表示件数',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力</span>',
	    'section' => 'post_design',
	    'type' => 'text',
	));

	$wp_customize->add_setting('theme_eyecatch_off', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'theme_eyecatch_off', array(
	    'settings' => 'theme_eyecatch_off',
	    'label' =>'記事に自動で挿入されるアイキャッチ画像を非表示にする',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('comment_delete', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'comment_delete', array(
	    'settings' => 'comment_delete',
	    'label' =>'記事のコメントを表示する',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('sns_delete', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'sns_delete', array(
	    'settings' => 'sns_delete',
	    'label' =>'SNSボタンを表示しない',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('sns_top_delete', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'sns_top_delete', array(
	    'settings' => 'sns_top_delete',
	    'label' =>'ページ上部のSNSボタンのみを表示しない',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('prevnext_entries_delete', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'prevnext_entries_delete', array(
	    'settings' => 'prevnext_entries_delete',
	    'label' =>'記事下の「次の記事」「前の記事」を非表示にする',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('related_entries_delete', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'related_entries_delete', array(
	    'settings' => 'related_entries_delete',
	    'label' =>'記事下の関連記事を非表示にする',
	    'section' => 'post_design',
	    'type' => 'checkbox',
	));
	
	
	
	
	/*見出しデザイン*/
	$wp_customize->add_section( 'hl_design', array(
		'title' => __( '見出しデザイン設定', 'box' ),
		'priority' => 9,
    ));
	$wp_customize->add_setting('h2_style', array(
	   'default' => 'h2-style01',
	));
	$wp_customize->add_control( 'h2_style', array(
	    'settings' => 'h2_style',
	    'label' =>'大見出し（H2）デザイン',
	    'section' => 'hl_design',
	    'type' => 'radio',
	    'choices' => array(
			'h2-style01' => 'スタイル１',
			'h2-style02' => 'スタイル２',
			'h2-style04' => 'スタイル３',
			'h2-style03' => 'スタイル４',
			'h2-style05' => 'スタイル５',
			'h2-style06' => 'スタイル６',
			'h2-style07' => 'スタイル７',
			'h2-style08' => 'スタイル８',
			'h2-style09' => 'スタイル９',
			'h2-style10' => 'スタイル１０',
        ),
	));
	$wp_customize->add_setting('h2_style_icon', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'h2_style_icon', array(
	    'settings' => 'h2_style_icon',
		'description' => '<span style="font-size:0.8em; color:#888;">H2タグの前に自動でアイコンを挿入できます</span>',
	    'label' =>'アイコン選択',
	    'section' => 'hl_design',
	    'type' => 'select',
	    'choices' => array(
			'' => 'なし',
			'jin-h2-icons jin-checkicon-h2' => 'チェック',
			'jin-h2-icons jin-checkcircleicon-h2' => 'チェック（丸）',
			'jin-h2-icons jin-clovericon-h2' => 'クローバー',
			'jin-h2-icons jin-bookmarkicon-h2' => 'ブックマーク',
        ),
	));
	$wp_customize->add_setting('h3_style', array(
	   'default' => 'h3-style01',
	));
	$wp_customize->add_control( 'h3_style', array(
	    'settings' => 'h3_style',
	    'label' =>'小見出し（H3）デザイン',
	    'section' => 'hl_design',
	    'type' => 'radio',
	    'choices' => array(
			'h3-style01' => 'スタイル１',
			'h3-style02' => 'スタイル２',
			'h3-style03' => 'スタイル３',
			'h3-style04' => 'スタイル４',
			'h3-style05' => 'スタイル５',
			'h3-style06' => 'スタイル６',
			'h3-style07' => 'スタイル７',
        ),
	));
	$wp_customize->add_setting('h3_style_icon', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'h3_style_icon', array(
	    'settings' => 'h3_style_icon',
		'description' => '<span style="font-size:0.8em; color:#888;">H3タグの前に自動でアイコンを挿入できます</span>',
	    'label' =>'アイコン選択',
	    'section' => 'hl_design',
	    'type' => 'select',
	    'choices' => array(
			'' => 'なし',
			'jin-h3-icons jin-checkicon-h3' => 'チェック',
			'jin-h3-icons jin-checkcircleicon-h3' => 'チェック（丸）',
			'jin-h3-icons jin-clovericon-h3' => 'クローバー',
			'jin-h3-icons jin-bookmarkicon-h3' => 'ブックマーク',
        ),
	));
	$wp_customize->add_setting('h4_style', array(
	   'default' => 'h4-style01',
	));
	$wp_customize->add_control( 'h4_style', array(
	    'settings' => 'h4_style',
	    'label' =>'小見出し（H4）デザイン',
	    'section' => 'hl_design',
	    'type' => 'radio',
	    'choices' => array(
			'h4-style01' => 'スタイル１',
			'h4-style02' => 'スタイル２',
			'h4-style03' => 'スタイル３',
			'h4-style04' => 'スタイル４',
        ),
	));
	$wp_customize->add_setting('h4_style_icon', array(
	   'default' => '',
	));
	$wp_customize->add_control( 'h4_style_icon', array(
	    'settings' => 'h4_style_icon',
		'description' => '<span style="font-size:0.8em; color:#888;">H4タグの前に自動でアイコンを挿入できます</span>',
	    'label' =>'アイコン選択',
	    'section' => 'hl_design',
	    'type' => 'select',
	    'choices' => array(
			'' => 'なし',
			'jin-h4-icons jin-checkicon-h4' => 'チェック',
			'jin-h4-icons jin-checkcircleicon-h4' => 'チェック（丸）',
			'jin-h4-icons jin-clovericon-h4' => 'クローバー',
			'jin-h4-icons jin-bookmarkicon-h4' => 'ブックマーク',
        ),
	));
	$wp_customize->add_setting('hl_custom_check', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'hl_custom_check', array(
	    'settings' => 'hl_custom_check',
	    'label' =>'見出しをオリジナルデザインにする',
	    'section' => 'hl_design',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'hl_custom', array(
		'default' => '.hl-custom h2{color:#000;}
.hl-custom h3{color:#000;}
.hl-custom h4{color:#000;}
@media (max-width: 768px) {
//ここから下にスマホ専用のCSSを記述

}', 
	));
	$wp_customize->add_control( 'hl_custom', array(
		'label' => __( 'オリジナルデザインのCSS記述'),
		'description' => '<span style="font-size:0.8em; color:red;">※見出しタグの前にhl-customクラス必須。また、スマホ用のメディアクエリは<br> @media (max-width: 768px) を使用推奨。</span>',
        'section' => 'hl_design',
        'settings' => 'hl_custom',
        'type' => 'textarea'
    ));
	
	
	
	/*ボックスデザイン*/
	$wp_customize->add_section( 'box_design', array(
		'title' => __( 'ボックスデザイン設定', 'box' ),
		'priority' => 10,
    ));
	$wp_customize->add_setting( 'simple_box1_c', array( 'default' => '#ef9b9b' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box1_c', array(
		'label' => __( '太枠線ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box1_c'
    )));
	$wp_customize->add_setting( 'simple_box2_c', array( 'default' => '#f2bf7d' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box2_c', array(
		'label' => __( '太点線ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box2_c'
    )));
	$wp_customize->add_setting( 'simple_box3_c', array( 'default' => '#b5e28a' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box3_c', array(
		'label' => __( '２重線ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box3_c'
    )));
	$wp_customize->add_setting( 'simple_box4_c', array( 'default' => '#7badd8' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box4_c', array(
		'label' => __( '細枠背景色ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box4_c'
    )));
	$wp_customize->add_setting( 'simple_box5_c', array( 'default' => '#e896c7' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box5_c', array(
		'label' => __( '細点線背景色ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box5_c'
    )));
	$wp_customize->add_setting( 'simple_box6_c', array( 'default' => '#fffdef' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box6_c', array(
		'label' => __( '背景色ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box6_c'
    )));
	$wp_customize->add_setting( 'simple_box7_c', array( 'default' => '#def1f9' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box7_c', array(
		'label' => __( '太枠背景色ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box7_c'
    )));
	$wp_customize->add_setting( 'simple_box8_c', array( 'default' => '#96ddc1' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box8_c', array(
		'label' => __( '左線ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box8_c'
    )));
	$wp_customize->add_setting( 'simple_box9_c', array( 'default' => '#e1c0e8' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_box9_c', array(
		'label' => __( '端折れボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'simple_box9_c'
    )));
	
	$wp_customize->add_setting( 'kaisetsu_box1_c', array( 'default' => '#ffb49e' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaisetsu_box1_c', array(
		'label' => __( 'タイトル付きボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'kaisetsu_box1_c'
    )));

	
	$wp_customize->add_setting( 'kaisetsu_box2_c', array( 'default' => '#89c2f4' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaisetsu_box2_c', array(
		'label' => __( '枠ありタイトル付きボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'kaisetsu_box2_c'
    )));

	$wp_customize->add_setting( 'kaisetsu_box4_c', array( 'default' => '#ea91a9' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaisetsu_box4_c', array(
		'label' => __( 'タブ付きボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'kaisetsu_box4_c'
    )));

	$wp_customize->add_setting( 'kaisetsu_box5_c', array( 'default' => '#57b3ba' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaisetsu_box5_c', array(
		'label' => __( '小さいタイトル付きボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'kaisetsu_box5_c'
    )));
	
	$wp_customize->add_setting( 'innerlink_box1_c', array( 'default' => '#73bc9b' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'innerlink_box1_c', array(
		'label' => __( 'あわせて読みたいボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'innerlink_box1_c'
    )));

	$wp_customize->add_setting( 'concept_box1_c', array( 'default' => '#85db8f' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box1_c', array(
		'label' => __( 'ポイントボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box1_c'
    )));
	$wp_customize->add_setting( 'concept_box1_text', array( 'default' => 'ポイント' ) );
    $wp_customize->add_control( 'concept_box1_text', array(
		'label' => __( 'ポイントボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box1_text',
		'type' => 'text'
    ));
	$wp_customize->add_setting( 'concept_box2_c', array( 'default' => '#f7cf6a' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box2_c', array(
		'label' => __( '注意点ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box2_c'
    )));
	$wp_customize->add_setting( 'concept_box2_text', array( 'default' => '注意点' ) );
    $wp_customize->add_control( 'concept_box2_text', array(
		'label' => __( '注意点ボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box2_text',
		'type' => 'text'
    ));
	$wp_customize->add_setting( 'concept_box3_c', array( 'default' => '#86cee8' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box3_c', array(
		'label' => __( '良い例ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box3_c'
    )));
	$wp_customize->add_setting( 'concept_box3_text', array( 'default' => '良い例' ) );
    $wp_customize->add_control( 'concept_box3_text', array(
		'label' => __( '良い例ボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box3_text',
		'type' => 'text'
    ));
	$wp_customize->add_setting( 'concept_box4_c', array( 'default' => '#ed8989' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box4_c', array(
		'label' => __( '悪い例ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box4_c'
    )));
	$wp_customize->add_setting( 'concept_box4_text', array( 'default' => '悪い例' ) );
    $wp_customize->add_control( 'concept_box4_text', array(
		'label' => __( '悪い例ボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box4_text',
		'type' => 'text'
    ));
	$wp_customize->add_setting( 'concept_box5_c', array( 'default' => '#9e9e9e' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box5_c', array(
		'label' => __( '参考ボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box5_c'
    )));
	$wp_customize->add_setting( 'concept_box5_text', array( 'default' => '参考' ) );
    $wp_customize->add_control( 'concept_box5_text', array(
		'label' => __( '参考ボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box5_text',
		'type' => 'text'
    ));
	$wp_customize->add_setting( 'concept_box6_c', array( 'default' => '#8eaced' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'concept_box6_c', array(
		'label' => __( 'メモボックスの色', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box6_c'
    )));
	$wp_customize->add_setting( 'concept_box6_text', array( 'default' => 'メモ' ) );
    $wp_customize->add_control( 'concept_box6_text', array(
		'label' => __( 'メモボックスのボックスタイトル', 'post' ),
		'section' => 'box_design',
		'settings' => 'concept_box6_text',
		'type' => 'text'
    ));
	
	
	
	
	
	/*ボタンデザイン*/
	$wp_customize->add_section( 'button_design', array(
		'title' => __( 'ボタンデザイン設定', 'button' ),
		'priority' => 11,
    ));
	$wp_customize->add_setting('button_style', array(
	   'default' => 'btn-style01',
	));
	$wp_customize->add_control( 'button_style', array(
	    'settings' => 'button_style',
	    'label' =>'ボタンデザイン',
	    'section' => 'button_design',
	    'type' => 'radio',
	    'choices' => array(
			'btn-style01' => 'マテリアルデザイン',
			'btn-style02' => 'フラットデザイン',
			'btn-style03' => '立体デザイン',
        ),
	));
	$wp_customize->add_setting( 'theme_ctm_btn_color01', array( 'default' => '#008db7' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_ctm_btn_color01', array(
		'label' => __( '色ボタン１の色', 'post' ),
		'section' => 'button_design',
		'settings' => 'theme_ctm_btn_color01'
    )));
	$wp_customize->add_setting( 'theme_ctm_btn_color02', array( 'default' => '#d9333f' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_ctm_btn_color02', array(
		'label' => __( '色ボタン２の色', 'post' ),
		'section' => 'button_design',
		'settings' => 'theme_ctm_btn_color02'
    )));
	$wp_customize->add_setting( 'theme_ctm_btn_custom', array( 'default' => '#3296d1' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_ctm_btn_custom', array(
		'label' => __( 'カスタムボタン１の色', 'post' ),
		'section' => 'button_design',
		'settings' => 'theme_ctm_btn_custom'
    )));
	$wp_customize->add_setting( 'theme_custom_btn_r', array( 'default' => '5' ));
	$wp_customize->add_control( 'theme_custom_btn_r', array(
		'label' => __( 'カスタムボタン１の【 丸み 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_custom_btn_r',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力</span>',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'theme_big_btn_w_size', array( 'type'  => 'option', 'default' => '75%' ));
	$wp_customize->add_control( 'theme_big_btn_w_size', array(
		'label' => __( 'カスタムボタン１の【 横幅 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_big_btn_w_size',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字と単位で入力</span>',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'theme_big_btn_h_size', array( 'type'  => 'option', 'default' => '20px' ));
	$wp_customize->add_control( 'theme_big_btn_h_size', array(
		'label' => __( 'カスタムボタン１の【 高さ 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_big_btn_h_size',
		'description' => '<span style="font-size:0.8em; color:#888;">【ボタン文字の上下の余白】半角数字と単位で入力</span>',
        'type' => 'text'
    ));

	$wp_customize->add_setting( 'theme_ctm_btn_custom2', array( 'default' => '#83d159' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_ctm_btn_custom2', array(
		'label' => __( 'カスタムボタン２の色', 'post' ),
		'section' => 'button_design',
		'settings' => 'theme_ctm_btn_custom2'
    )));
	$wp_customize->add_setting( 'theme_custom_btn_r2', array( 'default' => '5' ));
	$wp_customize->add_control( 'theme_custom_btn_r2', array(
		'label' => __( 'カスタムボタン２の【 丸み 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_custom_btn_r2',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字で入力</span>',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'theme_big_btn_w_size2', array( 'type'  => 'option', 'default' => '75%' ));
	$wp_customize->add_control( 'theme_big_btn_w_size2', array(
		'label' => __( 'カスタムボタン２の【 横幅 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_big_btn_w_size2',
		'description' => '<span style="font-size:0.8em; color:#888;">半角数字と単位で入力</span>',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'theme_big_btn_h_size2', array( 'type'  => 'option', 'default' => '20px' ));
	$wp_customize->add_control( 'theme_big_btn_h_size2', array(
		'label' => __( 'カスタムボタン２の【 高さ 】を調整', 'post' ),
        'section' => 'button_design',
        'settings' => 'theme_big_btn_h_size2',
		'description' => '<span style="font-size:0.8em; color:#888;">【ボタン文字の上下の余白】半角数字と単位で入力</span>',
        'type' => 'text'
    ));

	
	
	
	
	/*SNS設定*/
	$wp_customize->add_section( 'sns_section', array(
        'title' => __( 'SNS設定（OGP）', 'sns' ),
        'priority' => 12,
    ));
	
	$wp_customize->add_setting('sns_design_type', array(
	   'default' => 'sns-design-type01',
	));
	$wp_customize->add_control( 'sns_design_type', array(
	    'settings' => 'sns_design_type',
	    'label' =>'SNSボタンのデザイン',
	    'section' => 'sns_section',
	    'type' => 'radio',
	    'choices' => array(
			'sns-design-type01' => 'スタイル１',
			'sns-design-type02' => 'スタイル２',
        ),
	));
	
	$wp_customize->add_setting( 'ogp_image_url' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ogp_image_url', array(
		'label' => __( 'トップページのOGP画像', 'sns' ),
		'section' => 'sns_section',
		'settings' => 'ogp_image_url',
		'description' => '<span style="font-size:0.8em; color:#888;">トップページのOGP画像を設定できます。（設定しない場合はヘッダー画像が表示されます）</span>',
	)));
	$wp_customize->add_setting( 'fb_code', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'fb_code', array(
		'label' => __( 'facebookの管理者ID', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'fb_code',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'tw_name', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'tw_name', array(
		'label' => __( 'Twitterのユーザー名（＠も入れて下さい）', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'tw_name',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'sns_hashtag' );
	$wp_customize->add_control( 'sns_hashtag', array(
		'label' => __( 'シェアされたときのハッシュタグ', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'sns_hashtag',
		'description' => '<span style="font-size:0.8em; color:#888;">複数設定する場合は半角スペースで区切ってください。(例：#ハッシュタグ #ハッシュタグ)</span>',
        'type' => 'text'
    ));
	$wp_customize->add_setting( 'tw_type', array( 'type'  => 'option','default' => 'summary' ));
	$wp_customize->add_control( 'tw_type', array(
		'label' => __( 'Twitterのカードタイプ', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'tw_type',
        'type' => 'radio',
	    'choices' => array(
			'summary' => 'summary',
			'summary_large_image' => 'summary_large_image',
        ),
    ));
	$wp_customize->add_setting( 'fb_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'fb_page_url', array(
		'label' => __( 'facebookのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'fb_page_url',
        'type' => 'textarea'
    ));
	$wp_customize->add_setting( 'tw_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'tw_page_url', array(
		'label' => __( 'TwitterのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'tw_page_url',
        'type' => 'textarea'
    ));
	$wp_customize->add_setting( 'insta_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'insta_page_url', array(
		'label' => __( 'InstagramのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'insta_page_url',
        'type' => 'textarea'
    ));
	$wp_customize->add_setting( 'youtube_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'youtube_page_url', array(
		'label' => __( 'YouTubeのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'youtube_page_url',
        'type' => 'textarea'
    ));
	$wp_customize->add_setting( 'line_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'line_page_url', array(
		'label' => __( 'LINEのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'line_page_url',
        'type' => 'textarea'
    ));
	$wp_customize->add_setting( 'contact_page_url', array( 'type'  => 'option' ));
	$wp_customize->add_control( 'contact_page_url', array(
		'label' => __( 'お問い合わせページのURL', 'sns' ),
        'section' => 'sns_section',
        'settings' => 'contact_page_url',
        'type' => 'textarea'
    ));

	
	/*その他設定*/
	$wp_customize->add_section( 'jin_other_section', array(
        'title' => __( 'その他設定', 'jin_other_setting' ),
        'priority' => 13,
    ));
	
	$wp_customize->add_setting('kaereba_design', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'kaereba_design', array(
	    'settings' => 'kaereba_design',
	    'label' =>'カエレバヨメレバをJINオリジナルデザインにする',
	    'section' => 'jin_other_section',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('appreach_design', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'appreach_design', array(
	    'settings' => 'appreach_design',
	    'label' =>'アプリーチをJINオリジナルデザインにする',
	    'section' => 'jin_other_section',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('jin_code_highlighter', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'jin_code_highlighter', array(
	    'settings' => 'jin_code_highlighter',
		'description' => '<span style="font-size:0.8em; color:#888;">JINのビジュアルエディター（Classic Editor）で<a href="https://jin-theme.com/manual/syntaxhighlighter/" target=”_blank”>シンタックスハイライター</a>を利用できるようになります。</span>',
	    'label' =>'コードのシンタックスハイライターを利用する',
	    'section' => 'jin_other_section',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('jin_shortcode_parts_off', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'jin_shortcode_parts_off', array(
	    'settings' => 'jin_shortcode_parts_off',
		'description' => '<span style="font-size:0.8em; color:#888;">JINテーマのショートコードがコーディングを阻害してしまうことを防止できます。</span>',
	    'label' =>'ショートコードの[1]系列を無効化する',
	    'section' => 'jin_other_section',
	    'type' => 'checkbox',
	));
	$wp_customize->add_setting('jin_fa_read_setting', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'jin_fa_read_setting', array(
	    'settings' => 'jin_fa_read_setting',
		'description' => '<span style="font-size:0.8em; color:#888;">高速化のための設定。fontawesome5のアイコン利用しない場合はチェックを入れておくことを推奨します。</span>',
	    'label' =>'fontawesomeを読み込まない',
	    'section' => 'jin_other_section',
	    'type' => 'checkbox',
	));
	
	$wp_customize->add_setting('theme_bread_display', array(
	   'default' => 'exist',
	));
	$wp_customize->add_control( 'theme_bread_display', array(
	    'settings' => 'theme_bread_display',
	    'label' =>'パンくずリストの表示',
	    'section' => 'jin_other_section',
	    'type' => 'radio',
	    'choices' => array(
			'exist' => '表示',
			'none' => '非表示',
        ),
	));
	$wp_customize->add_setting('theme_totop_display', array(
	   'default' => 'exist',
	));
	$wp_customize->add_control( 'theme_totop_display', array(
	    'settings' => 'theme_totop_display',
	    'label' =>'トップへ戻るボタンの表示',
	    'section' => 'jin_other_section',
	    'type' => 'radio',
	    'choices' => array(
			'exist' => '表示',
			'none' => '非表示',
        ),
	));
	$wp_customize->add_setting( 'jin_noimg_url', array(
	   'default' => get_template_directory_uri().'/img/noimg480.png',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jin_noimg_url', array(
		'label' => 'NO IMAGE画像の設定',
		'section' => 'jin_other_section',
		'settings' => 'jin_noimg_url',
	)));

}
add_action( 'customize_register', 'cps_theme_customize_base' );


function cps_theme_customize_css(){
	$theme_color = get_theme_mod( 'theme_color', '#3b4675');
	$theme_accent_color = get_theme_mod( 'theme_accent_color', '#ffcd44');
	$theme_header_bg_color = get_theme_mod( 'theme_header_bg_color', '#3b4675');
	$theme_header_text_color = get_theme_mod( 'theme_header_text_color', '#f4f4f4');
	$theme_header_sns_color = get_theme_mod( 'theme_header_sns_color', '#f4f4f4');
	$theme_link_hover_color = get_theme_mod( 'theme_link_hover_color', '#008db7');
	$theme_link_color = get_theme_mod( 'theme_link_color', '#008db7');
	$theme_text_color = get_theme_mod( 'theme_text_color', '#3b4675');
	$sp_slide_menu_text_color = get_theme_mod( 'sp_slide_menu_text_color', '#fff');
	$sp_slide_menu_bg_color = get_theme_mod( 'sp_slide_menu_bg_color', '#3b4675');
	$cps_info_bg_color = get_theme_mod( 'cps_info_bg_color', '#ffcd44');
	$theme_bg_color = get_theme_mod( 'theme_bg_color', '#fff');
	$theme_bg_image = get_theme_mod( 'theme_bg_image' );
	$theme_header_color = get_theme_mod( 'theme_header_color', '#fff');
	$theme_menu_bg_color = get_theme_mod( 'theme_menu_bg_color', '#fff');
	$theme_menu_color = get_theme_mod( 'theme_menu_color', '#f4f4f4');
	$theme_marker_color = get_theme_mod( 'theme_marker_color', '#ffcedb');
	$theme_marker_color2 = get_theme_mod( 'theme_marker_color2', '#a9eaf2');
	$theme_marker_type = get_theme_mod( 'theme_marker_type', '60');
	$theme_marker2_type = get_theme_mod( 'theme_marker2_type', '60');
	$theme_ctm_btn_color01 = get_theme_mod( 'theme_ctm_btn_color01', '#008db7');
	$theme_ctm_btn_color02 = get_theme_mod( 'theme_ctm_btn_color02', '#d9333f');
	$theme_cta_bgcolor = get_theme_mod( 'theme_cta_bgcolor', '#6FBFCA');
	$theme_cta_color = get_theme_mod( 'theme_cta_color', '#fff');
	$theme_post_icon_color = get_theme_mod('theme_post_icon_color','#e9546b');
	
	$box_border_color = get_theme_mod( 'box_border_color', '#d9333f');
	$theme_topnavi_logotext_size = get_theme_mod( 'topnavi_logotext_size', '160');
	$theme_sp_logotext_size = get_theme_mod( 'sp_logotext_size', '100');
	$cps_info_text = get_theme_mod( 'cps_info_text', '');
	$cps_info_link = get_theme_mod( 'cps_info_link', '');

	$theme_h2_custom = get_theme_mod( 'h2-custom', '.h2-custom h2{color:#000;}
		.h2-custom h3{color:#000;}
		.h2-custom h4{color:#000;}');
	$theme_custom_btn_r = get_theme_mod( 'theme_custom_btn_r', '5');
	$theme_ctm_btn_custom = get_theme_mod( 'theme_ctm_btn_custom', '#3296d1');
	$theme_custom_btn_r2 = get_theme_mod( 'theme_custom_btn_r2', '5');
	$theme_ctm_btn_custom2 = get_theme_mod( 'theme_ctm_btn_custom2', '#83d159');
	$theme_big_btn_w_size = get_option( 'theme_big_btn_w_size', '75%');
	$theme_big_btn_h_size = get_option( 'theme_big_btn_h_size', '20px');
	$theme_big_btn_w_size2 = get_option( 'theme_big_btn_w_size2', '75%');
	$theme_big_btn_h_size2 = get_option( 'theme_big_btn_h_size2', '20px');
	$theme_button_style = get_theme_mod( 'button_style', 'btn-style01');
	$theme_footer_bg_color = get_theme_mod( 'theme_footer_bg_color', '#3b4675');
	$theme_footer_text_color = get_theme_mod( 'theme_footer_text_color', '#fff');
	$theme_topnavi_logotext_pad = get_theme_mod( 'topnavi_logotext_pad', '15');
	$theme_glonavi_font_size = get_theme_mod( 'glonavi_font_size', '14px');
	$top_image_text_color = get_theme_mod( 'top_image_text_color', '#555');
	$top_image_subtext_color = get_theme_mod( 'top_image_subtext_color', '#555');
	$top_image_btn_color = get_theme_mod( 'top_image_btn_color', '#ffcd44');
	
	$simple_box1_c = get_theme_mod( 'simple_box1_c', '#ef9b9b');
	$simple_box2_c = get_theme_mod( 'simple_box2_c', '#f2bf7d');
	$simple_box3_c = get_theme_mod( 'simple_box3_c', '#b5e28a');
	$simple_box4_c = get_theme_mod( 'simple_box4_c', '#7badd8');
	$simple_box5_c = get_theme_mod( 'simple_box5_c', '#e896c7');
	$simple_box6_c = get_theme_mod( 'simple_box6_c', '#fffdef');
	$simple_box7_c = get_theme_mod( 'simple_box7_c', '#def1f9');
	$simple_box8_c = get_theme_mod( 'simple_box8_c', '#96ddc1');
	$simple_box9_c = get_theme_mod( 'simple_box9_c', '#e1c0e8');
	
	$kaisetsu_box1_c = get_theme_mod( 'kaisetsu_box1_c', '#ffb49e');
	$kaisetsu_box2_c = get_theme_mod( 'kaisetsu_box2_c', '#89c2f4');
	$kaisetsu_box4_c = get_theme_mod( 'kaisetsu_box4_c', '#ea91a9');
	$kaisetsu_box5_c = get_theme_mod( 'kaisetsu_box5_c', '#57b3ba');
	
	$concept_box1_c = get_theme_mod( 'concept_box1_c', '#85db8f');
	$concept_box1_text = get_theme_mod( 'concept_box1_text', 'ポイント');
	$concept_box2_c = get_theme_mod( 'concept_box2_c', '#f7cf6a');
	$concept_box2_text = get_theme_mod( 'concept_box2_text', '注意点');
	$concept_box3_c = get_theme_mod( 'concept_box3_c', '#86cee8');
	$concept_box3_text = get_theme_mod( 'concept_box3_text', '良い例');
	$concept_box4_c = get_theme_mod( 'concept_box4_c', '#ed8989');
	$concept_box4_text = get_theme_mod( 'concept_box4_text', '悪い例');
	$concept_box5_c = get_theme_mod( 'concept_box5_c', '#9e9e9e');
	$concept_box5_text = get_theme_mod( 'concept_box5_text', '参考');
	$concept_box6_c = get_theme_mod( 'concept_box6_c', '#8eaced');
	$concept_box6_text = get_theme_mod( 'concept_box6_text', 'メモ');
	
	$innerlink_box1_c = get_theme_mod( 'innerlink_box1_c', '#73bc9b');
?>
	<style type="text/css">
		#wrapper{
			<?php if( is_mobile() ): ?>
				<?php if( is_article_design() == "article_style1" ) : ?>
				background-color: #fff;
				<?php elseif( is_article_design() == "article_style2" ): ?>
				background-color: <?php echo $theme_bg_color; ?>;
				background-image: url(<?php echo $theme_bg_image; ?>);
				<?php endif; ?>
			<?php else: ?>
				background-color: <?php echo $theme_bg_color; ?>;
				background-image: url(<?php echo $theme_bg_image; ?>);
			<?php endif; ?>
		}
		.related-entry-headline-text span:before,
		#comment-title span:before,
		#reply-title span:before{
			background-color: <?php echo $theme_color; ?>;
			border-color: <?php echo $theme_color; ?>!important;
		}
		
		#breadcrumb:after,
		#page-top a{	
			background-color: <?php echo $theme_footer_bg_color; ?>;
		}
		<?php if( jin_footer_type() == "footer_type1" ) : ?>
		footer{
			background-color: <?php echo $theme_footer_bg_color; ?>;
		}
		.footer-inner a,
		#copyright,
		#copyright-center{
			border-color: <?php echo $theme_footer_text_color; ?>!important;
			color: <?php echo $theme_footer_text_color; ?>!important;
		}
		#footer-widget-area
		{
			border-color: <?php echo $theme_footer_text_color; ?>!important;
		}
		<?php else: ?>
		#footer-widget-area{
			background-color: <?php echo $theme_footer_bg_color; ?>;
			border: none!important;
		}
		.footer-inner a
		#copyright,
		#copyright-center{
			border-color: taransparent!important;
			color: <?php echo $theme_text_color; ?>!important;
		}
		<?php endif; ?>
		.page-top-footer a{
			color: <?php echo $theme_footer_bg_color; ?>!important;
		}
		<?php if( ! is_mobile()) :?>
		#breadcrumb ul li,
		#breadcrumb ul li a{
			color: <?php echo $theme_footer_bg_color; ?>!important;
		}
		<?php endif; ?>

		body,
		a,
		a:link,
		a:visited,
		.my-profile,
		.widgettitle,
		.tabBtn-mag label{
			color: <?php echo $theme_text_color; ?>;
		}
		a:hover{
			color: <?php echo $theme_link_hover_color; ?>;
		}
		<?php if( is_mobile() ) :?>
		.footer-menu-sp .current-menu-item a:before{
			background-color: <?php echo $theme_color; ?>;
		}
		.footer-menu-sp .current-menu-item a{
			color:<?php echo $theme_color; ?>;
		}
		.sp-sidemenu-menu a span{
			background-color: <?php echo $theme_color; ?>;
		}
		.sp-sidemenu-btn{
			background-color: <?php echo $theme_accent_color; ?>!important;
		}
		<?php endif; ?>
		<?php if( is_mobile() ) :?>
		<?php if( has_nav_menu('sp-footer-menu') && has_nav_menu('sp-sidemenu') ) : ?>
		.sp-sidemenu-wrapper{
			bottom: 70px;
		}
		.sp-sidemenu-bg{
			bottom: 90px;
		}
		.sp-sidemenu-menu{
			bottom: 80px;
		}
		.sp-sidemenu-search{
			bottom: 360px;
		}
		#page-top{
			bottom: 133px;
		}
		<?php elseif( has_nav_menu('sp-footer-menu') && ! has_nav_menu('sp-sidemenu') ): ?>
		#page-top{
			bottom: 75px;
		}
		<?php elseif( ! has_nav_menu('sp-footer-menu') && has_nav_menu('sp-sidemenu') ): ?>
		#page-top{
			bottom: 123px;
		}
		<?php elseif( ! has_nav_menu('sp-footer-menu') && ! has_nav_menu('sp-sidemenu') ): ?>
		#page-top{
			bottom: 25px;
		}
		<?php endif; ?>
		<?php endif; ?>
		.widget_nav_menu ul > li > a:before,
		.widget_categories ul > li > a:before,
		.widget_pages ul > li > a:before,
		.widget_recent_entries ul > li > a:before,
		.widget_archive ul > li > a:before,
		.widget_archive form:after,
		.widget_categories form:after,
		.widget_nav_menu ul > li > ul.sub-menu > li > a:before,
		.widget_categories ul > li > .children > li > a:before,
		.widget_pages ul > li > .children > li > a:before,
		.widget_nav_menu ul > li > ul.sub-menu > li > ul.sub-menu li > a:before,
		.widget_categories ul > li > .children > li > .children li > a:before,
		.widget_pages ul > li > .children > li > .children li > a:before{
			color: <?php echo $theme_color; ?>;
		}
		.widget_nav_menu ul .sub-menu .sub-menu li a:before{
			background-color: <?php echo $theme_text_color; ?>!important;
		}
		footer .footer-widget,
		footer .footer-widget a,
		footer .footer-widget ul li,
		.footer-widget.widget_nav_menu ul > li > a:before,
		.footer-widget.widget_categories ul > li > a:before,
		.footer-widget.widget_recent_entries ul > li > a:before,
		.footer-widget.widget_pages ul > li > a:before,
		.footer-widget.widget_archive ul > li > a:before,
		footer .widget_tag_cloud .tagcloud a:before{
			color: <?php echo $theme_footer_text_color; ?>!important;
			border-color: <?php echo $theme_footer_text_color; ?>!important;
		}
		footer .footer-widget .widgettitle{
			color: <?php echo $theme_footer_text_color; ?>!important;
			border-color: <?php echo $theme_accent_color; ?>!important;
		}
		footer .widget_nav_menu ul .children .children li a:before,
		footer .widget_categories ul .children .children li a:before,
		footer .widget_nav_menu ul .sub-menu .sub-menu li a:before{
			background-color: <?php echo $theme_footer_text_color; ?>!important;
		}
		#drawernav a:hover,
		.post-list-title,
		#prev-next p,
		#toc_container .toc_list li a{
			color: <?php echo $theme_text_color; ?>!important;
		}
		
		#header-box{
			background-color: <?php echo $theme_header_bg_color; ?>;
		}
		<?php if( is_header_design() == 'header_style10' || is_header_design() == 'header_style11' ): ?>
		#header-box .header-box10-bg:before,
		#header-box .header-box11-bg:before{
			background-color: <?php echo $theme_header_bg_color; ?>!important;
			
		}
		<?php endif; ?>
		<?php if( get_theme_mod( 'cps_info_text') == "" ): ?>
		@media (min-width: 768px) {
		#header-box .header-box10-bg:before,
		#header-box .header-box11-bg:before{
			border-radius: 2px;
		}
		}
		<?php endif; ?>
		<?php if( is_header_design() == 'header_style10' && is_top_image_child() == "child_none" ): ?>
		<?php if( ! is_home() && ! is_front_page() ): ?>
		@media (min-width: 768px) {
		#header-box.header-style10{
			position: relative!important;
		}
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( is_header_design() == 'header_style10') :?>
		@media (min-width: 768px) and (max-width: 1199px) {
		#header-box.header-style10{
			position: relative!important;
		}
		}
		<?php endif; ?>
		<?php if( is_mobile() ) :?>
		.top-image-meta{
			margin-top: <?php echo is_top_image_meta_ctrl_sp(); ?> ;
		}
		<?php else: ?>
		@media (min-width: 768px) {
			.top-image-meta{
				margin-top: calc(<?php echo is_top_image_meta_ctrl(); ?> - 30px);
			}
		}
		@media (min-width: 1200px) {
			.top-image-meta{
				margin-top: calc(<?php echo is_top_image_meta_ctrl(); ?>);
			}
		}
		<?php endif; ?>
		.pickup-contents:before{
			background-color: <?php echo $theme_header_bg_color; ?>!important;
		}
		
		.main-image-text{
			color: <?php echo $top_image_text_color; ?>;
		}
		.main-image-text-sub{
			color: <?php echo $top_image_subtext_color; ?>;
		}
		
		<?php if( is_mobile() ): ?>
		#header-box.sp-fix ~ #scroll-content{
			position: relative!important;
  			padding-top: 40px!important; /* 打ち消し用のパディング */
		}
		#header-box.sp-fix ~ #scroll-content #sp-footer-box{
			position: fixed!important;
		}
		<?php endif; ?>
		@media (min-width: 481px) {
			#site-info{
				padding-top: <?php echo $theme_topnavi_logotext_pad; ?>px!important;
				padding-bottom: <?php echo $theme_topnavi_logotext_pad; ?>px!important;
			}
		}
		
		#site-info span a{
			color: <?php echo $theme_header_text_color; ?>!important;
		}
		
		<?php if( is_header_design() == 'header_style6' || is_header_design() == 'header_style7' || is_header_design() == 'header_style8' || is_header_design() == 'header_style9' ): ?>
		#headmenu .headsns .line a svg{
			fill: <?php echo $theme_header_sns_color; ?>!important;
		}
		#headmenu .headsns a,
		#headmenu{
			color: <?php echo $theme_header_sns_color; ?>!important;
			border-color:<?php echo $theme_header_sns_color; ?>!important;
		}
		<?php else: ?>
		#headmenu .headsns .line a svg{
			fill: <?php echo $theme_header_sns_color; ?>!important;
		}
		#headmenu .headsns a,
		#headmenu{
			color: <?php echo $theme_header_sns_color; ?>!important;
			border-color:<?php echo $theme_header_sns_color; ?>!important;
		}
		<?php endif; ?>
		<?php if( is_mobile() ): ?>
		.headsearch,
		#headmenu{
			color: <?php echo $theme_header_text_color; ?>!important;
		}
		<?php endif; ?>
		.profile-follow .line-sns a svg{
			fill: <?php echo $theme_color; ?>!important;
		}
		.profile-follow .line-sns a:hover svg{
			fill: <?php echo $theme_accent_color; ?>!important;
		}
		.profile-follow a{
			color: <?php echo $theme_color; ?>!important;
			border-color:<?php echo $theme_color; ?>!important;
		}
		.profile-follow a:hover,
		#headmenu .headsns a:hover{
			color:<?php echo $theme_accent_color; ?>!important;
			border-color:<?php echo $theme_accent_color; ?>!important;
		}
		<?php if( ! is_mobile() ): ?>
		.search-box:hover{
			color:<?php echo $theme_accent_color; ?>!important;
			border-color:<?php echo $theme_accent_color; ?>!important;
		}
		<?php endif; ?>
		#header #headmenu .headsns .line a:hover svg{
			fill:<?php echo $theme_accent_color; ?>!important;
		}
		.cps-icon-bar,
		#navtoggle:checked + .sp-menu-open .cps-icon-bar{
			background-color: <?php echo $theme_header_text_color; ?>;
		}
		#nav-container{
			background-color: <?php echo $theme_menu_bg_color; ?>;
		}
		.menu-box .menu-item svg{
			fill:<?php echo $theme_menu_color; ?>;
		}
		#drawernav ul.menu-box > li > a,
		#drawernav2 ul.menu-box > li > a,
		#drawernav3 ul.menu-box > li > a,
		#drawernav4 ul.menu-box > li > a,
		#drawernav5 ul.menu-box > li > a,
		#drawernav ul.menu-box > li.menu-item-has-children:after,
		#drawernav2 ul.menu-box > li.menu-item-has-children:after,
		#drawernav3 ul.menu-box > li.menu-item-has-children:after,
		#drawernav4 ul.menu-box > li.menu-item-has-children:after,
		#drawernav5 ul.menu-box > li.menu-item-has-children:after{
			color: <?php echo $theme_menu_color; ?>!important;
		}
		#drawernav ul.menu-box li a,
		#drawernav2 ul.menu-box li a,
		#drawernav3 ul.menu-box li a,
		#drawernav4 ul.menu-box li a,
		#drawernav5 ul.menu-box li a{
			font-size: <?php echo $theme_glonavi_font_size; ?>!important;
		}
		#drawernav3 ul.menu-box > li{
			color: <?php echo $theme_text_color; ?>!important;
		}
		#drawernav4 .menu-box > .menu-item > a:after,
		#drawernav3 .menu-box > .menu-item > a:after,
		#drawernav .menu-box > .menu-item > a:after{
			background-color: <?php echo $theme_menu_color; ?>!important;
		}
		#drawernav2 .menu-box > .menu-item:hover,
		#drawernav5 .menu-box > .menu-item:hover{
			border-top-color: <?php echo $theme_color; ?>!important;
		}
		<?php if( is_mobile() ): ?>
		ul.menu-box li a:before{
			color: <?php echo $theme_accent_color; ?>!important;
		}
		.cps-sp-menu-bar{
			background-color: <?php echo $sp_slide_menu_bg_color; ?>!important;
		}
		.cps-sp-menu-bar ul li a{
			color: <?php echo $sp_slide_menu_text_color; ?>!important;
		}
		.cps-sp-menu-bar ul .current-menu-item a{
			border-color: <?php echo $sp_slide_menu_text_color; ?>!important;
		}
		<?php endif; ?>
		.cps-info-bar a{
			background-color: <?php echo $cps_info_bg_color; ?>!important;
		}
		<?php if( is_toppage_style() == "one_column" ) : ?>
		@media (min-width: 768px) {
			#main-contents-one .post-list-mag .post-list-item{
				width: 32%;
			}
			#main-contents-one .post-list-mag .post-list-item:not(:nth-child(3n)){
				margin-right: 2%;
			}
			.tabBtn-mag{
				width: 85%;
				margin-bottom: 40px;
			}
			.tabBtn-mag label{
				padding: 10px 20px;
			}
		}
		<?php else: ?>
		@media (min-width: 768px) {
			.post-list-mag .post-list-item:not(:nth-child(2n)){
				margin-right: 2.6%;
			}
		}
		<?php endif; ?>
		@media (min-width: 768px) {
			#tab-1:checked ~ .tabBtn-mag li [for="tab-1"]:after,
			#tab-2:checked ~ .tabBtn-mag li [for="tab-2"]:after,
			#tab-3:checked ~ .tabBtn-mag li [for="tab-3"]:after,
			#tab-4:checked ~ .tabBtn-mag li [for="tab-4"]:after{
				border-top-color: <?php echo $theme_color; ?>!important;
			}
			.tabBtn-mag label{
				border-bottom-color: <?php echo $theme_color; ?>!important;
			}
		}
		#tab-1:checked ~ .tabBtn-mag li [for="tab-1"],
		#tab-2:checked ~ .tabBtn-mag li [for="tab-2"],
		#tab-3:checked ~ .tabBtn-mag li [for="tab-3"],
		#tab-4:checked ~ .tabBtn-mag li [for="tab-4"],
		#prev-next a.next:after,
		#prev-next a.prev:after,
		.more-cat-button a:hover span:before{
			background-color: <?php echo $theme_color; ?>!important;
		}
		

		.swiper-slide .post-list-cat,
		.post-list-mag .post-list-cat,
		.post-list-mag3col .post-list-cat,
		.post-list-mag-sp1col .post-list-cat,
		.swiper-pagination-bullet-active,
		.pickup-cat,
		.post-list .post-list-cat,
		#breadcrumb .bcHome a:hover span:before,
		.popular-item:nth-child(1) .pop-num,
		.popular-item:nth-child(2) .pop-num,
		.popular-item:nth-child(3) .pop-num{
			background-color: <?php echo $theme_accent_color; ?>!important;
		}
		.sidebar-btn a,
		.profile-sns-menu{
			background-color: <?php echo $theme_accent_color; ?>!important;
		}
		.sp-sns-menu a,
		.pickup-contents-box a:hover .pickup-title{
			border-color: <?php echo $theme_color; ?>!important;
			color: <?php echo $theme_color; ?>!important;
		}
		<?php if( is_pickup_style() == "menu-style-notext" ) : ?>
		.pickup-image:after{
			display: none;
		}
		<?php endif; ?>
		.pro-line svg{
			fill: <?php echo $theme_color; ?>!important;
		}
		.cps-post-cat a,
		.meta-cat,
		.popular-cat{
			background-color: <?php echo $theme_accent_color; ?>!important;
			border-color: <?php echo $theme_accent_color; ?>!important;
		}
		.tagicon,
		.tag-box a,
		#toc_container .toc_list > li,
		#toc_container .toc_title{
			color: <?php echo $theme_color; ?>!important;
		}
		.widget_tag_cloud a::before{
			color: <?php echo $theme_text_color; ?>!important;
		}
		.tag-box a,
		#toc_container:before{
			border-color: <?php echo $theme_color; ?>!important;
		}
		.cps-post-cat a:hover{
			color: <?php echo $theme_link_hover_color; ?>!important;
		}
		.pagination li:not([class*="current"]) a:hover,
		.widget_tag_cloud a:hover{
			background-color: <?php echo $theme_color; ?>!important;
		}
		.pagination li:not([class*="current"]) a:hover{
			opacity: 0.5!important;
		}
		.pagination li.current a{
			background-color: <?php echo $theme_color; ?>!important;
			border-color: <?php echo $theme_color; ?>!important;
		}
		.nextpage a:hover span {
			color: <?php echo $theme_color; ?>!important;
			border-color: <?php echo $theme_color; ?>!important;
		}
		.cta-content:before{
			background-color: <?php echo $theme_cta_bgcolor; ?>!important;
		}
		.cta-text,
		.info-title{
			color: <?php echo $theme_cta_color; ?>!important;
		}
		#footer-widget-area.footer_style1 .widgettitle{
			border-color: <?php echo $theme_accent_color; ?>!important;
		}
		.sidebar_style1 .widgettitle,
		.sidebar_style5 .widgettitle{
			border-color: <?php echo $theme_color; ?>!important;
		}
		.sidebar_style2 .widgettitle,
		.sidebar_style4 .widgettitle,
		.sidebar_style6 .widgettitle,
		#home-bottom-widget .widgettitle,
		#home-top-widget .widgettitle,
		#post-bottom-widget .widgettitle,
		#post-top-widget .widgettitle{
			background-color: <?php echo $theme_color; ?>!important;
		}
		#home-bottom-widget .widget_search .search-box input[type="submit"],
		#home-top-widget .widget_search .search-box input[type="submit"],
		#post-bottom-widget .widget_search .search-box input[type="submit"],
		#post-top-widget .widget_search .search-box input[type="submit"]{
			background-color: <?php echo $theme_accent_color; ?>!important;
		}
		
		.tn-logo-size{
			font-size: <?php echo $theme_topnavi_logotext_size; ?>%!important;
		}
		@media (min-width: 481px) {
		.tn-logo-size img{
			width: calc(<?php echo $theme_topnavi_logotext_size; ?>%*0.5)!important;
		}
		}
		@media (min-width: 768px) {
		.tn-logo-size img{
			width: calc(<?php echo $theme_topnavi_logotext_size; ?>%*2.2)!important;
		}
		}
		@media (min-width: 1200px) {
		.tn-logo-size img{
			width: <?php echo $theme_topnavi_logotext_size; ?>%!important;
		}
		}
		.sp-logo-size{
			font-size: <?php echo $theme_sp_logotext_size; ?>%!important;
		}
		.sp-logo-size img{
			width: <?php echo $theme_sp_logotext_size; ?>%!important;
		}
		<?php if( is_related_title() == "" ) :?>
		.related-entry-section{
			margin-top: 30px!important;
		}
		<?php endif; ?>
		.cps-post-main ul > li:before,
		.cps-post-main ol > li:before{
			background-color: <?php echo $theme_accent_color; ?>!important;
		}
		.profile-card .profile-title{
			background-color: <?php echo $theme_color; ?>!important;
		}
		.profile-card{
			border-color: <?php echo $theme_color; ?>!important;
		}
		.cps-post-main a{
			color:<?php echo $theme_link_color; ?>;
		}
		.cps-post-main .marker{
			background: -webkit-linear-gradient( transparent <?php echo $theme_marker_type ?>%, <?php echo $theme_marker_color ?> 0% ) ;
			background: linear-gradient( transparent <?php echo $theme_marker_type ?>%, <?php echo $theme_marker_color; ?> 0% ) ;
		}
		.cps-post-main .marker2{
			background: -webkit-linear-gradient( transparent <?php echo $theme_marker2_type; ?>%, <?php echo $theme_marker_color2; ?> 0% ) ;
			background: linear-gradient( transparent <?php echo $theme_marker2_type ?>%, <?php echo $theme_marker_color2; ?> 0% ) ;
		}
		.cps-post-main .jic-sc{
			color:<?php echo $theme_post_icon_color; ?>;
		}
		
		
		.simple-box1{
			border-color:<?php echo $simple_box1_c; ?>!important;
		}
		.simple-box2{
			border-color:<?php echo $simple_box2_c; ?>!important;
		}
		.simple-box3{
			border-color:<?php echo $simple_box3_c; ?>!important;
		}
		.simple-box4{
			border-color:<?php echo $simple_box4_c; ?>!important;
		}
		.simple-box4:before{
			background-color: <?php echo $simple_box4_c; ?>;
		}
		.simple-box5{
			border-color:<?php echo $simple_box5_c; ?>!important;
		}
		.simple-box5:before{
			background-color: <?php echo $simple_box5_c; ?>;
		}
		.simple-box6{
			background-color:<?php echo $simple_box6_c; ?>!important;
		}
		.simple-box7{
			border-color:<?php echo $simple_box7_c; ?>!important;
		}
		.simple-box7:before{
			background-color:<?php echo $simple_box7_c; ?>!important;
		}
		.simple-box8{
			border-color:<?php echo $simple_box8_c; ?>!important;
		}
		.simple-box8:before{
			background-color:<?php echo $simple_box8_c; ?>!important;
		}
		.simple-box9:before{
			background-color:<?php echo $simple_box9_c; ?>!important;
		}
		<?php if( is_article_design() == "article_style2" ) : ?>
		.simple-box9:after{
			border-color:<?php echo $simple_box9_c; ?> <?php echo $simple_box9_c; ?> <?php echo $theme_bg_color; ?> <?php echo $theme_bg_color; ?>!important;
		}
		<?php else: ?>
		.simple-box9:after{
			border-color:<?php echo $simple_box9_c; ?> <?php echo $simple_box9_c; ?> #fff #fff!important;
		}
		<?php endif; ?>
		
		.kaisetsu-box1:before,
		.kaisetsu-box1-title{
			background-color:<?php echo $kaisetsu_box1_c; ?>!important;
		}
		.kaisetsu-box2{
			border-color:<?php echo $kaisetsu_box2_c; ?>!important;
		}
		.kaisetsu-box2-title{
			background-color:<?php echo $kaisetsu_box2_c; ?>!important;
		}
		.kaisetsu-box4{
			border-color:<?php echo $kaisetsu_box4_c; ?>!important;
		}
		.kaisetsu-box4-title{
			background-color:<?php echo $kaisetsu_box4_c; ?>!important;
		}
		.kaisetsu-box5:before{
			background-color:<?php echo $kaisetsu_box5_c; ?>!important;
		}
		.kaisetsu-box5-title{
			background-color:<?php echo $kaisetsu_box5_c; ?>!important;
		}
		
		.concept-box1{
			border-color:<?php echo $concept_box1_c; ?>!important;
		}
		.concept-box1:after{
			background-color:<?php echo $concept_box1_c; ?>!important;
		}
		.concept-box1:before{
			content:"<?php echo $concept_box1_text; ?>"!important;
			color:<?php echo $concept_box1_c; ?>!important;
		}
		.concept-box2{
			border-color:<?php echo $concept_box2_c; ?>!important;
		}
		.concept-box2:after{
			background-color:<?php echo $concept_box2_c; ?>!important;
		}
		.concept-box2:before{
			content:"<?php echo $concept_box2_text; ?>"!important;
			color:<?php echo $concept_box2_c; ?>!important;
		}
		.concept-box3{
			border-color:<?php echo $concept_box3_c; ?>!important;
		}
		.concept-box3:after{
			background-color:<?php echo $concept_box3_c; ?>!important;
		}
		.concept-box3:before{
			content:"<?php echo $concept_box3_text; ?>"!important;
			color:<?php echo $concept_box3_c; ?>!important;
		}
		.concept-box4{
			border-color:<?php echo $concept_box4_c; ?>!important;
		}
		.concept-box4:after{
			background-color:<?php echo $concept_box4_c; ?>!important;
		}
		.concept-box4:before{
			content:"<?php echo $concept_box4_text; ?>"!important;
			color:<?php echo $concept_box4_c; ?>!important;
		}
		.concept-box5{
			border-color:<?php echo $concept_box5_c; ?>!important;
		}
		.concept-box5:after{
			background-color:<?php echo $concept_box5_c; ?>!important;
		}
		.concept-box5:before{
			content:"<?php echo $concept_box5_text; ?>"!important;
			color:<?php echo $concept_box5_c; ?>!important;
		}
		.concept-box6{
			border-color:<?php echo $concept_box6_c; ?>!important;
		}
		.concept-box6:after{
			background-color:<?php echo $concept_box6_c; ?>!important;
		}
		.concept-box6:before{
			content:"<?php echo $concept_box6_text; ?>"!important;
			color:<?php echo $concept_box6_c; ?>!important;
		}
		
		.innerlink-box1,
		.blog-card{
			border-color:<?php echo $innerlink_box1_c; ?>!important;
		}
		.innerlink-box1-title{
			background-color:<?php echo $innerlink_box1_c; ?>!important;
			border-color:<?php echo $innerlink_box1_c; ?>!important;
		}
		.innerlink-box1:before,
		.blog-card-hl-box{
			background-color:<?php echo $innerlink_box1_c; ?>!important;
		}
		<?php if( is_article_design() == "article_style2" ) : ?>
		.concept-box1:before,
		.concept-box2:before,
		.concept-box3:before,
		.concept-box4:before,
		.concept-box5:before,
		.concept-box6:before{
			background-color: <?php echo $theme_bg_color; ?>;
			background-image: url(<?php echo $theme_bg_image; ?>);
		}
		.concept-box1:after,
		.concept-box2:after,
		.concept-box3:after,
		.concept-box4:after,
		.concept-box5:after,
		.concept-box6:after{
			border-color: <?php echo $theme_bg_color; ?>;
			border-image: url(<?php echo $theme_bg_image; ?>) 27 23 / 50px 30px / 1rem round space0 / 5px 5px;
		}
		<?php endif; ?>
		
		.jin-ac-box01-title::after{
			color: <?php echo $theme_color; ?>;
		}
		
		.color-button01 a,
		.color-button01 a:hover,
		.color-button01:before{
			background-color: <?php echo $theme_ctm_btn_color01; ?>!important;
		}
		.top-image-btn-color a,
		.top-image-btn-color a:hover,
		.top-image-btn-color:before{
			background-color: <?php echo $top_image_btn_color; ?>!important;
		}
		.color-button02 a,
		.color-button02 a:hover,
		.color-button02:before{
			background-color: <?php echo $theme_ctm_btn_color02; ?>!important;
		}
		
		.color-button01-big a,
		.color-button01-big a:hover,
		.color-button01-big:before{
			background-color: <?php echo $theme_ctm_btn_custom; ?>!important;
		}
		.color-button01-big a,
		.color-button01-big:before{
			border-radius: <?php echo $theme_custom_btn_r; ?>px!important;
		}
		.color-button01-big a{
			padding-top: <?php echo $theme_big_btn_h_size; ?>!important;
			padding-bottom: <?php echo $theme_big_btn_h_size; ?>!important;
		}
		
		.color-button02-big a,
		.color-button02-big a:hover,
		.color-button02-big:before{
			background-color: <?php echo $theme_ctm_btn_custom2; ?>!important;
		}
		.color-button02-big a,
		.color-button02-big:before{
			border-radius: <?php echo $theme_custom_btn_r2; ?>px!important;
		}
		.color-button02-big a{
			padding-top: <?php echo $theme_big_btn_h_size2; ?>!important;
			padding-bottom: <?php echo $theme_big_btn_h_size2; ?>!important;
		}
		<?php if( ! is_mobile() ): ?>
		.color-button01-big{
			width: <?php echo $theme_big_btn_w_size; ?>!important;
		}
		.color-button02-big{
			width: <?php echo $theme_big_btn_w_size2; ?>!important;
		}
		<?php endif; ?>
		
		
		<?php if( is_button_style() == 'btn-style01' ): ?>
			.top-image-btn-color:before,
			.color-button01:before,
			.color-button02:before,
			.color-button01-big:before,
			.color-button02-big:before{
				bottom: -1px;
				left: -1px;
				width: 100%;
				height: 100%;
				border-radius: 6px;
				box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, 0.25);
				-webkit-transition: all .4s;
				transition: all .4s;
			}
			.top-image-btn-color a:hover,
			.color-button01 a:hover,
			.color-button02 a:hover,
			.color-button01-big a:hover,
			.color-button02-big a:hover{
				-webkit-transform: translateY(2px);
				transform: translateY(2px);
				-webkit-filter: brightness(0.95);
				 filter: brightness(0.95);
			}
			.top-image-btn-color:hover:before,
			.color-button01:hover:before,
			.color-button02:hover:before,
			.color-button01-big:hover:before,
			.color-button02-big:hover:before{
				-webkit-transform: translateY(2px);
				transform: translateY(2px);
				box-shadow: none!important;
			}
		<?php elseif( is_button_style() == 'btn-style02' ): ?>
			.top-image-btn-color:before,
			.wide-layout ul li .color-button01:before,
			.wide-layout ul li .color-button02:before,
			.color-button01:before,
			.color-button02:before,
			.color-button01-big:before,
			.color-button02-big:before{
				display: none;
			}
			.top-image-btn-color a:hover,
			.color-button01 a:hover,
			.color-button02 a:hover,
			.color-button01-big a:hover,
			.color-button02-big a:hover{
				-webkit-transform: translateY(2px);
				transform: translateY(2px);
				-webkit-filter: brightness(1.05);
			 	filter: brightness(1.05);
				opacity: 1;
			}
		<?php elseif( is_button_style() == 'btn-style03' ): ?>
			.top-image-btn-color a:hover,
			.color-button01 a:hover,
			.color-button02 a:hover,
			.color-button01-big a:hover,
			.color-button02-big a:hover{
				opacity: 1;
			}
		<?php endif; ?>
		
		.h2-style01 h2,
		.h2-style02 h2:before,
		.h2-style03 h2,
		.h2-style04 h2:before,
		.h2-style05 h2,
		.h2-style07 h2:before,
		.h2-style07 h2:after,
		.h3-style03 h3:before,
		.h3-style02 h3:before,
		.h3-style05 h3:before,
		.h3-style07 h3:before,
		.h2-style08 h2:after,
		.h2-style10 h2:before,
		.h2-style10 h2:after,
		.h3-style02 h3:after,
		.h4-style02 h4:before{
			background-color: <?php echo $theme_color ?>!important;
		}
		.h3-style01 h3,
		.h3-style04 h3,
		.h3-style05 h3,
		.h3-style06 h3,
		.h4-style01 h4,
		.h2-style02 h2,
		.h2-style08 h2,
		.h2-style08 h2:before,
		.h2-style09 h2,
		.h4-style03 h4{
			border-color: <?php echo $theme_color ?>!important;
		}
		.h2-style05 h2:before{
			border-top-color: <?php echo $theme_color ?>!important;
		}
		.h2-style06 h2:before,
		.sidebar_style3 .widgettitle:after{
			background-image: linear-gradient(
				-45deg,
				transparent 25%,
				<?php echo $theme_color ?> 25%,
				<?php echo $theme_color ?> 50%,
				transparent 50%,
				transparent 75%,
				<?php echo $theme_color ?> 75%,
				<?php echo $theme_color ?>
			);
		}
		<?php if( get_option( 'hl_custom_check' ) ): ?>
		<?php is_hl_custom(); ?>
		<?php endif; ?>
		.jin-h2-icons.h2-style02 h2 .jic:before,
		.jin-h2-icons.h2-style04 h2 .jic:before,
		.jin-h2-icons.h2-style06 h2 .jic:before,
		.jin-h2-icons.h2-style07 h2 .jic:before,
		.jin-h2-icons.h2-style08 h2 .jic:before,
		.jin-h2-icons.h2-style09 h2 .jic:before,
		.jin-h2-icons.h2-style10 h2 .jic:before,
		.jin-h3-icons.h3-style01 h3 .jic:before,
		.jin-h3-icons.h3-style02 h3 .jic:before,
		.jin-h3-icons.h3-style03 h3 .jic:before,
		.jin-h3-icons.h3-style04 h3 .jic:before,
		.jin-h3-icons.h3-style05 h3 .jic:before,
		.jin-h3-icons.h3-style06 h3 .jic:before,
		.jin-h3-icons.h3-style07 h3 .jic:before,
		.jin-h4-icons.h4-style01 h4 .jic:before,
		.jin-h4-icons.h4-style02 h4 .jic:before,
		.jin-h4-icons.h4-style03 h4 .jic:before,
		.jin-h4-icons.h4-style04 h4 .jic:before{
			color:<?php echo $theme_color ?>;
		}
		
		@media all and (-ms-high-contrast:none){
			*::-ms-backdrop, .color-button01:before,
			.color-button02:before,
			.color-button01-big:before,
			.color-button02-big:before{
				background-color: #595857!important;
			}
		}
		
		.jin-lp-h2 h2,
		.jin-lp-h2 h2{
			background-color: transparent!important;
			border-color: transparent!important;
			color: <?php echo $theme_text_color; ?>!important;
		}
		.jincolumn-h3style2{
			border-color:<?php echo $theme_color; ?>!important;
		}
		.jinlph2-style1 h2:first-letter{
			color:<?php echo $theme_color; ?>!important;
		}
		.jinlph2-style2 h2,
		.jinlph2-style3 h2{
			border-color:<?php echo $theme_color; ?>!important;
		}
		.jin-photo-title .jin-fusen1-down,
		.jin-photo-title .jin-fusen1-even,
		.jin-photo-title .jin-fusen1-up{
			border-left-color:<?php echo $theme_color; ?>;
		}
		.jin-photo-title .jin-fusen2,
		.jin-photo-title .jin-fusen3{
			background-color:<?php echo $theme_color; ?>;
		}
		.jin-photo-title .jin-fusen2:before,
		.jin-photo-title .jin-fusen3:before {
			border-top-color: <?php echo $theme_color; ?>;
		}
		.has-huge-font-size{
			font-size:42px!important;
		}
		.has-large-font-size{
			font-size:36px!important;
		}
		.has-medium-font-size{
			font-size:20px!important;
		}
		.has-normal-font-size{
			font-size:16px!important;
		}
		.has-small-font-size{
			font-size:13px!important;
		}
		
		
	</style>
<?php
}
add_action( 'wp_head', 'cps_theme_customize_css');




//ビジュアルエディター内でカスタマイザー反映

add_filter('tiny_mce_before_init','wpdocs_theme_editor_dynamic_styles');
function wpdocs_theme_editor_dynamic_styles( $mceInit ) {
	$theme_color = get_theme_mod( 'theme_color', '#3b4675');
	$theme_accent_color = get_theme_mod( 'theme_accent_color', '#ffcd44');
	$theme_link_hover_color = get_theme_mod( 'theme_link_hover_color', '#008db7');
	$theme_link_color = get_theme_mod( 'theme_link_color', '#008db7');
	$theme_text_color = get_theme_mod( 'theme_text_color', '#3b4675');
	$theme_marker_color = get_theme_mod( 'theme_marker_color', '#ffcedb');
	$theme_marker_color2 = get_theme_mod( 'theme_marker_color2', '#a9eaf2');
	$theme_marker_type = get_theme_mod( 'theme_marker_type', '60');
	$theme_marker2_type = get_theme_mod( 'theme_marker2_type', '60');
	$theme_ctm_btn_color01 = get_theme_mod( 'theme_ctm_btn_color01', '#008db7');
	$theme_ctm_btn_color02 = get_theme_mod( 'theme_ctm_btn_color02', '#d9333f');
	$box_border_color = get_theme_mod( 'box_border_color', '#d9333f');
	$theme_custom_btn_r = get_theme_mod( 'theme_custom_btn_r', '5');
	$theme_ctm_btn_custom = get_theme_mod( 'theme_ctm_btn_custom', '#3296d1');
	$theme_custom_btn_r2 = get_theme_mod( 'theme_custom_btn_r2', '5');
	$theme_ctm_btn_custom2 = get_theme_mod( 'theme_ctm_btn_custom2', '#83d159');
	$theme_big_btn_w_size = get_option( 'theme_big_btn_w_size', '75%');
	$theme_big_btn_h_size = get_option( 'theme_big_btn_h_size', '20px');
	$theme_big_btn_w_size2 = get_option( 'theme_big_btn_w_size2', '75%');
	$theme_big_btn_h_size2 = get_option( 'theme_big_btn_h_size2', '20px');
	$theme_button_style = get_theme_mod( 'button_style', 'btn-style01');
	$theme_footer_bg_color = get_theme_mod( 'theme_footer_bg_color', '#3b4675');
	$theme_topnavi_logotext_pad = get_theme_mod( 'topnavi_logotext_pad', '5');
	$theme_glonavi_font_size = get_theme_mod( 'glonavi_font_size', '14px');
	$top_image_btn_color = get_theme_mod( 'top_image_btn_color', '#ffcd44');
	
	$simple_box1_c = get_theme_mod( 'simple_box1_c', '#ef9b9b');
	$simple_box2_c = get_theme_mod( 'simple_box2_c', '#f2bf7d');
	$simple_box3_c = get_theme_mod( 'simple_box3_c', '#b5e28a');
	$simple_box4_c = get_theme_mod( 'simple_box4_c', '#7badd8');
	$simple_box5_c = get_theme_mod( 'simple_box5_c', '#e896c7');
	$simple_box6_c = get_theme_mod( 'simple_box6_c', '#fffdef');
	$simple_box7_c = get_theme_mod( 'simple_box7_c', '#def1f9');
	$simple_box8_c = get_theme_mod( 'simple_box8_c', '#96ddc1');
	$simple_box9_c = get_theme_mod( 'simple_box9_c', '#e1c0e8');
	
	$kaisetsu_box1_c = get_theme_mod( 'kaisetsu_box1_c', '#ffb49e');
	$kaisetsu_box2_c = get_theme_mod( 'kaisetsu_box2_c', '#89c2f4');
	$kaisetsu_box4_c = get_theme_mod( 'kaisetsu_box4_c', '#ea91a9');
	$kaisetsu_box5_c = get_theme_mod( 'kaisetsu_box5_c', '#57b3ba');
	
	$concept_box1_c = get_theme_mod( 'concept_box1_c', '#85db8f');
	$concept_box1_text = get_theme_mod( 'concept_box1_text', 'ポイント');
	$concept_box2_c = get_theme_mod( 'concept_box2_c', '#f7cf6a');
	$concept_box2_text = get_theme_mod( 'concept_box2_text', '注意点');
	$concept_box3_c = get_theme_mod( 'concept_box3_c', '#86cee8');
	$concept_box3_text = get_theme_mod( 'concept_box3_text', '良い例');
	$concept_box4_c = get_theme_mod( 'concept_box4_c', '#ed8989');
	$concept_box4_text = get_theme_mod( 'concept_box4_text', '悪い例');
	$concept_box5_c = get_theme_mod( 'concept_box5_c', '#9e9e9e');
	$concept_box5_text = get_theme_mod( 'concept_box5_text', '参考');
	$concept_box6_c = get_theme_mod( 'concept_box6_c', '#8eaced');
	$concept_box6_text = get_theme_mod( 'concept_box6_text', 'メモ');
	
	$innerlink_box1_c = get_theme_mod( 'innerlink_box1_c', '#73bc9b');
	$font_size_change = get_option('font_size');
	
	

	$list_styles = 'body.mceContentBody ul li:after{ background-color: ' . $theme_accent_color . ' ;}body.mceContentBody ol > li:after, body.mceContentBody .balloon-box ol li:after{ background: ' . $theme_accent_color . ' ;}';
	$link_styles = 'body.mceContentBody a { color: ' . $theme_link_color . ' ;}';
	$marker_styles = 'body.mceContentBody .marker { background: linear-gradient( transparent '.$theme_marker_type.'%, ' . $theme_marker_color . ' 0% ) ;}body.mceContentBody .marker2 { background: linear-gradient( transparent '.$theme_marker2_type.'%, ' . $theme_marker_color2 . ' 0% ) ;}';
	
	$simplebox_styles = 'body.mceContentBody .simple-box1 { border-color: ' . $simple_box1_c . ' ;}body.mceContentBody .simple-box2 { border-color: ' . $simple_box2_c . ' ;}body.mceContentBody .simple-box3 { border-color: ' . $simple_box3_c . ' ;}body.mceContentBody .simple-box4 { border-color: ' . $simple_box4_c . ' ;}body.mceContentBody .simple-box4:before { background-color: ' . $simple_box4_c . ' ;}body.mceContentBody .simple-box5 { border-color: ' . $simple_box5_c . ' ;}body.mceContentBody .simple-box5:before { background-color: ' . $simple_box5_c . ' ;}body.mceContentBody .simple-box6 { background-color: ' . $simple_box6_c . ' ;}body.mceContentBody .simple-box7 { border-color: ' . $simple_box7_c . ' ;}body.mceContentBody .simple-box7:before { background-color: ' . $simple_box7_c . ' ;}body.mceContentBody .simple-box8 { border-color: ' . $simple_box8_c . ' ;}body.mceContentBody .simple-box8:before { background-color: ' . $simple_box8_c . ' ;}body.mceContentBody .simple-box9:after { border-color: ' . $simple_box9_c . ' ' . $simple_box9_c . ' #fff #fff ;}body.mceContentBody .simple-box9:before { background-color: ' . $simple_box9_c . '  ;}';
	
	$kaisetsubox_styles = 'body.mceContentBody .kaisetsu-box1:before, body.mceContentBody .kaisetsu-box1:after { background-color: ' . $kaisetsu_box1_c . ' ;}body.mceContentBody .kaisetsu-box2{ border-color: ' . $kaisetsu_box2_c . ' ;}body.mceContentBody .kaisetsu-box2:after { background-color: ' . $kaisetsu_box2_c . ' ;}body.mceContentBody .kaisetsu-box4{ border-color: ' . $kaisetsu_box4_c . ' ;}body.mceContentBody .kaisetsu-box4:after { background-color: ' . $kaisetsu_box4_c . ' ;}body.mceContentBody .kaisetsu-box5:after,body.mceContentBody .kaisetsu-box5:before { background-color: ' . $kaisetsu_box5_c . ' ;}';
	
	$conceptbox_styles = 'body.mceContentBody .concept-box1{ border-color: ' . $concept_box1_c . ' ;}body.mceContentBody .concept-box1:after { background-color: ' . $concept_box1_c . ' ;}body.mceContentBody .concept-box1:before{content:\"' . $concept_box1_text . '\"!important; color: ' . $concept_box1_c . ' ;}body.mceContentBody .concept-box2{ border-color: ' . $concept_box2_c . ' ;}body.mceContentBody .concept-box2:after { background-color: ' . $concept_box2_c . ' ;}body.mceContentBody .concept-box2:before{content:\"' . $concept_box2_text . '\"!important; color: ' . $concept_box2_c . ' ;}body.mceContentBody .concept-box3{ border-color: ' . $concept_box3_c . ' ;}body.mceContentBody .concept-box3:after { background-color: ' . $concept_box3_c . ' ;}body.mceContentBody .concept-box3:before{content:\"' . $concept_box3_text . '\"!important; color: ' . $concept_box3_c . ' ;}body.mceContentBody .concept-box4{ border-color: ' . $concept_box4_c . ' ;}body.mceContentBody .concept-box4:after { background-color: ' . $concept_box4_c . ' ;}body.mceContentBody .concept-box4:before{content:\"' . $concept_box4_text . '\"!important; color: ' . $concept_box4_c . ' ;}body.mceContentBody .concept-box5{ border-color: ' . $concept_box5_c . ' ;}body.mceContentBody .concept-box5:after { background-color: ' . $concept_box5_c . ' ;}body.mceContentBody .concept-box5:before{content:\"' . $concept_box5_text . '\"!important; color: ' . $concept_box5_c . ' ;}body.mceContentBody .concept-box6{ border-color: ' . $concept_box6_c . ' ;}body.mceContentBody .concept-box6:after { background-color: ' . $concept_box6_c . ' ;}body.mceContentBody .concept-box6:before{content:\"' . $concept_box6_text . '\"!important; color: ' . $concept_box6_c . ' ;}';
	
	$innerlinkbox_styles = 'body.mceContentBody .innerlink-box1{ border-color: ' . $innerlink_box1_c . ' ;}body.mceContentBody .innerlink-box1:after { background-color: ' . $innerlink_box1_c . ' ; border-color: ' . $innerlink_box1_c . ' ;}body.mceContentBody .innerlink-box1:before { background-color: ' . $innerlink_box1_c . ' ;}';
	
	$btn_color_styles = 'body.mceContentBody .color-button01 a, body.mceContentBody .color-button01 a:hover, body.mceContentBody .color-button01:before{ background-color: ' . $theme_ctm_btn_color01 . '!important;}body.mceContentBody .color-button01-big a, body.mceContentBody .color-button01-big a:hover, body.mceContentBody .color-button01-big:before { background-color: ' . $theme_ctm_btn_custom . '!important;}body.mceContentBody .color-button02 a, body.mceContentBody .color-button02 a:hover, body.mceContentBody .color-button02:before{ background-color: ' . $theme_ctm_btn_color02 . '!important;}body.mceContentBody .color-button02-big a, body.mceContentBody .color-button02-big a:hover, body.mceContentBody .color-button02-big:before { background-color: ' . $theme_ctm_btn_custom2 . '!important;}';
	
	$btn_size_styles = 'body.mceContentBody .color-button01-big a{ width: ' . $theme_big_btn_w_size . '; padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important; margin-left:auto;margin-right: auto;}body.mceContentBody .color-button01-big a,body.mceContentBody .color-button01-big:before{ border-radius:'.$theme_custom_btn_r.'px!important; height:100%;}body.mceContentBody .color-button02-big a { width: ' . $theme_big_btn_w_size2 . '; padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;margin-left:auto;margin-right: auto;}body.mceContentBody .color-button02-big a,body.mceContentBody .color-button02-big:before{ border-radius:'.$theme_custom_btn_r2.'px!important; height:100%;}';

	if( is_button_style() == 'btn-style01' ){
		$btn_styles = 'body.mceContentBody .color-button01:before,body.mceContentBody .color-button02:before,body.mceContentBody .color-button01-big:before,body.mceContentBody .color-button02-big:before{ bottom: -1px;left: -1px;width: 100%;height: 100%;border-radius: 6px;box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, 0.25);-webkit-transition: all .4s;transition: all .4s;} body.mceContentBody .color-button01 a:hover,body.mceContentBody .color-button02 a:hover,body.mceContentBody .color-button01-big a:hover,body.mceContentBody .color-button02-big a:hover{-webkit-transform: translateY(2px);transform: translateY(2px);-webkit-filter: brightness(0.95);filter: brightness(0.95); }body.mceContentBody .color-button01:hover:before,body.mceContentBody .color-button02:hover:before,body.mceContentBody .color-button01-big:hover:before,body.mceContentBody .color-button02-big:hover:before{-webkit-transform: translateY(2px);transform: translateY(2px);box-shadow: none!important;}body.mceContentBody .color-button01-big{width: ' . $theme_big_btn_w_size.'; margin-left:auto!important;margin-right: auto!important;}body.mceContentBody .color-button01-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important;}body.mceContentBody .color-button02-big{width: ' . $theme_big_btn_w_size2.'; margin-left:auto!important;margin-right: auto!important;}body.mceContentBody .color-button02-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;}';
	}elseif( is_button_style() == 'btn-style02' ){
		$btn_styles = 'body.mceContentBody .color-button01:before,body.mceContentBody .color-button02:before,body.mceContentBody .color-button01-big:before,body.mceContentBody .color-button02-big:before { display: none;} body.mceContentBody .color-button01 a:hover,body.mceContentBody .color-button02 a:hover,body.mceContentBody .color-button01-big a:hover,body.mceContentBody .color-button02-big a:hover{-webkit-transform: translateY(2px);transform: translateY(2px);-webkit-filter: brightness(1.05);filter: brightness(1.05);}';
	}elseif( is_button_style() == 'btn-style03' ){
		$btn_styles = 'body.mceContentBody .color-button01-big{width: ' . $theme_big_btn_w_size.'; margin-left:auto!important;margin-right: auto!important;}body.mceContentBody .color-button01-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important;}body.mceContentBody .color-button02-big{width: ' . $theme_big_btn_w_size2.'; margin-left:auto!important;margin-right: auto!important;}body.mceContentBody .color-button02-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;}';
	}
	
	$hl_styles = '.h2-style01 h2,.h2-style03 h2,.h2-style08 h2:after,.h2-style04 h2:before,.h2-style02 h2:before,.h2-style05 h2,.h2-style07 h2:before,.h2-style07 h2:after,.h2-style10 h2:after,.h2-style10 h2:before,.h3-style03 h3:before,.h3-style02 h3:before,.h3-style05 h3:before,.h3-style02 h3:after,.h3-style07 h3:before,.h4-style02 h4:before{background-color: '.$theme_color.';}.h3-style01 h3,.h3-style04 h3,.h3-style05 h3,.h3-style06 h3,.h4-style01 h4,.h2-style02 h2,.h4-style03 h4,.h2-style08 h2,.h2-style08 h2:before,.h2-style09 h2{border-color: '.$theme_color.';}.h2-style05 h2:before{border-top-color: '.$theme_color.';}.h2-style06 h2:before{background-image: linear-gradient(-45deg,transparent 25%,'.$theme_color.' 25%,'.$theme_color.' 50%,transparent 50%,transparent 75%,'.$theme_color.' 75%,'.$theme_color.');}';
	
	$etc_styles = 'body.mceContentBody .t-aligncenter{text-align: center;}body.mceContentBody strong{font-weight:600!important;}';
	$color_styles = '.c-red,.c-blue,.c-green{ font-weight: 500; }.c-red{color: #ff2828;}.c-blue{color: #1F65E3;}.c-green{color: #2cb23c;}';



    if ( isset( $mceInit['content_style'] ) ) {
        $mceInit['content_style'] .= ' ' . $list_styles . ' '. $link_styles . ' '. $marker_styles . ' '. $simplebox_styles . ' '. $kaisetsubox_styles . ' '. $conceptbox_styles . ' '. $innerlinkbox_styles . ' '. $btn_color_styles . ' '. $btn_size_styles . ' '. $btn_styles . ' '. $hl_styles . ' '. $etc_styles . ' '.$color_styles .' ';
    } else {
        $mceInit['content_style'] = $list_styles . ' '. $link_styles . ' '. $marker_styles . ' '. $simplebox_styles . ' '. $kaisetsubox_styles . ' '. $conceptbox_styles. ' '.$innerlinkbox_styles . ' '.$btn_color_styles . ' '. $btn_size_styles . ' '. $btn_styles . ' '. $hl_styles . ' '. $etc_styles . ' '.$color_styles .' ';
    }
    return $mceInit;
}


//グーテンベルク内でカスタマイザー反映
function jin_customizer_settings() {
	$theme_color = get_theme_mod( 'theme_color', '#3b4675');
	$theme_accent_color = get_theme_mod( 'theme_accent_color', '#ffcd44');
	$theme_link_hover_color = get_theme_mod( 'theme_link_hover_color', '#008db7');
	$theme_link_color = get_theme_mod( 'theme_link_color', '#008db7');
	$theme_text_color = get_theme_mod( 'theme_text_color', '#3b4675');
	$theme_marker_color = get_theme_mod( 'theme_marker_color', '#ffcedb');
	$theme_marker_color2 = get_theme_mod( 'theme_marker_color2', '#a9eaf2');
	$theme_marker_type = get_theme_mod( 'theme_marker_type', '60');
	$theme_marker2_type = get_theme_mod( 'theme_marker2_type', '60');
	$theme_ctm_btn_color01 = get_theme_mod( 'theme_ctm_btn_color01', '#008db7');
	$theme_ctm_btn_color02 = get_theme_mod( 'theme_ctm_btn_color02', '#d9333f');
	$box_border_color = get_theme_mod( 'box_border_color', '#d9333f');
	$theme_custom_btn_r = get_theme_mod( 'theme_custom_btn_r', '5');
	$theme_ctm_btn_custom = get_theme_mod( 'theme_ctm_btn_custom', '#3296d1');
	$theme_custom_btn_r2 = get_theme_mod( 'theme_custom_btn_r2', '5');
	$theme_ctm_btn_custom2 = get_theme_mod( 'theme_ctm_btn_custom2', '#83d159');
	$theme_big_btn_w_size = get_option( 'theme_big_btn_w_size', '75%');
	$theme_big_btn_h_size = get_option( 'theme_big_btn_h_size', '20px');
	$theme_big_btn_w_size2 = get_option( 'theme_big_btn_w_size2', '75%');
	$theme_big_btn_h_size2 = get_option( 'theme_big_btn_h_size2', '20px');
	$theme_button_style = get_theme_mod( 'button_style', 'btn-style01');
	$theme_footer_bg_color = get_theme_mod( 'theme_footer_bg_color', '#3b4675');
	$theme_topnavi_logotext_pad = get_theme_mod( 'topnavi_logotext_pad', '5');
	$theme_glonavi_font_size = get_theme_mod( 'glonavi_font_size', '14px');
	$top_image_btn_color = get_theme_mod( 'top_image_btn_color', '#ffcd44');
	
	$simple_box1_c = get_theme_mod( 'simple_box1_c', '#ef9b9b');
	$simple_box2_c = get_theme_mod( 'simple_box2_c', '#f2bf7d');
	$simple_box3_c = get_theme_mod( 'simple_box3_c', '#b5e28a');
	$simple_box4_c = get_theme_mod( 'simple_box4_c', '#7badd8');
	$simple_box5_c = get_theme_mod( 'simple_box5_c', '#e896c7');
	$simple_box6_c = get_theme_mod( 'simple_box6_c', '#fffdef');
	$simple_box7_c = get_theme_mod( 'simple_box7_c', '#def1f9');
	$simple_box8_c = get_theme_mod( 'simple_box8_c', '#96ddc1');
	$simple_box9_c = get_theme_mod( 'simple_box9_c', '#e1c0e8');
	
	$kaisetsu_box1_c = get_theme_mod( 'kaisetsu_box1_c', '#ffb49e');
	$kaisetsu_box2_c = get_theme_mod( 'kaisetsu_box2_c', '#89c2f4');
	$kaisetsu_box4_c = get_theme_mod( 'kaisetsu_box4_c', '#ea91a9');
	$kaisetsu_box5_c = get_theme_mod( 'kaisetsu_box5_c', '#57b3ba');
	
	$concept_box1_c = get_theme_mod( 'concept_box1_c', '#85db8f');
	$concept_box1_text = get_theme_mod( 'concept_box1_text', 'ポイント');
	$concept_box2_c = get_theme_mod( 'concept_box2_c', '#f7cf6a');
	$concept_box2_text = get_theme_mod( 'concept_box2_text', '注意点');
	$concept_box3_c = get_theme_mod( 'concept_box3_c', '#86cee8');
	$concept_box3_text = get_theme_mod( 'concept_box3_text', '良い例');
	$concept_box4_c = get_theme_mod( 'concept_box4_c', '#ed8989');
	$concept_box4_text = get_theme_mod( 'concept_box4_text', '悪い例');
	$concept_box5_c = get_theme_mod( 'concept_box5_c', '#9e9e9e');
	$concept_box5_text = get_theme_mod( 'concept_box5_text', '参考');
	$concept_box6_c = get_theme_mod( 'concept_box6_c', '#8eaced');
	$concept_box6_text = get_theme_mod( 'concept_box6_text', 'メモ');
	
	$innerlink_box1_c = get_theme_mod( 'innerlink_box1_c', '#73bc9b');
	$font_size_change = get_option('font_size');
  
	$style  = '';
	
	$style .= '.editor-styles-wrapper ul li:after, .editor-styles-wrapper ol > li:after, .editor-styles-wrapper .balloon-box ol li:after{ background-color: ' .esc_attr( $theme_accent_color ). '!important; }';
	
	$style .= '.editor-styles-wrapper a { color: ' . $theme_link_color . '!important;}';
	
	$style .= '.editor-styles-wrapper .marker{ background: linear-gradient( transparent '.$theme_marker_type.'%, ' . $theme_marker_color . ' 0% ) !important;}.editor-styles-wrapper .marker2{ background: linear-gradient( transparent '.$theme_marker2_type.'%, ' . $theme_marker_color2 . ' 0% ) !important;}button[aria-label="マーカー１"] .dashicons-admin-customizer { background: linear-gradient( transparent '.$theme_marker_type.'%, ' . $theme_marker_color . ' 0% );}button[aria-label="マーカー２"] .dashicons-admin-customizer{ background: linear-gradient( transparent '.$theme_marker2_type.'%, ' . $theme_marker_color2 . ' 0% );}';
	
	$style .= '.editor-styles-wrapper .simple-box1 { border-color: ' . $simple_box1_c . ' !important;}.editor-styles-wrapper .simple-box2 { border-color: ' . $simple_box2_c . ' !important;}.editor-styles-wrapper .simple-box3 { border-color: ' . $simple_box3_c . ' !important;}.editor-styles-wrapper .simple-box4 { border-color: ' . $simple_box4_c . ' !important;}.editor-styles-wrapper .simple-box4:before { background-color: ' . $simple_box4_c . ' !important;}.editor-styles-wrapper .simple-box5 { border-color: ' . $simple_box5_c . ' !important;}.editor-styles-wrapper .simple-box5:before { background-color: ' . $simple_box5_c . ' !important;}.editor-styles-wrapper .simple-box6 { background-color: ' . $simple_box6_c . ' !important;}.editor-styles-wrapper .simple-box7 { border-color: ' . $simple_box7_c . ' !important;}.editor-styles-wrapper .simple-box7:before { background-color: ' . $simple_box7_c . ' !important;}.editor-styles-wrapper .simple-box8 { border-color: ' . $simple_box8_c . ' !important;}.editor-styles-wrapper .simple-box8:before { background-color: ' . $simple_box8_c . ' !important;}b.editor-styles-wrapper .simple-box9:after { border-color: ' . $simple_box9_c . ' ' . $simple_box9_c . ' #fff #fff !important;}.editor-styles-wrapper .simple-box9:before { background-color: ' . $simple_box9_c . '  !important;}';
	
	$style .= '.editor-styles-wrapper .kaisetsu-box1:before, .editor-styles-wrapper .kaisetsu-box1-title{ background-color: ' . $kaisetsu_box1_c . ' !important;}.editor-styles-wrapper .kaisetsu-box2{ border-color: ' . $kaisetsu_box2_c . ' !important;}.editor-styles-wrapper .kaisetsu-box2-title { background-color: ' . $kaisetsu_box2_c . ' !important;}.editor-styles-wrapper .kaisetsu-box4{ border-color: ' . $kaisetsu_box4_c . ' !important;}.editor-styles-wrapper .kaisetsu-box4-title { background-color: ' . $kaisetsu_box4_c . ' !important;}.editor-styles-wrapper .kaisetsu-box5-title,.editor-styles-wrapper .kaisetsu-box5:before { background-color: ' . $kaisetsu_box5_c . ' !important;}';
	
	$style .= '.editor-styles-wrapper .concept-box1{ border-color: ' . $concept_box1_c . ' !important;}.editor-styles-wrapper .concept-box1:after { background-color: ' . $concept_box1_c . ' !important;}.editor-styles-wrapper .concept-box1:before{content:\"' . $concept_box1_text . '\"!important; color: ' . $concept_box1_c . ' !important;}.editor-styles-wrapper .concept-box2{ border-color: ' . $concept_box2_c . ' !important;}.editor-styles-wrapper .concept-box2:after { background-color: ' . $concept_box2_c . ' !important;}.editor-styles-wrapper .concept-box2:before{content:\"' . $concept_box2_text . '\"!important; color: ' . $concept_box2_c . ' !important;}.editor-styles-wrapper .concept-box3{ border-color: ' . $concept_box3_c . ' !important;}.editor-styles-wrapper .concept-box3:after { background-color: ' . $concept_box3_c . ' !important;}.editor-styles-wrapper .concept-box3:before{content:\"' . $concept_box3_text . '\"!important; color: ' . $concept_box3_c . ' !important;}.editor-styles-wrapper .concept-box4{ border-color: ' . $concept_box4_c . ' !important;}.editor-styles-wrapper .concept-box4:after { background-color: ' . $concept_box4_c . ' !important;}.editor-styles-wrapper .concept-box4:before{content:\"' . $concept_box4_text . '\"!important; color: ' . $concept_box4_c . ' !important;}.editor-styles-wrapper .concept-box5{ border-color: ' . $concept_box5_c . ' !important;}.editor-styles-wrapper .concept-box5:after { background-color: ' . $concept_box5_c . ' !important;}.editor-styles-wrapper .concept-box5:before{content:\"' . $concept_box5_text . '\"!important; color: ' . $concept_box5_c . ' !important;}.editor-styles-wrapper .concept-box6{ border-color: ' . $concept_box6_c . ' !important;}.editor-styles-wrapper .concept-box6:after { background-color: ' . $concept_box6_c . ' !important;}.editor-styles-wrapper .concept-box6:before{content:\"' . $concept_box6_text . '\"!important; color: ' . $concept_box6_c . ' !important;}';
	
	$style .= '.editor-styles-wrapper .innerlink-box1, .editor-styles-wrapper .blog-card{ border-color: ' . $innerlink_box1_c . ' !important;}.editor-styles-wrapper .innerlink-box1-title, .editor-styles-wrapper .blog-card-hl-box { background-color: ' . $innerlink_box1_c . ' !important; border-color: ' . $innerlink_box1_c . ' !important;}.editor-styles-wrapper .innerlink-box1:before { background-color: ' . $innerlink_box1_c . ' !important;}';
	
	$style .= '.editor-styles-wrapper .color-button01 a, .editor-styles-wrapper .color-button01 a:hover, .editor-styles-wrapper .color-button01:before{ background-color: ' . $theme_ctm_btn_color01 . '!important;}.editor-styles-wrapper .color-button01-big a, .editor-styles-wrapper .color-button01-big a:hover, .editor-styles-wrapper .color-button01-big:before { background-color: ' . $theme_ctm_btn_custom . '!important;}.editor-styles-wrapper .color-button02 a, .editor-styles-wrapper .color-button02 a:hover, .editor-styles-wrapper .color-button02:before{ background-color: ' . $theme_ctm_btn_color02 . '!important;}.editor-styles-wrapper .color-button02-big a, .editor-styles-wrapper .color-button02-big a:hover, .editor-styles-wrapper .color-button02-big:before { background-color: ' . $theme_ctm_btn_custom2 . '!important;}';
	
	$style .= '.editor-styles-wrapper .color-button01-big a{ width: ' . $theme_big_btn_w_size . '!important; padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important; margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button01-big a,.editor-styles-wrapper .color-button01-big:before{ border-radius:'.$theme_custom_btn_r.'px!important; height:100%!important;}.editor-styles-wrapper .color-button02-big a { width: ' . $theme_big_btn_w_size2 . '!important; padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button02-big a,.editor-styles-wrapper .color-button02-big:before{ border-radius:'.$theme_custom_btn_r2.'px!important; height:100%!important;}';
	
	if( is_button_style() == 'btn-style01' ){
		$style .= '.editor-styles-wrapper .color-button01:before,.editor-styles-wrapper .color-button02:before,.editor-styles-wrapper .color-button01-big:before,.editor-styles-wrapper .color-button02-big:before{ bottom: -1px!important;left: -1px!important;width: 100%!important;height: 100%!important;border-radius: 6px!important;box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, 0.25)!important;-webkit-transition: all .4s;transition: all .4s!important;} .editor-styles-wrapper .color-button01 a:hover,.editor-styles-wrapper .color-button02 a:hover,.editor-styles-wrapper .color-button01-big a:hover,.editor-styles-wrapper .color-button02-big a:hover{-webkit-transform: translateY(2px)!important;transform: translateY(2px)!important;-webkit-filter: brightness(0.95)!important;filter: brightness(0.95)!important; }.editor-styles-wrapper .color-button01:hover:before,.editor-styles-wrapper .color-button02:hover:before,.editor-styles-wrapper .color-button01-big:hover:before,.editor-styles-wrapper .color-button02-big:hover:before{-webkit-transform: translateY(2px)!important;transform: translateY(2px)!important;box-shadow: none!important;}.editor-styles-wrapper .color-button01-big{width: ' . $theme_big_btn_w_size.'!important; margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button01-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important;}.editor-styles-wrapper .color-button02-big{width: ' . $theme_big_btn_w_size2.'!important; margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button02-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;}';
	}elseif( is_button_style() == 'btn-style02' ){
		$style .= '.editor-styles-wrapper .color-button01:before,.editor-styles-wrapper .color-button02:before,.editor-styles-wrapper .color-button01-big:before,.editor-styles-wrapper .color-button02-big:before { display: none!important;} .editor-styles-wrapper .color-button01 a:hover,.editor-styles-wrapper .color-button02 a:hover,.editor-styles-wrapper .color-button01-big a:hover,.editor-styles-wrapper .color-button02-big a:hover{-webkit-transform: translateY(2px)!important;transform: translateY(2px)!important;-webkit-filter: brightness(1.05)!important;filter: brightness(1.05)!important;}';
	}elseif( is_button_style() == 'btn-style03' ){
		$style .= '.editor-styles-wrapper .color-button01-big{width: ' . $theme_big_btn_w_size.'!important; margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button01-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size.'!important; padding-bottom: '.$theme_big_btn_h_size.'!important;}.editor-styles-wrapper .color-button02-big{width: ' . $theme_big_btn_w_size2.'!important; margin-left:auto!important;margin-right: auto!important;}.editor-styles-wrapper .color-button02-big a{ width: 100%!important; padding:0!important;padding-top:'.$theme_big_btn_h_size2.'!important; padding-bottom: '.$theme_big_btn_h_size2.'!important;}';
	}
	
	$style .= '.h2-style01 h2.block-editor-block-list__block, .h2-style03 h2.block-editor-block-list__block, .h2-style08 h2.block-editor-block-list__block:after, .h2-style04 h2.block-editor-block-list__block:before, .h2-style02 h2.block-editor-block-list__block:before, .h2-style05 h2.block-editor-block-list__block, .h2-style07 h2.block-editor-block-list__block:before, .h2-style07 h2.block-editor-block-list__block:after, .h2-style10 h2.block-editor-block-list__block:after, .h2-style10 h2.block-editor-block-list__block:before, .h3-style03 h3.block-editor-block-list__block:before, .h3-style02 h3.block-editor-block-list__block:before, .h3-style05 h3.block-editor-block-list__block:before, .h3-style02 h3.block-editor-block-list__block:after, .h3-style07 h3.block-editor-block-list__block:before, .h4-style02 h4.block-editor-block-list__block:before{background-color: '.$theme_color.'!important;}.h3-style01 h3.block-editor-block-list__block, .h3-style04 h3.block-editor-block-list__block, .h3-style05 h3.block-editor-block-list__block, .h3-style06 h3.block-editor-block-list__block, .h4-style01 h4.block-editor-block-list__block, .h2-style02 h2.block-editor-block-list__block, .h4-style03 h4.block-editor-block-list__block, .h2-style08 h2.block-editor-block-list__block, .h2-style08 h2.block-editor-block-list__block:before, .h2-style09 h2.block-editor-block-list__block{border-color: '.$theme_color.'!important;}.h2-style05 h2.block-editor-block-list__block:before{border-top-color: '.$theme_color.'!important;}.h2-style06 h2.block-editor-block-list__block:before{background-image: linear-gradient(-45deg,transparent 25%,'.$theme_color.' 25%,'.$theme_color.' 50%,transparent 50%,transparent 75%,'.$theme_color.' 75%,'.$theme_color.')!important;}';
	
	$style .= '.editor-styles-wrapper .t-aligncenter{text-align: center!important;}.editor-styles-wrapper strong{font-weight:600!important;}';
	
	$style .= '.editor-styles-wrapper .c-red, .editor-styles-wrapper .c-blue, .editor-styles-wrapper .c-green{ font-weight: 500!important; }.editor-styles-wrapper .c-red{color: #ff2828!important;}.editor-styles-wrapper .c-blue{color: #1F65E3!important;}.editor-styles-wrapper .c-green{color: #2cb23c!important;}';
	
	return wp_strip_all_tags( $style );
}




function get_the_logo_image_url(){
	return esc_url( get_theme_mod( 'logo_image_url' ) );
}
function get_the_top_image_url(){
	return get_theme_mod( 'top_image_url' , get_template_directory_uri().'/img/bg_default.jpg');
}
function get_the_top_image_url_sp(){
	return get_theme_mod( 'top_image_url_sp', get_template_directory_uri().'/img/bg_default_sp.jpg');
}
function get_the_fb_code(){
	return get_option( 'fb_code' );
}
function get_the_tw_code(){
	$str = get_option( 'tw_name' );
	$str = str_replace('@', '', $str);
	return $str;
}

function is_font_style(){
	return get_theme_mod( 'font_style', 'nofont-style' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h2_style(){
  echo get_theme_mod( 'h2_style', 'h2-style01' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h2_style_icon(){
  return get_theme_mod( 'h2_style_icon', '' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h3_style(){
  echo get_theme_mod( 'h3_style', 'h3-style01' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h3_style_icon(){
  return get_theme_mod( 'h3_style_icon', '' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h4_style(){
  echo get_theme_mod( 'h4_style', 'h4-style01' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_h4_style_icon(){
  return get_theme_mod( 'h4_style_icon', '' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_hl_custom(){
  echo get_theme_mod( 'hl_custom', '.hl-custom h2{color:#000;}
.hl-custom h3{color:#000;}
.hl-custom h4{color:#000;}
@media (max-width: 768px) {
//ここから下にスマホ専用のCSSを記述

}' );//第1引数にID、第2引数にデフォルト値を設定する
}

function is_title_text(){
  return get_theme_mod( 'title_text', '' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_date_style(){
  return get_theme_mod( 'theme_pub_mod_date', 'pub_mod' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_animation_style(){
  echo get_theme_mod( 'animation_style', 'animate' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_bread_display(){
  return get_theme_mod( 'theme_bread_display', 'exist' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_totop_display(){
  return get_theme_mod( 'theme_totop_display', 'exist' );//第1引数にID、第2引数にデフォルト値を設定する
}
function get_the_ogp_image_url(){
	return esc_url( get_theme_mod( 'ogp_image_url' ) );
}
function is_logo_position(){
  echo get_theme_mod( 'logo_position', 'center' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_navi_display(){
  echo get_theme_mod( 'top_navi_display', 'tn_on' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_navi_sc_display(){
  echo get_theme_mod( 'top_navi_sc_display', 'tn_search_off' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_navi_sns_display(){
  echo get_theme_mod( 'top_navi_sns_display', 'tn_sns_off' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_tn_logo_position(){
  echo get_theme_mod( 'topnavi_logo_position', 'logo-left' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_topnavi_logo_alt(){
  echo get_theme_mod( 'topnavi_logo_alt', get_bloginfo('name'));//第1引数にID、第2引数にデフォルト値を設定する
}
function is_sp_header_fix(){
  echo get_theme_mod( 'sp_header_fix', 'no-fix' );//第1引数にID、第2引数にデフォルト値を設定する
}

function is_header_display(){
  echo get_theme_mod( 'header_display', 'header_on' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_btn_link(){
  echo get_theme_mod( 'top_image_btn_link', esc_url( home_url()) );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_link(){
  return get_theme_mod( 'top_image_link', '' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_hl(){
  return get_theme_mod( 'top_image_hl', 'ここにヘッダー画像の文字を入力できます' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_text(){
  return get_theme_mod( 'top_image_text', 'ここにサブテキストを入力できます。' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_text_option(){
  return get_theme_mod( 'top_image_text_option', 'top-image-text-option-none' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_subtext_option(){
  return get_theme_mod( 'top_image_subtext_option', 'top-image-subtext-option-none' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_btn_text(){
  return get_theme_mod( 'top_image_btn_text', 'ボタンテキストを入力' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_meta_ctrl(){
  return get_theme_mod( 'top_image_meta_ctrl', '0px' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_top_image_meta_ctrl_sp(){
  return get_theme_mod( 'top_image_meta_ctrl_sp', '0px' );//第1引数にID、第2引数にデフォルト値を設定する
}
function glonavi_position(){
  return get_theme_mod( 'glonavi_position', 'on_position' );//第1引数にID、第2引数にデフォルト値を設定する
}
function footer_choice(){
  return get_theme_mod( 'theme_footer_choice', 'both' );//第1引数にID、第2引数にデフォルト値を設定する
}
function footer_sp_footer_fix(){
  echo get_theme_mod( 'theme_sp_footer_fix', 'sp_footer_fix' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_footer_text_left(){
  echo get_theme_mod( 'footer_text_left', 'プライバシーポリシー' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_footer_text_right(){
  echo get_theme_mod( 'footer_text_right', '免責事項' );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_footer_link_left(){
  echo get_theme_mod( 'footer_link_left', esc_url( home_url().'/privacy') );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_footer_link_right(){
  echo get_theme_mod( 'footer_link_right', esc_url( home_url().'/law') );//第1引数にID、第2引数にデフォルト値を設定する
}
function is_sp_sidemenu_title(){
  echo get_theme_mod( 'sp_sidemenu_title', 'MENU' );
}
function is_glonavi_design(){
	return get_theme_mod( 'glonavi_design', 'type1' );
}
function is_header_design(){
	return get_theme_mod( 'header_design', 'header_style1' );
}
function is_footer_design(){
	return get_theme_mod( 'footer_design', 'footer_style1' );
}
function jin_footer_type(){
	return get_theme_mod( 'footer_type', 'footer_type1' );
}
function is_sidebar_design(){
	return get_theme_mod( 'sidebar_design', 'sidebar_style1' );
}
function is_article_design(){
	return get_theme_mod( 'article_design', 'article_style1' );
}
function is_button_style(){
	return get_theme_mod( 'button_style', 'btn-style01' );
}

function get_topnavi_logo_image_url(){
	return esc_url( get_theme_mod( 'topnavi_logo_image_url' ) );
}
function get_sp_logo_image_url(){
	return esc_url( get_theme_mod( 'sp_logo_image_url' ) );
}
function is_post_list_style(){
  return get_theme_mod( 'post_list_style', 'magazinestyle' );
}
function is_sns_design_type(){
  echo get_theme_mod( 'sns_design_type', 'sns-design-type01' );
}
function is_related_type(){
  return get_theme_mod( 'related_type', 'slide' );
}
function is_related_title(){
  return get_theme_mod( 'related_title', 'RELATED POST' );
}
function is_related_num(){
  return get_theme_mod( 'related_num', '3' );
}
function is_toppage_style(){
  return get_theme_mod( 'toppage_style', 'two_column' );
}
function is_pickup_style(){
  return get_theme_mod( 'pickup_style', 'menu-style' );
}
function is_pickup_child(){
  return get_theme_mod( 'pickup_child', 'child_none' );
}
function is_top_image_child(){
  return get_theme_mod( 'top_image_child', 'child_none' );
}
function is_tw_name(){
  return get_option( 'tw_name', '' );
}
function is_tw_type(){
  return get_option( 'tw_type', 'summary' );
}
function cps_marker2_color(){
  return get_theme_mod( 'theme_marker2_type', '#a9eaf2' );
}

function get_jin_noimage_url(){
	return esc_url( get_theme_mod( 'jin_noimg_url' , get_template_directory_uri().'/img/noimg480.png') );
}

/* 投稿一覧にカスタムフィールド追加 */
function my_posts_columns( $defaults ) {
    $defaults['memo'] = 'メモ';

    return $defaults;
}
add_filter( 'manage_posts_columns', 'my_posts_columns' );

function my_posts_custom_column( $column, $post_id ) {
    switch ( $column ) {
        case 'memo':
            $post_meta = get_post_meta( $post_id, 'memo', true );
            if ( $post_meta ) {
                echo $post_meta;
            } else {
                echo 'なし'; //値が無い場合の表示
            }
            break;
    }
}
add_action( 'manage_posts_custom_column' , 'my_posts_custom_column', 10, 2 );

function display_my_custom_quickedit( $column_name, $post_type ) {
    static $print_nonce = TRUE;
    if ( $print_nonce ) {
        $print_nonce = FALSE;
        wp_nonce_field( 'quick_edit_action', $post_type . '_edit_nonce' ); //CSRF対策
    }

    ?>
    <fieldset class="inline-edit-col-right inline-custom-meta">
        <div class="inline-edit-col column-<?php echo $column_name ?>">
            <label class="inline-edit-group">
                <?php
                switch ( $column_name ) {
                    case 'memo':
                        ?><span class="title">メモ</span><textarea name="memo" rows="3" cols="5"></textarea><?php
                        break;
                }
                ?>
            </label>
        </div>
    </fieldset>
<?php
}
add_action( 'quick_edit_custom_box', 'display_my_custom_quickedit', 10, 2 );

function my_admin_edit_foot() {
    global $post_type;
    $slug = 'post'; //他の一覧ページで動作しないように投稿タイプの指定をする

    if ( $post_type == $slug ) {
        echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/admin_edit.js"></script>';
    }
}
add_action('admin_footer-edit.php', 'my_admin_edit_foot');

function save_custom_meta( $post_id ) {
    $slug = 'post'; //カスタムフィールドの保存処理をしたい投稿タイプを指定

    if ( $slug !== get_post_type( $post_id ) ) {
        return;
    }
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $_POST += array("{$slug}_edit_nonce" => '');
    if ( !wp_verify_nonce( $_POST["{$slug}_edit_nonce"], 'quick_edit_action' ) ) {
        return;
    }

    if ( isset( $_REQUEST['memo'] ) ) {
        update_post_meta( $post_id, 'memo', $_REQUEST['memo'] );
    }
}
add_action( 'save_post', 'save_custom_meta' );




//テーマ適用時に自動で固定ページ生成
function create_pages() {
	add_option( 'privacy_page', 'page_create');
	if ( get_page_by_path('privacy') === null && get_option('privacy_page') === 'page_create' ) {
		wp_insert_post(
			array(
				'post_title'   => 'プライバシーポリシー',
				'post_name'    => 'privacy',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '<p>制定日：xxxx年xx月xx日<br>
最終改訂日：xxxx年xx月xx日</p>
<p>代表者名：XXXX　XXXX</p>

<h4>当サイトに掲載されている広告について</h4>
<p>当サイトでは、第三者配信の広告サービス（Googleアドセンス、A8.net、Amazonアソシエイト、〇〇、〇〇）を利用しています。<br>
このような広告配信事業者は、ユーザーの興味に応じた商品やサービスの広告を表示するため、当サイトや他サイトへのアクセスに関する情報 『Cookie』(氏名、住所、メール アドレス、電話番号は含まれません) を使用することがあります。<br>
またGoogleアドセンスに関して、このプロセスの詳細やこのような情報が広告配信事業者に使用されないようにする方法については、<a href="https://www.google.co.jp/policies/technologies/ads/" target="_blank">こちら</a>をご覧ください。</p>

<h4>当サイトが使用しているアクセス解析ツールについて</h4>
<p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。<br>
このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。<br>
このトラフィックデータは匿名で収集されており、個人を特定するものではありません。<br>
この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。<br>
この規約に関して、詳しくは<a href="https://www.google.com/analytics/terms/jp.html" target="_blank">こちら</a>をご覧ください。</p>

<h4>当サイトへのコメントについて</h4>
<p>当サイトでは、スパム・荒らしへの対応として、コメントの際に使用されたIPアドレスを記録しています。<br>
これはブログの標準機能としてサポートされている機能で、スパム・荒らしへの対応以外にこのIPアドレスを使用することはありません。<br>
また、メールアドレスとURLの入力に関しては、任意となっております。<br>
全てのコメントは管理人が事前にその内容を確認し、承認した上での掲載となりますことをあらかじめご了承下さい。<br>
加えて、次に掲げる内容を含むコメントは管理人の裁量によって承認せず、削除する事があります。</p>

<ul>
<li>当サイトからのご連絡や業務のご案内やご質問に対する回答</li>
<li><strong>ご注文いだいた商品を発送する場合</strong></li>
<li>禁制品の取引に関するものや、他者を害する行為の依頼など、法律によって禁止されている物品、行為の依頼や斡旋などに関するもの。</li>
<li>その他、公序良俗に反し、または管理人によって承認すべきでないと認められるもの。</li>
</ul>',
			)
		);
		update_option( 'privacy_page', 'page_created');
	}

	add_option( 'law_page', 'page_create');
	if ( get_page_by_path('law') === null && get_option('law_page') === 'page_create' ) {
		wp_insert_post(
			array(
				'post_title'   => '特定商取引法に基づく表記',
				'post_name'    => 'law',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '<br><br><h4>代表責任者名</h4>
<p>xxxxxx</p>
<h4>所在地</h4>
<p>〒xxx―xxxx　ここに住所を記載</p>
<h4>電話番号</h4>
<p>xxx-xxxx-xxxx</p>
<h4>メールアドレス</h4>
<p>xxxx@xxxx.com</p>
<h4>ホームページURL</h4>
<p>https://xxxxx.com</p>
<h4>責任の有無</h4>
<p>当サイトは、アフィリエイトプログラムにより商品をご紹介致しております。<br>
アフィリエイトプログラムとは、商品及びサービスの提供元と業務提携を 結び商品やサービスを紹介するインターネット上のシステムです。<br>
従いまして、当サイトの商品は当サイトが販売している訳ではありません。<br>
<br>
お客様ご要望の商 品、お支払い等はリンク先の販売店と直接のお取引となりますので、特定商取引法に基づく表記につきましてはリンク先をご確認頂けますようお願い致します。<br>
商品の価格 商品の詳細 消費税 送料 在庫数等の詳細は時として変わる場合も御座います。<br>
また、返品・返金保証に関しましてもリンク先の販売元が保証するものです。当サイトだけではなくリンク 先のサイトも良くご確認頂けますようお願い致します。<br>
また、当サイトの掲載情報をご利用頂く場合には、お客様のご判断と責任におきましてご利用頂けますようお願い致します。当サイトでは、一切の責任を負いかねます事ご了承願います。<br>
<br>
尚、掲載商品に関するお問合せはリンク先に御座います企業宛までお願い致します。当サイト管理者側ではお答え致しかねます事、ご了承ください。</p>',
			)
		);
		update_option( 'law_page', 'page_created');
	}
}
add_action('after_setup_theme', 'create_pages');



//カスタムメニューのデフォルト設定
function cpsmenu(){
	if(!is_nav_menu('グローバルナビゲーション')){
		$menu_id = wp_create_nav_menu('グローバルナビゲーション');
		$my_url = home_url();
		$set_menu_item = array(
			'item1' => array(
				'menu-item-title' => 'ホーム',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
			'item2' => array(
				'menu-item-title' => 'プロフィール',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
			'item3' => array(
				'menu-item-title' => 'サービス',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
			'item4' => array(
				'menu-item-title' => 'ランキング',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
			'item5' => array(
				'menu-item-title' => 'クチコミ',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
			'item6' => array(
				'menu-item-title' => 'お問い合わせ',
				'menu-item-url' => $my_url,
				'menu-item-description' => '',
			),
		);
		foreach($set_menu_item as $v){
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => $v['menu-item-title'],
				'menu-item-url' => $v['menu-item-url'],
				'menu-item-description' => $v['menu-item-description'],
				'menu-item-status' => 'publish',
			));
		}
	}
}
add_action( 'init', 'cpsmenu' );
