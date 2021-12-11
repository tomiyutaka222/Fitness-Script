<?php

// ビジュアルエディタに機能を追加
function cps_mce_external_plugins_table($plugins) {
    $plugins['table'] = get_template_directory_uri() .'/js/tinymce/table/plugin.min.js';
	if( ! get_option('jin_code_highlighter') == null ){
		$plugins['codesample'] = get_template_directory_uri() .'/js/tinymce/codesample/plugin.min.js';
	}
    return $plugins;
}
add_filter( 'mce_external_plugins', 'cps_mce_external_plugins_table' );



//エディターの不要なものを最初から非表示にする
function cps_remove_tinymce_buttons( $buttons ) {
	$remove = array('wp_more', 'dfw','hr'); // ここに削除したいものを記述
	return array_diff($buttons, $remove);
}
add_filter( 'mce_buttons', 'cps_remove_tinymce_buttons' );

function cps_remove_tinymce_buttons_2( $buttons ) {
	$remove = array('wp_help','indent','outdent','charmap','removeformat','pastetext','alignjustify'); // ここに削除したいものを記述
	return array_diff($buttons, $remove);
}
add_filter( 'mce_buttons_2', 'cps_remove_tinymce_buttons_2' );



//エディターに追加
function cps_myplugin_tinymce_buttons($buttons){

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if( is_plugin_active( 'paste-raw-html/pasteRawHtml.php' ) ){
		$buttons = array('fontsizeselect','formatselect','bold','italic','underline','strikethrough','forecolor','backcolor','wp_adv','paste_raw_html');
	}else{
		$buttons = array('fontsizeselect','formatselect','bold','italic','underline','strikethrough','forecolor','backcolor','wp_adv');
	}

	return $buttons;
}
add_filter("mce_buttons", "cps_myplugin_tinymce_buttons");

function cps_myplugin_tinymce_buttons2($buttons) {

	if( ! get_option('jin_code_highlighter') == null ){
		$buttons = array('styleselect','Columnbutton','link','unlink','alignleft','aligncenter','alignright','bullist','numlist','blockquote','table','codesample','undo','redo');
	}else{
		$buttons = array('styleselect','Columnbutton','link','unlink','alignleft','aligncenter','alignright','bullist','numlist','blockquote','table','undo','redo');
	}
	return $buttons;

}

add_filter('mce_buttons_2','cps_myplugin_tinymce_buttons2');


// エディターにオリジナルのスタイルを追加
function cps_mce_before_init_insert_formats( $init_array ) {  
$style_formats = array(
	array(  
		'title' => 'マーカー１',
		'inline' => 'span',
		'classes' => 'marker',
		'wrapper' => true,
	),
	array(  
		'title' => 'マーカー２',
		'inline' => 'span',
		'classes' => 'marker2',
		'wrapper' => true,
	),
	array(  
		'title' => 'ボタン①',
		'inline' => 'span',
		'classes' => 'color-button01',
		'wrapper' => true,
	),
	array(  
		'title' => 'ボタン②',
		'inline' => 'span',
		'classes' => 'color-button02',
		'wrapper' => true,
	),
	array(  
		'title' => 'カスタムボタン①',
		'inline' => 'span',
		'classes' => 'color-button01-big',
		'wrapper' => true,
	),
	array(  
		'title' => 'カスタムボタン②',
		'inline' => 'span',
		'classes' => 'color-button02-big',
		'wrapper' => true,
	),
	array(
		'title' => 'キーボード',
		'inline' => 'span',
		'classes' => 'jin-keyboard',
		'wrapper' => true,
	),
	array(  
		'title' => '１：太枠ボックス',
		'block' => 'div',
		'classes' => 'simple-box1',
		'wrapper' => true,
	),
	array(  
		'title' => '２：太点線ボックス',
		'block' => 'div',  
		'classes' => 'simple-box2',
		'wrapper' => true,
	),
	array(  
		'title' => '３：二重線ボックス',
		'block' => 'div',
		'classes' => 'simple-box3',
		'wrapper' => true,
	),
	array(  
		'title' => '４：細枠背景色ボックス',
		'block' => 'div',
		'classes' => 'simple-box4',
		'wrapper' => true,
	),
	array(  
		'title' => '５：細点線背景色ボックス',
		'block' => 'div',
		'classes' => 'simple-box5',
		'wrapper' => true,
	),
	array(  
		'title' => '６：背景色ボックス',
		'block' => 'div',
		'classes' => 'simple-box6',
		'wrapper' => true,
	),
	array(  
		'title' => '７：太枠背景色ボックス',
		'block' => 'div',
		'classes' => 'simple-box7',
		'wrapper' => true,
	),
	array(  
		'title' => '８：左線ボックス',
		'block' => 'div',
		'classes' => 'simple-box8',
		'wrapper' => true,
	),
	array(  
		'title' => '９：端折れボックス',
		'block' => 'div',  
		'classes' => 'simple-box9',
		'wrapper' => true,
	),
	array(  
		'title' => '１０：注意点ボックス',
		'block' => 'div',
		'classes' => 'concept-box2',
		'wrapper' => true,
	),
	array(  
		'title' => '１１：良い例ボックス',
		'block' => 'div',
		'classes' => 'concept-box3',
		'wrapper' => true,
	),
	array(  
		'title' => '１２：悪い例ボックス',
		'block' => 'div',
		'classes' => 'concept-box4',
		'wrapper' => true,
	),
	array(  
		'title' => '１３：参考ボックス',
		'block' => 'div',
		'classes' => 'concept-box5',
		'wrapper' => true,
	),
	array(  
		'title' => '１４：メモボックス',
		'block' => 'div',
		'classes' => 'concept-box6',
		'wrapper' => true,
	),
		array(  
		'title' => '１５：ポイントボックス',
		'block' => 'div',
		'classes' => 'concept-box1',
		'wrapper' => true,
	),
	
); 
$init_array['style_formats'] = json_encode( $style_formats );    	
return $init_array;
}  
add_filter( 'tiny_mce_before_init', 'cps_mce_before_init_insert_formats' );


// エディターの初期設定を変更
function cps_customize_tinymce_settings($mceInit) {	

	$mceInit['fontsize_formats'] = '8px=8px 10px=10px 12px=12px 14px=14px 16px=16px 20px=20px 24px=24px 28px=28px 32px=32px 36px=36px 48px=48px 60px=60px';

	return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'cps_customize_tinymce_settings' );


// エディターにボタン追加
function cps_register_button($buttons){
	
    $buttons[] = 'Ranking01';
	$buttons[] = 'Table03';
	$buttons[] = 'Twobutton';
	$buttons[] = 'ChatCode';

    return $buttons;
}
add_filter('mce_buttons', 'cps_register_button');

function cps_mce_plugin($plugin_array){
    $plugin_array['RankingButtons'] = get_template_directory_uri() . '/js/editor_plugin.js';
    return $plugin_array;
}
add_filter('mce_external_plugins', 'cps_mce_plugin');



if ( ! function_exists( 'add_tags_text_editor' ) ):
function cps_add_tags_text_editor() {
	if (wp_script_is('quicktags')){?>
	<script>
		QTags.addButton('tt-h2','H2','<h2>','</h2>');
		QTags.addButton('tt-h3','H3','<h3>','</h3>');
		QTags.addButton('tt-h4','H4','<h4>','</h4>');
		QTags.addButton('tt-h5','H5','<h5>','</h5>');
		QTags.addButton('tt-marker1','マーカー１','<span class="marker">','</span>');
		QTags.addButton('tt-marker2','マーカー２','<span class="marker2">','</span>');
		QTags.addButton('tt-twobutton','横並びボタン','<span class="twobutton"><span class="color-button01"><a href="#">詳細ページ</a></span><span class="color-button02"><a href="#">公式ページ</a></span></span>');
		QTags.addButton('tt-cbutton1','ボタン１','<span class="color-button01"><a href="#">詳細ページ</a></span>');
		QTags.addButton('tt-cbutton2','ボタン２','<span class="color-button02"><a href="#">公式ページ</a></span>');
		QTags.addButton('tt-cbutton-b1','カスタムボタン１','<span class="color-button01-big"><a href="#">詳細ページ</a></span>');
		QTags.addButton('tt-cbutton-b2','カスタムボタン２','<span class="color-button02-big"><a href="#">公式ページ</a></span>');
		QTags.addButton('tt-ranking','ランキング','<div class="ranking01"><div class="ranking-title01">[jin-rank1]ランキング１位</div><div class="ranking-img01">ここに広告タグ（300 x 250）をコピペ</div><div class="ranking-info01">ここに説明文を入力してください。ここに説明文を入力してください。</div><div class="clearfix"></div></div><table class="cps-table03"><tbody><tr><th>項目名</th><td class="rankinginfo">[jinstar5.0]</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr></tbody></table><span class="twobutton"><span class="color-button01"><a href="#">詳細ページ</a></span><span class="color-button02"><a href="#">公式ページ</a></span></span><div class="ranking02"><div class="ranking-title02">[jin-rank2]ランキング２位</div><div class="ranking-img02">ここに広告タグ（300 x 250）をコピペ</div><div class="ranking-info02">ここに説明文を入力してください。ここに説明文を入力してください。</div><div class="clearfix"></div></div><table class="cps-table03"><tbody><tr><th>項目名</th><td class="rankinginfo">[jinstar5.0]</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr></tbody></table><span class="twobutton"><span class="color-button01"><a href="#">詳細ページ</a></span><span class="color-button02"><a href="#">公式ページ</a></span></span><div class="ranking03"><div class="ranking-title03">[jin-rank3]ランキング３位</div><div class="ranking-img03">ここに広告タグ（300 x 250）をコピペ</div><div class="ranking-info03">ここに説明文を入力してください。ここに説明文を入力してください。</div><div class="clearfix"></div></div><table class="cps-table03"><tbody><tr><th>項目名</th><td class="rankinginfo">[jinstar5.0]</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo">ここに説明文を入力してください。</td></tr></tbody></table><span class="twobutton"><span class="color-button01"><a href="#">詳細ページ</a></span><span class="color-button02"><a href="#">公式ページ</a></span></span>');
		QTags.addButton('tt-table','表','<table class="cps-table03"><tbody><tr><th>項目名</th><td class="rankinginfo" >ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo" >ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo" >ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo" >ここに説明文を入力してください。</td></tr><tr><th>項目名</th><td class="rankinginfo" >ここに説明文を入力してください。</td></tr></tbody></table>');
		QTags.addButton('tt-center','中央寄せ','<div class="t-aligncenter">','</div>');
		QTags.addButton('tt-red','赤色','<span class="c-red">','</span>');
		QTags.addButton('tt-blue','青色','<span class="c-blue">','</span>');
		QTags.addButton('tt-green','緑色','<span class="c-green">','</span>');
		
	</script>
	<?php
	}
}
endif;
add_action( 'admin_print_footer_scripts', 'cps_add_tags_text_editor' );

?>