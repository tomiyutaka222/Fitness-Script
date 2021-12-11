<?php
// create custom plugin settings menu
add_action('admin_menu', 'custom_my_space');

function custom_my_space() {

	//create new top-level menu
	add_menu_page('HTMLタグ設定', 'HTMLタグ設定', 'administrator', __FILE__, 'custom_setting_space','dashicons-editor-code',23);

	//call register settings function
	add_action( 'admin_init', 'register_mysettings_space' );
}


function register_mysettings_space() {
	//register our settings
	register_setting( 'space-settings-group', 'space_head' );
	register_setting( 'space-settings-group', 'space_body' );
}

function custom_setting_space() {
?>
<div class="wrap">
<h2>HTMLタグ設定</h2>
<form method="post" action="options.php">
    
    <?php settings_fields( 'space-settings-group' ); ?>
    <?php do_settings_sections( 'space-settings-group' ); ?>
    
    
    <h2>【head内】</h2>
    <p>Google Analytics、Google AdSense、SearchConsoleなど計測タグを挿入できます。複数貼り付ける場合は、改行して連続で貼り付けてもらって結構です。</p>
    <table>
        <tr>
			<td><textarea type="text" name="space_head" cols="60" rows="12" ><?php echo esc_attr( get_option('space_head') ); ?></textarea></td>
        </tr>
    </table>
    
    <h2>【bodyタグの終わり】</h2>
    <p>Ptengineのようなbody内にタグ挿入するタイプの計測ツールを利用する場合にお使いください。</p>
    <table>
        <tr>
			<td><textarea type="text" name="space_body" cols="60" rows="12" ><?php echo esc_attr( get_option('space_body') ); ?></textarea></td>
        </tr>
    </table>
    
    
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>