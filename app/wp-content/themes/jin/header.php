<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php get_template_part('ogp'); ?>

	<?php if (is_home()) : ?>
		<?php if (!get_theme_mod('desc_text') == "") : ?>
			<meta name="description" itemprop="description" content="<?php echo get_theme_mod('desc_text'); ?>">
		<?php endif; ?>
	<?php elseif (is_front_page()) : ?>
		<?php if (!get_post_meta($post->ID, 'post_desc', true) == null) : ?>
			<meta name="description" itemprop="description" content="<?php echo get_post_meta($post->ID, 'post_desc', true) ?>">
		<?php elseif (!get_theme_mod('desc_text') == "") : ?>
			<meta name="description" itemprop="description" content="<?php echo get_theme_mod('desc_text'); ?>">
		<?php elseif (!empty($post->post_excerpt)) : ?>
			<meta name="description" itemprop="description" content="<?php echo $post->post_excerpt; ?>">
		<?php else : ?>
			<meta name="description" itemprop="description" content="<?php echo jin_auto_desc_func(); ?>">
		<?php endif; ?>
	<?php elseif (is_single() || is_page()) : ?>
		<?php if (!get_post_meta($post->ID, 'post_desc', true) == null) : ?>
			<meta name="description" itemprop="description" content="<?php echo get_post_meta($post->ID, 'post_desc', true) ?>">
		<?php elseif (!empty($post->post_excerpt)) : ?>
			<meta name="description" itemprop="description" content="<?php echo $post->post_excerpt; ?>">
		<?php else : ?>
			<meta name="description" itemprop="description" content="<?php echo jin_auto_desc_func(); ?>">
		<?php endif; ?>
	<?php elseif (is_category()) : ?>
		<meta name="description" itemprop="description" content="<?php cps_category_desc(); ?>">
	<?php endif; ?>
	<?php if (is_single() || is_page()) : ?>
		<?php if (!get_post_meta($post->ID, 'jin_keyword', true) == null) : ?>
			<meta name="keywords" itemprop="keywords" content="<?php echo get_post_meta($post->ID, 'jin_keyword', true) ?>">
		<?php endif; ?>
	<?php endif; ?>
	<?php if (!has_site_icon()) : ?>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
	<?php endif; ?>
	<?php if (is_singular('cta')) : ?>
		<meta name="robots" content="noindex">
	<?php endif; ?>
	<?php if (is_single() || is_page()) : ?>
		<?php if (!get_post_meta($post->ID, 'post_noindex', true) == null) : ?>
			<meta name="robots" content="noindex">
		<?php endif; ?>
	<?php endif; ?>
	<?php if (is_category() && get_option('seo_category_all_noindex') == "all_noindex") : ?>
		<?php if (get_option('seo_category_index') == null) : ?>
			<meta name="robots" content="noindex">
		<?php else : ?>
			<?php
			$cat_id = strval(get_query_var('cat'));
			$noindex_cat_id_each = explode(",", get_option('seo_category_index'));
			if (!in_array($cat_id, $noindex_cat_id_each)) {
				echo '<meta name="robots" content="noindex">';
			}
			?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (is_tag() && get_option('seo_tag_all_noindex') == "all_noindex") : ?>
		<?php if (get_option('seo_tag_index') == null) : ?>
			<meta name="robots" content="noindex">
		<?php else : ?>
			<?php
			$tag_id = strval(get_query_var('tag_id'));
			$noindex_tag_id_each = explode(",", get_option('seo_tag_index'));
			if (!in_array($tag_id, $noindex_tag_id_each)) {
				echo '<meta name="robots" content="noindex">';
			}
			?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (is_home() && is_paged() && get_option('seo_paged_all_noindex') == "all_noindex") : ?>
		<meta name="robots" content="noindex">
	<?php endif; ?>
	<?php if (is_category() && is_paged() && get_option('seo_category_paged_all_noindex') == "all_noindex") : ?>
		<meta name="robots" content="noindex">
	<?php endif; ?>
	<?php if (is_tag() && is_paged() && get_option('seo_tag_paged_all_noindex') == "all_noindex") : ?>
		<meta name="robots" content="noindex">
	<?php endif; ?>

	<?php wp_head(); ?>

	<!--カエレバCSS-->
	<?php if (!get_option('kaereba_design') == null) : ?>
		<link href="<?php echo get_template_directory_uri() . '/css/kaereba.css' ?>" rel="stylesheet" />
	<?php endif; ?>
	<!--アプリーチCSS-->
	<?php if (!get_option('appreach_design') == null) : ?>
		<link href="<?php echo get_template_directory_uri() . '/css/appreach.css' ?>" rel="stylesheet" />
	<?php endif; ?>

	<?php if (!get_option('space_head') == null) : ?>
		<?php echo get_option('space_head'); ?>
	<?php endif; ?>

</head>

<body <?php body_class(); ?> id="<?php echo is_font_style(); ?>">
	<div id="wrapper">

		<?php if (is_mobile()) : ?>
			<span class="headsearch jin-sp-design <?php is_animation_style(); ?> <?php is_top_navi_sc_display(); ?>">
				<?php get_search_form(); ?>
			</span>
			<?php if (has_nav_menu('glonavi')) : ?>
				<input type="checkbox" class="jin-sp-design" id="navtoggle">
				<label for="navtoggle" class="sp-menu-open <?php is_sp_header_fix(); ?>"><span class="cps-icon-bar <?php is_animation_style(); ?>"></span><span class="cps-icon-bar <?php is_animation_style(); ?>"></span><span class="cps-icon-bar <?php is_animation_style(); ?>"></span></label>
				<label for="navtoggle" class="sp-menu-close <?php is_sp_header_fix(); ?>"></label>


				<div class="sp-menu-box">
					<div class="sp-menu-title ef">MENU</div>
					<?php wp_nav_menu(array(
						'theme_location' => 'glonavi',
						'container'      => 'nav',
						'container_class' => 'fixed-content ef',
						'items_wrap'     => '<ul class="menu-box">%3$s</ul>'
					));
					?>
					<?php if (get_theme_mod('top_navi_sns_display') == "tn_sns_on") : ?>
						<div class="sp-sns-menu">
							<ul>
								<?php if (get_option('tw_page_url')) : ?>
									<li class="pro-tw"><a href="<?php echo get_option('tw_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-twitter"></i></a></li>
								<?php endif; ?>
								<?php if (get_option('fb_page_url')) : ?>
									<li class="pro-fb"><a href="<?php echo get_option('fb_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if (get_option('insta_page_url')) : ?>
									<li class="pro-insta"><a href="<?php echo get_option('insta_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if (get_option('youtube_page_url')) : ?>
									<li class="pro-youtube"><a href="<?php echo get_option('youtube_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if (get_option('line_page_url')) : ?>
									<li class="pro-line"><a href="<?php echo get_option('line_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a></li>
								<?php endif; ?>
								<?php if (get_option('contact_page_url')) : ?>
									<li class="pro-contact"><a href="<?php echo get_option('contact_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-mail" aria-hidden="true"></i></a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		<?php endif; ?>

		<div id="scroll-content" class="<?php is_animation_style(); ?>">

			<!--ヘッダー-->

			<?php if (is_header_design() == 'header_style1') : ?>
				<?php get_template_part('include/headerstyle/header-style1'); ?>
			<?php elseif (is_header_design() == 'header_style2') : ?>
				<?php get_template_part('include/headerstyle/header-style2'); ?>
			<?php elseif (is_header_design() == 'header_style3') : ?>
				<?php get_template_part('include/headerstyle/header-style3'); ?>
			<?php elseif (is_header_design() == 'header_style4') : ?>
				<?php get_template_part('include/headerstyle/header-style4'); ?>
			<?php elseif (is_header_design() == 'header_style5') : ?>
				<?php get_template_part('include/headerstyle/header-style5'); ?>
			<?php elseif (is_header_design() == 'header_style6') : ?>
				<?php get_template_part('include/headerstyle/header-style6'); ?>
			<?php elseif (is_header_design() == 'header_style7') : ?>
				<?php get_template_part('include/headerstyle/header-style7'); ?>
			<?php elseif (is_header_design() == 'header_style8') : ?>
				<?php get_template_part('include/headerstyle/header-style8'); ?>
			<?php elseif (is_header_design() == 'header_style9') : ?>
				<?php get_template_part('include/headerstyle/header-style9'); ?>
			<?php elseif (is_header_design() == 'header_style10') : ?>
				<?php get_template_part('include/headerstyle/header-style10'); ?>
			<?php elseif (is_header_design() == 'header_style11') : ?>
				<?php get_template_part('include/headerstyle/header-style11'); ?>
			<?php endif; ?>

			<!--ヘッダー-->

			<div class="clearfix"></div>

			<?php if (!is_page_template('lp.php')) : ?>

				<?php if (is_home() || is_front_page()) : ?>
					<?php get_template_part('include/head/pickup-contents'); ?>
				<?php else : ?>
					<?php if (is_pickup_child() == 'child_none') : ?>
					<?php else : ?>
						<?php get_template_part('include/head/pickup-contents'); ?>
					<?php endif; ?>
				<?php endif; ?>

			<?php endif; ?>