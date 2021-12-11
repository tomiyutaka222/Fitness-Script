<?php

add_action('admin_menu', 'cps_custom_my_ad');

function cps_custom_my_ad() {

	add_menu_page('custom-ad', '広告管理', 'administrator', __FILE__, 'cps_custom_setting_ad','dashicons-money',23);
	add_action( 'admin_init', 'cps_register_mysettings' );
}


function cps_register_mysettings() {

	register_setting( 'ad-settings-group', 'ad_setting_text' );
	
	register_setting( 'ad-settings-group', 'ad_single_pc_left' );
	register_setting( 'ad-settings-group', 'ad_single_pc_right' );
	register_setting( 'ad-settings-group', 'ad_single_sp' );
	
	register_setting( 'ad-settings-group', 'ad_single_h1_pc' );
	register_setting( 'ad-settings-group', 'ad_single_h1_sp' );
	
	register_setting( 'ad-settings-group', 'ad_single_h2_pc' );
	register_setting( 'ad-settings-group', 'ad_single_h2_sp' );
	
	register_setting( 'ad-settings-group', 'ad_related_unit' );
	
	register_setting( 'ad-settings-group', 'ad_related_pc_left' );
	register_setting( 'ad-settings-group', 'ad_related_pc_right' );
	register_setting( 'ad-settings-group', 'ad_related_sp' );
	
	register_setting( 'ad-settings-group', 'ad_infeed_pc_num' );
	register_setting( 'ad-settings-group', 'ad_infeed_sp_num' );
	register_setting( 'ad-settings-group', 'ad_infeed_magazine' );
	register_setting( 'ad-settings-group', 'ad_infeed_basic' );
	register_setting( 'ad-settings-group', 'ad_infeed_sp' );
	
}

function cps_custom_setting_ad() {
?>
<div class="wrap">
<h2>広告管理</h2>

<form method="post" action="options.php">
    
    <?php settings_fields( 'ad-settings-group' ); ?>
    <?php do_settings_sections( 'ad-settings-group' ); ?>
    
    <h2>【広告表示の記載テキスト】</h2>
   	<p>ここに入力した文字が広告の上部に記載されます。</p>
   	<table>
        <tr>
			<th style="padding:20px;">【入力例】スポンサーリンク</th>
			<td><input type="text" name="ad_setting_text" value="<?php echo esc_attr( get_option('ad_setting_text') ); ?>" ></td>
        </tr>
    </table>
    
    
    <h2>【記事タイトルの下に表示される広告】</h2>
    <p>入力欄に広告コードを貼り付けてください。</p>
    <table>
        <tr>
			<th></th>
			<th style="padding:10px;">広告</th>
		</tr>
        <tr>
			<th style="padding:20px;">PC</th>
			<td><textarea type="text" name="ad_single_h1_pc" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_h1_pc') ); ?></textarea></td>
        </tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><textarea type="text" name="ad_single_h1_sp" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_h1_sp') ); ?></textarea></td>
        </tr>
    </table>
    
    <h2>【最初の見出し２の上に表示される広告】</h2>
    <p>入力欄に広告コードを貼り付けてください。</p>
    <table>
        <tr>
			<th></th>
			<th style="padding:10px;">広告（ 【PC】336x280　【スマホ】300x250 のサイズがおすすめ）</th>
		</tr>
        <tr>
			<th style="padding:20px;">PC</th>
			<td><textarea type="text" name="ad_single_h2_pc" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_h2_pc') ); ?></textarea></td>
        </tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><textarea type="text" name="ad_single_h2_sp" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_h2_sp') ); ?></textarea></td>
        </tr>
    </table>
    
    <h2>【記事下に表示される広告】</h2>
    <p>入力欄に広告コードを貼り付けてください。</p>
    <table>
        <tr>
			<th></th>
			<th style="padding:10px;">広告①（ 300x250 のサイズがおすすめ）</th>
			<th style="padding:10px;">広告②（ 300x250 のサイズがおすすめ）</th>
		</tr>
        <tr>
			<th style="padding:20px;">PC</th>
			<td><textarea type="text" name="ad_single_pc_left" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_pc_left') ); ?></textarea></td>
			<td><textarea type="text" name="ad_single_pc_right" cols="60" rows="12"><?php echo esc_attr( get_option('ad_single_pc_right') ); ?></textarea></td>
        </tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><textarea type="text" name="ad_single_sp" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_single_sp') ); ?></textarea></td>
        </tr>
    </table>
	
	<h2>【関連コンテンツユニット】</h2>
    <p>入力欄に広告コードを貼り付けてください。</p>
    <table>
        <tr>
			<th></th>
			<th style="padding:10px;">広告コード</th>
		</tr>
        <tr>
			<th style="padding:20px;">　　　</th>
			<td><textarea type="text" name="ad_related_unit" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_related_unit') ); ?></textarea></td>
        </tr>
    </table>
    
    <h2>【関連記事下に表示される広告】</h2>
    <p>入力欄に広告コードを貼り付けてください。</p>
    <table>
        <tr>
			<th></th>
			<th style="padding:10px;">広告①（ 300x250 のサイズがおすすめ）</th>
			<th style="padding:10px;">広告②（ 300x250 のサイズがおすすめ）</th>
		</tr>
        <tr>
			<th style="padding:20px;">PC</th>
			<td><textarea type="text" name="ad_related_pc_left" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_related_pc_left') ); ?></textarea></td>
			<td><textarea type="text" name="ad_related_pc_right" cols="60" rows="12"><?php echo esc_attr( get_option('ad_related_pc_right') ); ?></textarea></td>
        </tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><textarea type="text" name="ad_related_sp" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_related_sp') ); ?></textarea></td>
        </tr>
    </table>
	
	
	<h2>【インフィード広告】</h2>
    <p>トップページの記事一覧に表示されます。設定方法は<a href="https://jin-theme.com/manual/jin-infeedad/" target="_blank">こちら</a>。</p>
    <table>
    	<tr>
			<th style="padding:10px;" colspan="2">広告の表示箇所【半角数字で入力】</th>
			<th></th>
		</tr>
    	<tr>
			<th style="padding:20px;">PC</th>
			<td><input type="text" name="ad_infeed_pc_num" size="50%" value="<?php echo esc_attr( get_option('ad_infeed_pc_num') ); ?>" /></td>
        </tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><input type="text" name="ad_infeed_sp_num" size="50%" value="<?php echo esc_attr( get_option('ad_infeed_sp_num') ); ?>" /></td>
        </tr>
        <tr>
			<th></th>
			<th style="padding:10px;">広告タグ（ マガジンスタイル用 ）</th>
			<th style="padding:10px;">広告タグ（ ベーシックスタイル用 ）</th>
		</tr>
        <tr>
			<th style="padding:20px;">PC</th>
			<td><textarea type="text" name="ad_infeed_magazine" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_infeed_magazine') ); ?></textarea></td>
			<td><textarea type="text" name="ad_infeed_basic" cols="60" rows="12"><?php echo esc_attr( get_option('ad_infeed_basic') ); ?></textarea></td>
        </tr>
        <tr>
			<th></th>
			<th style="padding:10px;">広告タグ（ マガジンスタイル用 ）</th>
			<th style="padding:10px;">広告タグ（ ベーシックスタイル用 ）</th>
		</tr>
        <tr>
			<th style="padding:20px;">スマホ</th>
			<td><textarea readonly style="text-align: center;" type="text" name="" cols="60" rows="12" >
				

				

				
Google AdSenseの表示規定により未対応</textarea></td>
			<td><textarea type="text" name="ad_infeed_sp" cols="60" rows="12" ><?php echo esc_attr( get_option('ad_infeed_sp') ); ?></textarea></td>
        </tr>
    </table>
    
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>