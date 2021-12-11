<?php

//投稿スラッグから投稿IDを取得する関数の定義
function get_id_by_post_name($post_name)
{
  global $wpdb;
  $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$post_name."'");
  return esc_html($id);
}



// メモの設定
function add_mymemo(){
	add_meta_box( 'memo_posts', 'メモ', 'insert_mymemo', 'post', 'side', 'low');
}
function insert_mymemo(){
	global $post;
	wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');
	echo '<table style="text-align:left;"><tbody>';
	echo '<tr><td><textarea name="memo" rows="5" style="width:247px;">'.esc_html(get_post_meta($post->ID, 'memo', true)).'</textarea></td></tr>';
	echo '</tbody></table>';
}
function save_mymemo($post_id){
	$my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;
	if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {
		return $post_id;
	}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	if(!current_user_can('edit_post', $post_id)) { return $post_id; }

		$data = isset($_POST['memo']) ? $_POST['memo'] : null;
		if(get_post_meta($post_id, 'memo') == ""){
			add_post_meta($post_id, 'memo', $data, true);
		}elseif($data != get_post_meta($post_id, 'memo', true)){
			update_post_meta($post_id, 'memo', $data);
		}elseif($data == ""){
			delete_post_meta($post_id, 'memo', get_post_meta($post_id, 'memo', true));
		}
}
add_action('add_meta_boxes', 'add_mymemo');
add_action('save_post', 'save_mymemo');





// SEO設定を１つにまとめる
function add_jin_seo_fields() {
    add_meta_box( 'seo_setting', 'SEO設定', 'insert_jin_seo_fields', 'post', 'normal','low',array('この記事をnoindexにする'));
	add_meta_box( 'seo_setting', 'SEO設定', 'insert_jin_seo_fields', 'page', 'normal','low',array('この記事をnoindexにする'));
}
add_action('admin_menu', 'add_jin_seo_fields');
function insert_jin_seo_fields($post, $metabox) {
    global $post;
	
    wp_nonce_field(wp_create_nonce(__FILE__), 'jin_seo');
	
	
    $check = $metabox['args'][0];
    $checked = '';
    if ( get_post_meta($post->ID, 'post_noindex', true) == $check ){
        $checked = 'checked';
    }
    

    // title設定
    echo '<table style="margin-bottom: 16px;margin-top: 15px;text-align:left;"><tbody>';
    echo '<tr><td style="font-size:13px; font-weight:bold;">title設定</td></tr><tr><td><span style="font-size:0.8em; color:#888;">記事タイトルとは別に、この記事のtitleタグを設定することができます。</span></td></tr><tr><td><input name="jin_seotitle" class="jin-input" size="50%" value="'.esc_html(get_post_meta($post->ID, 'jin_seotitle', true)).'" /></td></tr>';
    echo '</tbody></table>';
	echo '<div style="border-bottom:1px solid #ccc; height:5px; margin-bottom:15px;"></div>';
    // description設定
    echo '<table style="margin-bottom: 16px;text-align:left;"><tbody>';
    echo '<tr><td style="font-size:13px; font-weight:bold;">decription設定</td></tr><tr><td><span style="font-size:0.8em; color:#888;">この記事がどういった内容なのか、検索エンジンやユーザーに向けて説明を書くことができます。</span></td></tr><tr><td><textarea name="post_desc" class="jin-input" rows="5" cols="60" >'.esc_html(get_post_meta($post->ID, 'post_desc', true)).'</textarea></td></tr>';
    echo '</tbody></table>';
	echo '<div style="border-bottom:1px solid #ccc; height:5px; margin-bottom:15px;"></div>';
    // keyword設定
    echo '<table style="margin-bottom: 16px;text-align:left;"><tbody>';
    echo '<tr><td style="font-size:13px; font-weight:bold;">keyword設定</td></tr><tr><td><span style="font-size:0.8em; color:#888;">この記事のメタキーワードを設定できます。</span></td></tr><tr><td><input name="jin_keyword" class="jin-input" size="50%" value="'.esc_html(get_post_meta($post->ID, 'jin_keyword', true)).'" /></td></tr>';
    echo '</tbody></table>';
	echo '<div style="border-bottom:1px solid #ccc; height:5px; margin-bottom:15px;"></div>';
	// ハッシュタグ設定
    echo '<table style="margin-bottom: 16px;text-align:left;"><tbody>';
    echo '<tr><td style="font-size:13px; font-weight:bold;">ハッシュタグ設定</td></tr><tr><td><span style="font-size:0.8em; color:#888;">複数設定する場合は半角スペースで区切ってください。</span></td></tr><tr><td><input name="jin_hashtag" class="jin-hashtag jin-input" placeholder="#ハッシュタグ #ハッシュタグ２" size="50%" value="'.esc_html(get_post_meta($post->ID, 'jin_hashtag', true)).'" /></td></tr>';
    echo '</tbody></table>';
	echo '<div style="border-bottom:1px solid #ccc; height:5px; margin-bottom:15px;"></div>';
	// noindex設定
	echo '<table style="margin-bottom: 16px;text-align:left;"><tbody>';
    echo '<tr><td style="font-size:13px; font-weight:bold;">noindex設定</td></tr><tr><td><label><input type="checkbox" name="post_noindex" size="50%" value="' . $check . '" '.$checked.' />' . $check . '</label></td></tr>';
    echo '</tbody></table><style>.jin-hashtag::placeholder{color:#ccc;} .jin-input{padding:9px!important; border-radius:4px; border:1px solid #7e8993; -webkit-appearance: none; -webkit-gradient:none!important; }</style>';

}
function save_jin_seo_fields( $post_id ) {
    $jin_seo = isset($_POST['jin_seo']) ? $_POST['jin_seo'] : null;
    if(!wp_verify_nonce($jin_seo, wp_create_nonce(__FILE__))) {
        return $post_id;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
    if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    $jin_seotitle_data = isset($_POST['jin_seotitle']) ? $_POST['jin_seotitle'] : null;
    if(get_post_meta($post_id, 'jin_seotitle') == ""){
        add_post_meta($post_id, 'jin_seotitle', $jin_seotitle_data, true);
    }elseif($jin_seotitle_data != get_post_meta($post_id, 'jin_seotitle', true)){
        update_post_meta($post_id, 'jin_seotitle', $jin_seotitle_data);
    }elseif($jin_seotitle_data == ""){
        delete_post_meta($post_id, 'jin_seotitle', get_post_meta($post_id, 'jin_seotitle', true));
    }
    $jin_postdesc_data = isset($_POST['post_desc']) ? $_POST['post_desc'] : null;
    if(get_post_meta($post_id, 'post_desc') == ""){
        add_post_meta($post_id, 'post_desc', $jin_postdesc_data, true);
    }elseif($jin_postdesc_data != get_post_meta($post_id, 'post_desc', true)){
        update_post_meta($post_id, 'post_desc', $jin_postdesc_data);
    }elseif($jin_postdesc_data == ""){
        delete_post_meta($post_id, 'post_desc', get_post_meta($post_id, 'post_desc', true));
    }
    $jin_keyword_data = isset($_POST['jin_keyword']) ? $_POST['jin_keyword'] : null;
    if(get_post_meta($post_id, 'jin_keyword') == ""){
        add_post_meta($post_id, 'jin_keyword', $jin_keyword_data, true);
    }elseif($jin_keyword_data != get_post_meta($post_id, 'jin_keyword', true)){
        update_post_meta($post_id, 'jin_keyword', $jin_keyword_data);
    }elseif($jin_keyword_data == ""){
        delete_post_meta($post_id, 'jin_keyword', get_post_meta($post_id, 'jin_keyword', true));
    }
	$jin_hashtag_data = isset($_POST['jin_hashtag']) ? $_POST['jin_hashtag'] : null;
    if(get_post_meta($post_id, 'jin_hashtag') == ""){
        add_post_meta($post_id, 'jin_hashtag', $jin_hashtag_data, true);
    }elseif($jin_hashtag_data != get_post_meta($post_id, 'jin_hashtag', true)){
        update_post_meta($post_id, 'jin_hashtag', $jin_hashtag_data);
    }elseif($jin_hashtag_data == ""){
        delete_post_meta($post_id, 'jin_hashtag', get_post_meta($post_id, 'jin_hashtag', true));
    }
    $jin_noindex = isset($_POST['post_noindex']) ? $_POST['post_noindex'] : '';
    if( ! empty($jin_noindex) )
        update_post_meta($post_id, 'post_noindex', $jin_noindex);
    else
        delete_post_meta( $post_id, 'post_noindex' );
    return $jin_noindex;
}
add_action('save_post', 'save_jin_seo_fields');




// おすすめ記事　カスタムフィールドの設定
add_action('admin_menu', 'add_myrecommend');
function add_myrecommend() {
	add_meta_box( 'recommend_posts', 'おすすめ記事', 'insert_myrecommend', 'post', 'side', 'low', array('おすすめ記事にする'));
	add_meta_box( 'recommend_posts', 'おすすめ記事', 'insert_myrecommend', 'page', 'side', 'low', array('おすすめ記事にする'));
}
function insert_myrecommend($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="recommend_posts" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'recommend_posts', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
	
}

add_action('save_post', 'save_myrecommend');
function save_myrecommend($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['recommend_posts']) ? $_POST['recommend_posts'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'recommend_posts', $mydata);
	else
		delete_post_meta( $post_id, 'recommend_posts' );
	
	return $mydata;
}


// SNS表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'add_mypostsns');
function add_mypostsns() {
	add_meta_box( 'my_postsns', 'SNSボタン非表示', 'insert_mypostsns', 'post', 'side', 'low', array('この記事でSNSボタンを表示しない'));
	add_meta_box( 'my_postsns', 'SNSボタン非表示', 'insert_mypostsns', 'page', 'side', 'low', array('この記事でSNSボタンを表示しない'));
}
function insert_mypostsns($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="custom_postsns_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'custom_postsns_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_mypostsns');
function save_mypostsns($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['custom_postsns_off']) ? $_POST['custom_postsns_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'custom_postsns_off', $mydata);
	else
		delete_post_meta( $post_id, 'custom_postsns_off' );
	
	return $mydata;
}



// 広告表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'add_mycustomad');
function add_mycustomad() {
	add_meta_box( 'my_custom_ad', '広告非表示', 'insert_mycustomad', 'post', 'side', 'low', array('この記事で広告を表示しない'));
	add_meta_box( 'my_custom_ad', '広告非表示', 'insert_mycustomad', 'page', 'side', 'low', array('この記事で広告を表示しない'));
}
function insert_mycustomad($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="custom_ad_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'custom_ad_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_mycustomad');
function save_mycustomad($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['custom_ad_off']) ? $_POST['custom_ad_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'custom_ad_off', $mydata);
	else
		delete_post_meta( $post_id, 'custom_ad_off' );
	
	return $mydata;
}


// CTA表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'add_mycustominfo');
function add_mycustominfo() {
	add_meta_box( 'my_custom_info', 'CTA非表示', 'insert_mycustominfo', 'post', 'side', 'low', array('この記事でCTAを表示しない'));
	add_meta_box( 'my_custom_info', 'CTA非表示', 'insert_mycustominfo', 'page', 'side', 'low', array('この記事でCTAを表示しない'));
}
function insert_mycustominfo($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="custom_info_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'custom_info_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_mycustominfo');
function save_mycustominfo($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['custom_info_off']) ? $_POST['custom_info_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'custom_info_off', $mydata);
	else
		delete_post_meta( $post_id, 'custom_info_off' );
	
	return $mydata;
}


// スマホボタンメニュー非表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'jin_add_change_sp_sidemenu');
function jin_add_change_sp_sidemenu() {
	add_meta_box( 'jin_add_change_sp_sidemenu', 'スマホボタンメニュー非表示', 'insert_jin_add_change_sp_sidemenu', 'page', 'side', 'low', array('この記事でスマホボタンメニューを表示しない'));
}
function insert_jin_add_change_sp_sidemenu($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="sp_sidemenu_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'sp_sidemenu_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_jin_add_change_sp_sidemenu');
function save_jin_add_change_sp_sidemenu($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['sp_sidemenu_off']) ? $_POST['sp_sidemenu_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'sp_sidemenu_off', $mydata);
	else
		delete_post_meta( $post_id, 'sp_sidemenu_off' );
	
	return $mydata;
}


// アイキャッチ表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'add_cps_eyecatch_display');
function add_cps_eyecatch_display() {
	add_meta_box( 'cps_eyecatch_display', 'アイキャッチ画像非表示', 'insert_cps_eyecatch_display', 'post', 'side', 'low', array('この記事でアイキャッチ画像を表示しない'));
	add_meta_box( 'cps_eyecatch_display', 'アイキャッチ画像非表示', 'insert_cps_eyecatch_display', 'page', 'side', 'low', array('この記事でアイキャッチ画像を表示しない'));
}
function insert_cps_eyecatch_display($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="cps_eyecatch_display_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'cps_eyecatch_display_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_cps_eyecatch_display');
function save_cps_eyecatch_display($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['cps_eyecatch_display_off']) ? $_POST['cps_eyecatch_display_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'cps_eyecatch_display_off', $mydata);
	else
		delete_post_meta( $post_id, 'cps_eyecatch_display_off' );
	
	return $mydata;
}


// プロフィール表示切り替え　カスタムフィールドの設定
add_action('admin_menu', 'add_mypostprofile');
function add_mypostprofile() {
	add_meta_box( 'my_postprofile', 'プロフィール非表示', 'insert_mypostprofile', 'post', 'side', 'low', array('この記事でプロフィールを表示しない'));
	add_meta_box( 'my_postprofile', 'プロフィール非表示', 'insert_mypostprofile', 'page', 'side', 'low', array('この記事でプロフィールを表示しない'));
}
function insert_mypostprofile($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="custom_postprofile_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'custom_postprofile_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_mypostprofile');
function save_mypostprofile($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['custom_postprofile_off']) ? $_POST['custom_postprofile_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'custom_postprofile_off', $mydata);
	else
		delete_post_meta( $post_id, 'custom_postprofile_off' );
	
	return $mydata;
}



// 関連記事非表示　カスタムフィールドの設定
add_action('admin_menu', 'add_myrelated');
function add_myrelated() {
	add_meta_box( 'my_related', '関連記事非表示', 'insert_myrelated', 'post', 'side', 'low', array('この記事で関連記事を表示しない'));
}
function insert_myrelated($post, $metabox){
	
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
	
	for($i=0; $i<count($metabox['args']); $i=$i+1){
		$check = $metabox['args'][$i];
		echo '<label><input type="checkbox" name="related_off" value="' . $check . '"';
		if ( get_post_meta($post->ID, 'related_off', true) == $check ) echo ' checked';
		echo ' />' . $check . '</label><br />';
	}
}

add_action('save_post', 'save_myrelated');
function save_myrelated($post_id){
	if ( ! isset($_POST['myplugin_noncename']) )
		return $post_id;
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) 
		return $post_id;
	
	$mydata = isset($_POST['related_off']) ? $_POST['related_off'] : '';
	if( ! empty($mydata) )
		update_post_meta($post_id, 'related_off', $mydata);
	else
		delete_post_meta( $post_id, 'related_off' );
	
	return $mydata;
}








// topicsタイトル　カスタムフィールドの設定
function add_mypostdesign_title(){
     if(function_exists('add_mypostdesign_title')){
         add_meta_box('id_mypostdesign_title', 'ボックスデザイン一覧', 'insert_mypostdesign_title', 'post', 'normal', 'high');
		 add_meta_box('id_mypostdesign_title', 'ボックスデザイン一覧', 'insert_mypostdesign_title', 'page', 'normal', 'high');
     }
}
//メタボックス用のスタイルシート

function my_field_styles() {
  wp_enqueue_style('my_metabox', get_template_directory_uri().'/css/my_metabox.css');
}
add_action('admin_print_styles', 'my_field_styles');

function my_field_scripts() {
  wp_enqueue_script('my_metabox', get_template_directory_uri().'/js/my_metabox.js', array(), false, true );
	//画像パスののディレクトリ受け渡し
	$inst_dir = get_template_directory_uri();
	wp_localize_script('my_metabox', 'jin_inst_dir', array(
				'install_dir' => $inst_dir,
			) 
	);
}
add_action('admin_print_scripts', 'my_field_scripts');




function insert_mypostdesign_title(){
	global $post;
	wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');
	echo '<table class="designsample"><tbody>';
	
	echo '<tr><td><div class="simple-box1"><p>ここにテキストを入力</p></div></td><td><div class="simple-box2">
<p>ここにテキストを入力</p></div></td><td><div class="simple-box3"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea1"><div class="simple-box1"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea2"><div class="simple-box2"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea3"><div class="simple-box3"><p>ここにテキストを入力</p></div></textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button1">コードコピー</button></td><td class="copybtn"><button id="button2">コードコピー</button></td><td class="copybtn"><button id="button3">コードコピー</button></td></tr>';
	
	echo '<tr><td><div class="simple-box4"><p>ここにテキストを入力</p></div></td><td><div class="simple-box5">
<p>ここにテキストを入力</p></div></td><td><div class="simple-box6"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea4"><div class="simple-box4"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea5"><div class="simple-box5"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea6"><div class="simple-box6"><p>ここにテキストを入力</p></div></textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button4">コードコピー</button></td><td class="copybtn"><button id="button5">コードコピー</button></td><td class="copybtn"><button id="button6">コードコピー</button></td></tr>';
	
	echo '<tr><td><div class="simple-box7"><p>ここにテキストを入力</p></div></td><td><div class="simple-box8">
<p>ここにテキストを入力</p></div></td><td><div class="simple-box9"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea7"><div class="simple-box7"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea8"><div class="simple-box8"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea9"><div class="simple-box9"><p>ここにテキストを入力</p></div></textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button7">コードコピー</button></td><td class="copybtn"><button id="button8">コードコピー</button></td><td class="copybtn"><button id="button9">コードコピー</button></td></tr>';
	
	echo '<tr><td><div class="concept-box2"><p>ここにテキストを入力</p></div></td><td><div class="concept-box3">
<p>ここにテキストを入力</p></div></td><td><div class="concept-box4"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea16"><div class="concept-box2"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea17"><div class="concept-box3"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea18"><div class="concept-box4"><p>ここにテキストを入力</p></div></textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button16">コードコピー</button></td><td class="copybtn"><button id="button17">コードコピー</button></td><td class="copybtn"><button id="button18">コードコピー</button></td></tr>';
	
	echo '<tr><td><div class="concept-box5"><p>ここにテキストを入力</p></div></td><td><div class="concept-box6">
<p>ここにテキストを入力</p></div></td><td><div class="concept-box1"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea19"><div class="concept-box5"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea20"><div class="concept-box6"><p>ここにテキストを入力</p></div></textarea></th><th><textarea readonly id="textarea21"><div class="concept-box1"><p>ここにテキストを入力</p></div></textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button19">コードコピー</button></td><td class="copybtn"><button id="button20">コードコピー</button></td><td class="copybtn"><button id="button21">コードコピー</button></td></tr>';
	
	echo '<tr><td><div class="kaisetsu-box1"><p>ここにテキストを入力</p></div></td><td><div class="kaisetsu-box2">
<p>ここにテキストを入力</p></div></td><td><div class="kaisetsu-box3"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea10">[box01 title="ここにタイトルを入力"]ここに本文を入力[/box01]</textarea></th><th><textarea readonly id="textarea11">[box02 title="ここにタイトルを入力"]ここに本文を入力[/box02]</textarea></th><th><textarea readonly id="textarea12">[box03 title="ここにタイトルを入力"]ここに本文を入力[/box03]</textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button10">ショートコードコピー</button></td><td class="copybtn"><button id="button11">ショートコードコピー</button></td><td class="copybtn"><button id="button12">ショートコードコピー</button></td></tr>';
	
	echo '<tr><td><div class="kaisetsu-box4"><p>ここにテキストを入力</p></div></td><td><div class="kaisetsu-box5">
<p>ここにテキストを入力</p></div></td><td><div class="innerlink-box1"><p>ここにテキストを入力</p></div></td></tr>';
	echo '<tr><th><textarea readonly id="textarea13">[box04 title="ここにタイトルを入力"]ここに本文を入力[/box04]</textarea></th><th><textarea readonly id="textarea14">[box05 title="ここにタイトルを入力"]ここに本文を入力[/box05]</textarea></th><th><textarea readonly id="textarea15">[box06 title="あわせて読みたい"]ここに本文を入力[/box06]</textarea></th></tr>';
	echo '<tr class="bb"><td class="copybtn"><button id="button13">ショートコードコピー</button></td><td class="copybtn"><button id="button14">ショートコードコピー</button></td><td class="copybtn"><button id="button15">ショートコードコピー</button></td></tr>';
	
	
	
	echo '</tbody></table>';
}
function save_mypostdesign_title($post_id){
	$my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;
	if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {
		return $post_id;
	}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	if(!current_user_can('edit_post', $post_id)) { return $post_id; }
		$data = isset($_POST['topic_title']) ? $_POST['topic_title'] : null;
		if(get_post_meta($post_id, 'topic_title') == ""){
			add_post_meta($post_id, 'topic_title', $data, true);
		}elseif($data != get_post_meta($post_id, 'topic_title', true)){
			update_post_meta($post_id, 'topic_title', $data);
		}elseif($data == ""){
			delete_post_meta($post_id, 'topic_title', get_post_meta($post_id, 'topic_title', true));
		}
}
add_action('admin_menu', 'add_mypostdesign_title');
add_action('save_post', 'save_mypostdesign_title');





function my_admin_style() {
	$simple_box1_c = get_theme_mod( 'simple_box1_c', '#ef9b9b');
	$simple_box2_c = get_theme_mod( 'simple_box2_c', '#f2bf7d');
	$simple_box3_c = get_theme_mod( 'simple_box3_c', '#b5e28a');
	$simple_box4_c = get_theme_mod( 'simple_box4_c', '#7badd8');
	$simple_box5_c = get_theme_mod( 'simple_box5_c', '#e896c7');
	$simple_box6_c = get_theme_mod( 'simple_box6_c', '#fffdef');
	$simple_box7_c = get_theme_mod( 'simple_box7_c', '#def1f9');
	$simple_box8_c = get_theme_mod( 'simple_box8_c', '#96ddc1');
	$simple_box9_c = get_theme_mod( 'simple_box9_c', '#e1c0e8');
	
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
	
	$kaisetsu_box1_c = get_theme_mod( 'kaisetsu_box1_c', '#ffb49e');
	$kaisetsu_box1_text = get_theme_mod( 'kaisetsu_box1_text', '要約リスト');
	$kaisetsu_box2_c = get_theme_mod( 'kaisetsu_box2_c', '#89c2f4');
	$kaisetsu_box2_text = get_theme_mod( 'kaisetsu_box2_text', '要約リスト');
	$kaisetsu_box3_text = get_theme_mod( 'kaisetsu_box3_text', 'ー 要約リスト ー');
	$kaisetsu_box4_c = get_theme_mod( 'kaisetsu_box4_c', '#ea91a9');
	$kaisetsu_box4_text = get_theme_mod( 'kaisetsu_box4_text', '要点まとめ');
	$kaisetsu_box5_c = get_theme_mod( 'kaisetsu_box5_c', '#57b3ba');
	$kaisetsu_box5_text = get_theme_mod( 'kaisetsu_box5_text', '要点まとめ');
	$innerlink_box1_c = get_theme_mod( 'innerlink_box1_c', '#73bc9b');
	
  echo '<style>
  .designsample .simple-box1 { border-color: ' . $simple_box1_c . ' !important;}
  .designsample .simple-box2 { border-color: ' . $simple_box2_c . ' !important;}
  .designsample .simple-box3 { border-color: ' . $simple_box3_c . ' !important;}
  .designsample .simple-box4 { border-color: ' . $simple_box4_c . ' !important;}
  .designsample .simple-box4:before { background-color: ' . $simple_box4_c . ' !important;}
  .designsample .simple-box5 { border-color: ' . $simple_box5_c . ' !important;}
  .designsample .simple-box5:before { background-color: ' . $simple_box5_c . ' !important;}
  .designsample .simple-box6 { background-color: ' . $simple_box6_c . ' !important;}
  .designsample .simple-box7 { border-color: ' . $simple_box7_c . ' !important;}
  .designsample .simple-box7:before { background-color: ' . $simple_box7_c . ' !important;}
  .designsample .simple-box8 { border-color: ' . $simple_box8_c . ' !important;}
  .designsample .simple-box8:before { background-color: ' . $simple_box8_c . ' !important;}
  .designsample .simple-box9:after { border-color: ' . $simple_box9_c . ' ' . $simple_box9_c . ' #fff #fff !important;}
  .designsample .simple-box9:before { background-color: ' . $simple_box9_c . '  !important;}
  .designsample .kaisetsu-box1:before,
  .designsample .kaisetsu-box1:after { background-color: ' . $kaisetsu_box1_c . ' !important;}
  .designsample .kaisetsu-box1:after{content:\"' . $kaisetsu_box1_text . '\"!important;}
  .designsample .kaisetsu-box2{ border-color: ' . $kaisetsu_box2_c . ' !important;}
  .designsample .kaisetsu-box2:after { background-color: ' . $kaisetsu_box2_c . ' !important;}
  .designsample .kaisetsu-box2:after{content:\"' . $kaisetsu_box2_text . '\"!important;}
  .designsample .kaisetsu-box3:after{content:\"' . $kaisetsu_box3_text . '\"!important;}
  .designsample .kaisetsu-box4{ border-color: ' . $kaisetsu_box4_c . ' !important;}
  .designsample .kaisetsu-box4:after { background-color: ' . $kaisetsu_box4_c . ' !important;}
  .designsample .kaisetsu-box4:after{content:\"' . $kaisetsu_box4_text . '\"!important;}
  .designsample .kaisetsu-box5:after,
  .designsample .kaisetsu-box5:before { background-color: ' . $kaisetsu_box5_c . ' !important;}
  .designsample .kaisetsu-box5:after{content:\"' . $kaisetsu_box5_text . '\"!important;}
  .designsample .concept-box1{ border-color: ' . $concept_box1_c . ' !important;}
  .designsample .concept-box1:after { background-color: ' . $concept_box1_c . ' !important;}
  .designsample .concept-box1:before{content:\"' . $concept_box1_text . '\"!important; color: ' . $concept_box1_c . ' !important;}
  .designsample .concept-box2{ border-color: ' . $concept_box2_c . ' !important;}
  .designsample .concept-box2:after { background-color: ' . $concept_box2_c . ' !important;}
  .designsample .concept-box2:before{content:\"' . $concept_box2_text . '\"!important; color: ' . $concept_box2_c . ' !important;}
  .designsample .concept-box3{ border-color: ' . $concept_box3_c . ' !important;}
  .designsample .concept-box3:after { background-color: ' . $concept_box3_c . ' !important;}
  .designsample .concept-box3:before{content:\"' . $concept_box3_text . '\"!important; color: ' . $concept_box3_c . ' !important;}
  .designsample .concept-box4{ border-color: ' . $concept_box4_c . ' !important;}
  .designsample .concept-box4:after { background-color: ' . $concept_box4_c . ' !important;}
  .designsample .concept-box4:before{content:\"' . $concept_box4_text . '\"!important; color: ' . $concept_box4_c . ' !important;}
  .designsample .concept-box5{ border-color: ' . $concept_box5_c . ' !important;}
  .designsample .concept-box5:after { background-color: ' . $concept_box5_c . ' !important;}
  .designsample .concept-box5:before{content:\"' . $concept_box5_text . '\"!important; color: ' . $concept_box5_c . ' !important;}
  .designsample .concept-box6{ border-color: ' . $concept_box6_c . ' !important;}
  .designsample .concept-box6:after { background-color: ' . $concept_box6_c . ' !important;}
  .designsample .concept-box6:before{content:\"' . $concept_box6_text . '\"!important; color: ' . $concept_box6_c . ' !important;}
  .designsample .innerlink-box1{ border-color: ' . $innerlink_box1_c . ' !important;}
  .designsample .innerlink-box1:after { background-color: ' . $innerlink_box1_c . ' !important; border-color: ' . $innerlink_box1_c . ' !important;}
  .designsample .innerlink-box1:before { background-color: ' . $innerlink_box1_c . ' !important;}
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');



?>