<div id="header-box" class="<?php is_top_navi_display(); ?> header-box <?php is_animation_style(); ?>">
	<div id="header" class="header-type1 header <?php is_animation_style(); ?>">
		<?php if (is_mobile()) : ?>


			<div id="site-info" class="ef">
				<?php if (get_topnavi_logo_image_url()) : ?>
					<span class="sp-logo-size"><a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'><img src='<?php echo get_topnavi_logo_image_url(); ?>' alt='<?php is_topnavi_logo_alt(); ?>'></a></span>
				<?php else : ?>
					<?php if (empty(is_title_text())) : ?>
						<span class="sp-logo-size"><a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'><?php bloginfo('name'); ?></a></span>
					<?php else : ?>
						<span class="sp-logo-size"><a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'><?php echo is_title_text(); ?></a></span>
					<?php endif; ?>
				<?php endif; ?>
			</div>

		<?php else : ?>
			<!-- 元にあったHeader要素の内容を削除 -->
			<div class="site-info">
				<div class="header-nav-content">
					<a href="<?php echo esc_url(home_url('/')); ?>;">HOME</a>
					<span> | </span>
					<a href="">CONTACT</a>
				</div>
				<!-- TODO 画像の表示方法, カテゴリの画像を取得してくる -->
				<div class="header-image-content">
					<img src="wp-content/themes/jin/img/header-min.png" alt="FitnessScript">
				</div>
				<div class="header-category-content">
					<div class="category-content">
						<img src="wp-content/themes/jin/img/favicon.png" alt="画像が表示できません" width="100px">
						<img src="wp-content/themes/jin/img/favicon.png" alt="画像が表示できません" width="100px">
						<img src="wp-content/themes/jin/img/favicon.png" alt="画像が表示できません" width="100px">
						<img src="wp-content/themes/jin/img/favicon.png" alt="画像が表示できません" width="100px">
					</div>
				</div>
				<div class="header-sub-content">
					<!-- ハンバーガーメニュー実装 -->
				</div>
			</div>

			<?php if (has_nav_menu('glonavi')) : ?>
				<!--グローバルナビゲーション layout3-->
				<div id="drawernav3" class="ef">
					<?php wp_nav_menu(array(
						'theme_location' => 'glonavi',
						'container'      => 'nav',
						'container_class' => 'fixed-content ef',
						'items_wrap'     => '<ul class="menu-box">%3$s</ul>'
					));
					?>
				</div>
				<!--グローバルナビゲーション layout3-->
			<?php endif; ?>

		<?php endif; ?>

		<?php if (get_theme_mod('top_navi_sc_display') == "tn_search_on" || get_theme_mod('top_navi_sns_display') == "tn_sns_on") : ?>
			<div id="headmenu">
				<span class="headsns <?php is_top_navi_sns_display(); ?>">
					<?php if (get_option('tw_page_url')) : ?>
						<span class="twitter"><a href="<?php echo get_option('tw_page_url'); ?>"><i class="jic-type jin-ifont-twitter" aria-hidden="true"></i></a></span>
					<?php endif; ?>
					<?php if (get_option('fb_page_url')) : ?>
						<span class="facebook">
							<a href="<?php echo get_option('fb_page_url'); ?>"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if (get_option('insta_page_url')) : ?>
						<span class="instagram">
							<a href="<?php echo get_option('insta_page_url'); ?>"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if (get_option('youtube_page_url')) : ?>
						<span class="youtube">
							<a href="<?php echo get_option('youtube_page_url'); ?>"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if (get_option('line_page_url')) : ?>
						<span class="line">
							<a href="<?php echo get_option('line_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if (get_option('contact_page_url')) : ?>
						<span class="jin-contact">
							<a href="<?php echo get_option('contact_page_url'); ?>"><i class="jic-type jin-ifont-mail" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>

				</span>
				<span class="headsearch <?php is_top_navi_sc_display(); ?>">
					<?php get_search_form(); ?>
				</span>
			</div>
		<?php endif; ?>
	</div>

	<?php if (is_mobile()) : ?>
		<!--ここからスマホスライドメニュー-->
		<?php if (has_nav_menu('sp-slide-menu')) : ?>
			<div class="cps-sp-menu-bar <?php is_animation_style(); ?>">
				<?php wp_nav_menu(array(
					'theme_location' => 'sp-slide-menu',
					'container'      => 'sp-nav',
					'container_class' => 'sp-slide-menu',
					'items_wrap'     => '<ul class="head-sp-menu-bar-inner">%3$s</ul>'
				));
				?>
			</div>
		<?php endif; ?>
		<!--ここまでスマホスライドメニュー-->
	<?php endif; ?>

</div>

<?php if (!is_page_template('lp.php')) : ?>
	<?php if (!get_theme_mod('cps_info_text') == null) : ?>
		<div class="cps-info-bar <?php is_animation_style(); ?>">
			<a href="<?php echo get_theme_mod('cps_info_link'); ?>"><span><?php echo get_theme_mod('cps_info_text'); ?></span></a>
		</div>
	<?php endif; ?>
<?php endif; ?>