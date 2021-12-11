<?php

add_action ( 'category_edit_form_fields', 'cps_custom_category');
function cps_custom_category( $tag ) {
	$ctm_id = $tag->term_id;
	$cat_meta = get_option( $ctm_id );
	$meta_noindex_array = ( isset($cat_meta['cps_meta_noindex']) ) ? $cat_meta['cps_meta_noindex'] : "";
	$meta_none_cta_array = ( isset($cat_meta['cps_none_cta']) ) ? $cat_meta['cps_none_cta'] : "";
	$cps_image_cat = ( ! isset( $cat_meta['cps_image_cat'] ) || $cat_meta['cps_image_cat'] == '') ? "" :  $cat_meta['cps_image_cat'];
	$cps_image_cat_pickup = ( ! isset( $cat_meta['cps_image_cat_pickup'] ) || $cat_meta['cps_image_cat_pickup'] == '') ? "" :  $cat_meta['cps_image_cat_pickup'];
	
	wp_enqueue_media(); // メディアアップローダー用のスクリプトをロードする

		// カスタムメディアアップローダー用のJavaScript
		wp_enqueue_script(
			'my-media-uploader', get_bloginfo( 'template_directory' ) . '/js/cps-media-uploader.js', array('jquery'), false, false
		);

?>
	<style type="text/css">
			#media{
				margin-top: 10px;
			}
			#media-cat img{
				width: 100%;
				max-width: 640px;
				height: auto;
				display: block;
			}
			input, button, textarea, select {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				cursor: pointer;
			}
			input[type="button"]{
				padding: 10px;
				font-size: 12px;
				background: #eee;
				border: 3px #aaa solid;
			}
		</style>


	<tr class="form-field">
		<th style="border-bottom: 2px solid #ccc; font-size: 21px;" colspan="2">ここからはこのカテゴリー一覧に表示させる記事です。<span style="font-size: 14px; font-weight: normal; color: #888;">※未入力にすると普通のカテゴリー一覧表示となります。</span></th>
	</tr>
	<tr class="form-field">
		<th>ページタイトル（検索エンジン用）</th>
		<td><input type="text" name="cps_meta[cps_meta_title]" id="cps_meta_title" size="25" value="<?php if( isset ( $cat_meta['cps_meta_title'])) echo esc_html($cat_meta['cps_meta_title'] ) ?>" /></td>
	</tr>
	<tr class="form-field">
		<th>本文</th>
		<td>
		<?php $cps_meta_content = ''; ?>
		<?php $cat_content_text = (isset($cat_meta['cps_meta_content'])) ? $cat_meta['cps_meta_content'] : "" ; wp_editor( stripslashes($cat_content_text), 'cps_meta_content', array( 'media_buttons'=>true, 'textarea_name'=>'cps_meta[cps_meta_content]','textarea_rows'=>10,'tiny_mce'=>true) ); ?>
		</td>
	</tr>
	<input class="cps-image-cat" id="cps_image_cat" type="hidden" name="cps_meta[cps_image_cat]" value="<?php echo esc_attr($cps_image_cat); ?>" />
	<input class="cps-image-cat-pickup" id="cps_image_cat_pickup" type="hidden" name="cps_meta[cps_image_cat_pickup]" value="<?php echo esc_attr($cps_image_cat_pickup); ?>" />
	<tr style="margin-top: 10px">
		<th><label for="cagetory_color">カテゴリーのアイキャッチ画像</label></th>
		<td style="padding-bottom: 0; padding-left: 11px;"><div id="media-cat"><img src="<?php echo $cps_image_cat; ?>" /></div></td>
	</tr>
	<tr style="margin-top: 0px">
		<th><label for="cagetory_color"></label></th>
		<td style="padding-top: 5px;"><input type="button" name="media-cat" value="画像を選択" /><input type="button" name="media-cat-clear" value="画像をクリア" /></td>
	</tr>
	<tr class="form-field">
		<th><label for="cagetory_color">カテゴリーの色</label></th>
		<td><input type="text" name="cps_meta[cps_meta_category_color]" class="myColorPicker" id="cagetory_color" size="25" value="<?php if(isset ( $cat_meta['cps_meta_category_color'])) echo esc_html($cat_meta['cps_meta_category_color']) ?>" /></td>
	</tr>
	<tr class="form-field">
		<th>このカテゴリー記事に表示するCTA（CTAページの記事IDを入力）</th>
		<td><input type="text" name="cps_meta[cps_meta_cta]" id="cps_meta_cta" size="5" value="<?php if( isset ( $cat_meta['cps_meta_cta'])) echo esc_html($cat_meta['cps_meta_cta'] ) ?>" /></td>
	</tr>
	<tr class="form-field">
		<td><input type="hidden" name="cps_meta[cps_meta_category]" value="<?php echo $ctm_id ?>" /></td>
	</tr>
	<tr class="form-field">
		<th>カテゴリー一覧ページにCTAを表示しない</th>
		<td>
			<ul>
				<li>
					<input type="hidden" name="cps_meta[cps_none_cta][0]" value="">
					<input class="cmb_option" type="checkbox" name="cps_meta[cps_none_cta][0]" id="cps_none_cta1" value="CTAを非表示にする"  <?php echo (isset($meta_none_cta_array) && is_array($meta_none_cta_array) && in_array('CTAを非表示にする', $meta_none_cta_array)) ? 'checked' : '';?> /> <label for="cps_none_cta1">CTAを非表示にする</label>
				</li>
			</ul>
		</td>
	</tr>
	<tr class="form-field">
		<th>description設定</th>
		<td><textarea type="text" name="cps_meta[cps_meta_desc]" id="cps_meta_desc"><?php if( isset ( $cat_meta['cps_meta_desc'])) echo esc_html($cat_meta['cps_meta_desc'] ) ?></textarea></td>
	</tr>

<?php
}


add_action ( 'edited_term', 'cps_save_custom_category');
function cps_save_custom_category( $term_id ) {
	if ( isset( $_POST['cps_meta'] ) ) {
		$ctm_id = preg_replace('/[\x00-\x1f\x7f]/', '', $term_id);
		$cat_meta = get_option($ctm_id);
		$cat_keys = array_keys($_POST['cps_meta']);

		foreach ( $cat_keys as $key ){
			if ( isset($_POST['cps_meta'][$key]) ){
				$cat_meta[$key] = $_POST['cps_meta'][$key];
			}
		}
		update_option( $ctm_id, $cat_meta );
	}
}



?>