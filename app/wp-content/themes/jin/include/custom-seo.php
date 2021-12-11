<?php
// create custom plugin settings menu
add_action('admin_menu', 'custom_jin_seo');

function custom_jin_seo() {

	//create new top-level menu
	add_menu_page('SEO設定', 'SEO設定', 'administrator', __FILE__, 'custom_jinsetting_seo','dashicons-admin-generic',24);

	//call register settings function
	add_action( 'admin_init', 'register_jinsetting_seo' );
}


function register_jinsetting_seo() {
	//register our settings
	register_setting( 'seo-jinsettings-group', 'seo_category_all_noindex' );
	register_setting( 'seo-jinsettings-group', 'seo_tag_all_noindex' );
	register_setting( 'seo-jinsettings-group', 'seo_category_paged_all_noindex' );
	register_setting( 'seo-jinsettings-group', 'seo_tag_paged_all_noindex' );
	register_setting( 'seo-jinsettings-group', 'seo_paged_all_noindex' );
	
	register_setting( 'seo-jinsettings-group', 'seo_category_index' );
	register_setting( 'seo-jinsettings-group', 'seo_tag_index' );
	register_setting( 'seo-jinsettings-group', 'seo_title_sepalater' );
}

function custom_jinsetting_seo() {
?>
<div class="wrap">
<h2>SEO設定</h2>

<form method="post" action="options.php">
    
    <?php settings_fields( 'seo-jinsettings-group' ); ?>
    <?php do_settings_sections( 'seo-jinsettings-group' ); ?>
    
	<h2>【カテゴリー一覧ページをnoindex / 一括設定】</h2>
    <table>
        <tr>
			<td><input type="checkbox" name="seo_category_all_noindex" <?php checked(get_option('seo_category_all_noindex'), "all_noindex"); ?> value="all_noindex"> noindexにする</td>
        </tr>
    </table>
	
    <p>除外したいカテゴリーIDを半角数字で入力。（例：1,4,6）</p>
    <table>
        <tr>
			<td><input type="text" name="seo_category_index" value="<?php echo esc_attr( get_option('seo_category_index') ); ?>"></td>
        </tr>
    </table>
	
	<h2>【タグ一覧ページをnoindex / 一括設定】</h2>
    <table>
        <tr>
			<td><input type="checkbox" name="seo_tag_all_noindex" <?php checked(get_option('seo_tag_all_noindex'), "all_noindex"); ?> value="all_noindex"> noindexにする</td>
        </tr>
    </table>
    
    <p>除外したいタグIDを半角数字で入力。（例：1,4,6）</p>
    <table>
        <tr>
			<td><input type="text" name="seo_tag_index" value="<?php echo esc_attr( get_option('seo_tag_index') ); ?>"></td>
        </tr>
    </table>
	
	<h2>【TOP記事一覧の２ページ目以降のnoindex設定】</h2>
    <table>
        <tr>
			<td><input type="checkbox" name="seo_paged_all_noindex" <?php checked(get_option('seo_paged_all_noindex'), "all_noindex"); ?> value="all_noindex"> noindexにする</td>
        </tr>
    </table>
	
	<h2>【カテゴリー記事一覧の２ページ目以降のnoindex設定】</h2>
    <table>
        <tr>
			<td><input type="checkbox" name="seo_category_paged_all_noindex" <?php checked(get_option('seo_category_paged_all_noindex'), "all_noindex"); ?> value="all_noindex"> noindexにする</td>
        </tr>
    </table>
	
	<h2>【タグ記事一覧の２ページ目以降のnoindex設定】</h2>
    <table>
        <tr>
			<td><input type="checkbox" name="seo_tag_paged_all_noindex" <?php checked(get_option('seo_tag_paged_all_noindex'), "all_noindex"); ?> value="all_noindex"> noindexにする</td>
        </tr>
    </table>
	
	<h2>【タイトルのセパレーター設定】</h2>
	<p>「記事タイトル｜ブログタイトル」の「｜」を変更できます。</p>
    <table>
        <tr>
			<td><input type="text" name="seo_title_sepalater" value="<?php echo get_option('seo_title_sepalater','｜'); ?>"></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>