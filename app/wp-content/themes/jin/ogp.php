<!-- ここからOGP -->
<meta property="og:type" content="blog">
<?php
	global $post;
	if( is_single() || is_page() ){
		$description = get_post_meta($post->ID, 'post_desc', true);
		$use_excerpt = $post->post_excerpt;
	}
	$description_home = get_theme_mod('desc_text');
	//セパレーターの初期値設定
	function jin_default_sepalater_ogp(){
	  return get_option( 'seo_title_sepalater',"｜");//第1引数にID、第2引数にデフォルト値を設定する
	}
	$sepalater = jin_default_sepalater_ogp();
	
?>
<?php if ( is_home()) : ?>
<meta property="og:title" content="<?php bloginfo('name'); ?><?php if(! get_bloginfo('description') == null){ echo $sepalater;} ?><?php bloginfo('description'); ?>">
<meta property="og:url" content="<?php bloginfo('url'); ?>">
<?php if( ! $description_home == null ): ?>
<meta property="og:description" content="<?php echo $description_home; ?>">
<?php else: ?>
<meta property="og:description" content="">
<?php endif; ?>
<?php elseif ( is_front_page()) : ?>
<?php if( ! get_post_meta($post->ID, 'jin_seotitle',true) == null ) :?>
<meta property="og:title" content="<?php echo get_post_meta($post->ID, 'jin_seotitle',true); ?>"> 
<?php else: ?>
<meta property="og:title" content="<?php bloginfo('name'); ?><?php if(! get_bloginfo('description') == null){ echo $sepalater;} ?><?php bloginfo('description'); ?>">
<?php endif; ?>
<meta property="og:url" content="<?php bloginfo('url'); ?>">
<?php if( isset( $description ) && ! $description == null ): ?>
<meta property="og:description" content="<?php echo $description ?>"> 
<?php elseif( ! $description_home == null ): ?>
<meta property="og:description" content="<?php echo $description_home; ?>">
<?php elseif( ! empty($use_excerpt) ) : ?>
<meta property="og:description" content="<?php echo $use_excerpt; ?>" > 
<?php else: ?>
<meta property="og:description" content="<?php echo jin_auto_desc_func(); ?>"> 
<?php endif; ?>
<?php elseif ( is_singular() ): ?>
<?php if( ! get_post_meta($post->ID, 'jin_seotitle',true) == null ) :?>
<meta property="og:title" content="<?php echo get_post_meta($post->ID, 'jin_seotitle',true); ?><?php echo $sepalater; ?><?php bloginfo('name'); ?>"> 
<?php else: ?>
<meta property="og:title" content="<?php the_title(); ?><?php echo $sepalater; ?><?php bloginfo('name'); ?>"> 
<?php endif; ?>
<meta property="og:url" content="<?php the_permalink(); ?>"> 
<?php if( ! $description == null ): ?>
<meta property="og:description" content="<?php echo $description ?>"> 
<?php elseif( ! empty($use_excerpt) ) : ?>
<meta property="og:description" content="<?php echo $use_excerpt; ?>" > 
<?php else: ?>
<meta property="og:description" content="<?php echo jin_auto_desc_func(); ?>"> 
<?php endif; ?>
<?php elseif(is_404()) :?>
<meta property="og:title" content="<?php bloginfo('name'); ?>">
<meta property="og:url" content="<?php bloginfo('url'); ?>">
<meta property="og:description" content="記事がありません">
<?php elseif(is_tag()) :?>
<?php $postTag = get_the_tags(); $url = get_tag_link( $postTag[0]->term_id );?>
<meta property="og:title" content="<?php esc_html(single_cat_title()); ?>タグの記事一覧<?php echo $sepalater; ?><?php bloginfo('name'); ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<?php elseif(is_category()) :?>
<?php else :?>
<meta property="og:title" content="<?php bloginfo('name'); ?><?php echo $sepalater; ?><?php bloginfo('description'); ?>">
<meta property="og:url" content="<?php bloginfo('url'); ?>">
<meta property="og:description" content="<?php echo $description_home; ?>">
<?php endif; ?>
<?php
if( isset($post->post_content) ){
	$str = $post->post_content;
}
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる

?>
<?php if ( is_front_page()) : ?>
<?php if( get_the_ogp_image_url()): ?>
<meta property="og:image" content="<?php echo get_the_ogp_image_url(); ?>">
<?php elseif( get_the_top_image_url() ):?>
<meta property="og:image" content="<?php echo get_the_top_image_url(); ?>">
<?php else:?>
<meta property="og:image" content="<?php bloginfo('template_url');?>/img/noimg320.png">
<?php endif;?>
<?php elseif ( is_category() ): ?>
<?php
	$t_id = get_category( intval( get_query_var('cat') ) )->term_id;
	$cat_class = get_category($t_id);
	$cat_option = get_option($t_id);

	if( is_array($cat_option) ){
	  $cat_option = array_merge(array('cont'=>''),$cat_option);
	}
	if( ! empty($cat_option['cps_image_cat_pickup']) ){
		$cat_eyecatch = $cat_option['cps_image_cat_pickup'];
		$cat_custom_title = $cat_option['cps_meta_title'];
	}
?>
<?php if( ! empty( $cat_custom_title ) ) :?>
<meta property="og:title" content="<?php echo $cat_option['cps_meta_title']; ?><?php echo $sepalater; ?><?php bloginfo('name'); ?>">
<?php else:?>
<meta property="og:title" content="<?php echo cps_category_title() ?><?php echo $sepalater; ?><?php bloginfo('name'); ?>">
<?php endif;?>
<meta property="og:url" content="<?php echo get_category_link( get_query_var('cat') ); ?>">
<meta property="og:description" content="<?php cps_category_desc() ?>">
<?php if( ! empty( $cat_eyecatch ) ) :?>
<meta property="og:image" content="<?php cps_category_eyecatch_pickup(); ?>">
<?php else:?>
<?php if ( preg_match( $searchPattern, $str, $imgurl ) ) :?>
<meta property="og:image" content="<?php echo $imgurl[2] ?>">
<?php else:?>
<meta property="og:image" content="<?php echo get_the_top_image_url(); ?>">
<?php endif;?>
<?php endif;?>
<?php elseif ( is_singular() ): ?>
<?php if (has_post_thumbnail()) :?>
<?php 
	$image_id = get_post_thumbnail_id();
	$image = wp_get_attachment_image_src( $image_id, 'full');
?>
<meta property="og:image" content="<?php echo $image[0] ?>">
<?php elseif ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) :?>
<meta property="og:image" content="<?php echo $imgurl[2] ?>">
<?php else:?>
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
<?php endif; ?>
<?php else:?>
<?php if( get_the_ogp_image_url()): ?>
<meta property="og:image" content="<?php echo get_the_ogp_image_url(); ?>">
<?php elseif ( preg_match( $searchPattern, $str, $imgurl ) ) :?>
<meta property="og:image" content="<?php echo $imgurl[2] ?>">
<?php else:?>
<meta property="og:image" content="<?php bloginfo('template_url');?>/img/noimg320.png">
<?php endif;?>
<?php endif;?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="fb:admins" content="<?php echo get_the_fb_code(); ?>">
<meta name="twitter:card" content="<?php echo is_tw_type(); ?>">
<?php if( ! is_tw_name() == '' ) : ?>
<meta name="twitter:site" content="<?php echo is_tw_name(); ?>">
<?php endif; ?>
<!-- ここまでOGP -->