<?php if( ! is_page_template('lp.php') ) :?>
	<?php if ( ! is_mobile() ) : ?>
	<?php if ( ! get_theme_mod('cps_info_text') == null ): ?>
		<div class="cps-info-bar <?php is_animation_style(); ?>">
			<a href="<?php echo get_theme_mod('cps_info_link'); ?>"><span><?php echo get_theme_mod('cps_info_text'); ?></span></a>
		</div>
	<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if( has_nav_menu('glonavi') ) : ?>
	<!--グローバルナビゲーション layout1-->
	<?php if( is_glonavi_design() == 'type1' ) : ?>
	<div id="nav-container" class="header-style6-animate <?php is_animation_style(); ?>">
		<div class="header-style6-box">
			<div id="drawernav4" class="ef">
				<?php wp_nav_menu( array(
					'theme_location' =>'glonavi',
					'container'      =>'nav',
					'container_class'=>'fixed-content',
					'items_wrap'     =>'<ul class="menu-box">%3$s</ul>') );
				?>
			</div>

			<?php if ( get_theme_mod('top_navi_sc_display') == "tn_search_on" || get_theme_mod('top_navi_sns_display') == "tn_sns_on" ): ?>

			<div id="headmenu">
				<span class="headsns <?php is_top_navi_sns_display(); ?>">
					<?php if ( get_option('tw_page_url') ): ?>
						<span class="twitter"><a href="<?php echo get_option('tw_page_url'); ?>"><i class="jic-type jin-ifont-twitter" aria-hidden="true"></i></a></span>
					<?php endif; ?>
					<?php if ( get_option('fb_page_url') ): ?>
						<span class="facebook">
						<a href="<?php echo get_option('fb_page_url'); ?>"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('insta_page_url') ): ?>
						<span class="instagram">
						<a href="<?php echo get_option('insta_page_url'); ?>"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('youtube_page_url') ): ?>
						<span class="youtube">
						<a href="<?php echo get_option('youtube_page_url'); ?>"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>	
					<?php if ( get_option('line_page_url') ): ?>
						<span class="line">
							<a href="<?php echo get_option('line_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('contact_page_url') ): ?>
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
	</div>

	<?php elseif( is_glonavi_design() == 'type2' ): ?>

	<div id="nav-container" class="header-style6-animate <?php is_animation_style(); ?>">
		<div class="header-style6-box">
			<div id="drawernav5" class="ef">
				<?php wp_nav_menu( array(
					'theme_location' =>'glonavi',
					'container'      =>'nav',
					'container_class'=>'fixed-content',
					'items_wrap'     =>'<ul class="menu-box">%3$s</ul>') );
				?>
			</div>

			<?php if ( get_theme_mod('top_navi_sc_display') == "tn_search_on" || get_theme_mod('top_navi_sns_display') == "tn_sns_on" ): ?>

			<div id="headmenu" class="header-style6">
				<span class="headsns <?php is_top_navi_sns_display(); ?>">
					<?php if ( get_option('tw_page_url') ): ?>
						<span class="twitter"><a href="<?php echo get_option('tw_page_url'); ?>"><i class="jic-type jin-ifont-twitter" aria-hidden="true"></i></a></span>
					<?php endif; ?>
					<?php if ( get_option('fb_page_url') ): ?>
						<span class="facebook">
						<a href="<?php echo get_option('fb_page_url'); ?>"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('insta_page_url') ): ?>
						<span class="instagram">
						<a href="<?php echo get_option('insta_page_url'); ?>"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('youtube_page_url') ): ?>
						<span class="youtube">
						<a href="<?php echo get_option('youtube_page_url'); ?>"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>	
					<?php if ( get_option('line_page_url') ): ?>
						<span class="line">
							<a href="<?php echo get_option('line_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a>
						</span>
					<?php endif; ?>
					<?php if ( get_option('contact_page_url') ): ?>
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
	</div>
	<?php endif; ?>
	<!--グローバルナビゲーション layout1-->
<?php endif; ?>

<div id="header-box" class="<?php is_top_navi_display(); ?> header-box <?php is_animation_style(); ?>">
	<div id="header" class="header-type2 header <?php is_animation_style(); ?>">
		<?php if ( is_mobile() ) : ?>

		<div id="site-info" class="ef">
			<?php if ( get_topnavi_logo_image_url() ) : ?>
				<span class="sp-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_topnavi_logo_image_url(); ?>' alt='<?php is_topnavi_logo_alt(); ?>'></a></span>
			<?php else : ?>
				<?php if( empty(is_title_text()) ): ?>
					<span class="sp-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></span>
				<?php else : ?>
					<span class="sp-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo is_title_text(); ?></a></span>
				<?php endif; ?>
			<?php endif; ?>
		</div>

	<?php else : ?>

		<div id="site-info" class="ef">
			<?php if ( get_topnavi_logo_image_url() ) : ?>
				<span class="tn-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_topnavi_logo_image_url(); ?>' alt='<?php is_topnavi_logo_alt(); ?>'></a></span>
			<?php else: ?>
				<?php if( empty(is_title_text()) ): ?>
					<span class="tn-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></span>
				<?php else : ?>
					<span class="tn-logo-size"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo is_title_text(); ?></a></span>
				<?php endif; ?>
			<?php endif; ?>
		</div>

	<?php endif; ?>

	</div>
	
	<?php if ( is_mobile() ) : ?>
	<!--ここからスマホスライドメニュー-->
		<?php if( has_nav_menu('sp-slide-menu') ) : ?>
			<div class="cps-sp-menu-bar <?php is_animation_style(); ?>">
				<?php wp_nav_menu( array(
					'theme_location' =>'sp-slide-menu',
					'container'      =>'sp-nav',
					'container_class'=>'sp-slide-menu',
					'items_wrap'     =>'<ul class="head-sp-menu-bar-inner">%3$s</ul>') );
				?>
			</div>
		<?php endif; ?>
	<!--ここまでスマホスライドメニュー-->
	<?php endif; ?>
	
</div>

<?php if( ! is_page_template('lp.php') ) :?>
	<?php if ( is_mobile() ) : ?>
	<?php if ( ! get_theme_mod('cps_info_text') == null ): ?>
		<div class="cps-info-bar <?php is_animation_style(); ?>">
			<span><a href="<?php echo get_theme_mod('cps_info_link'); ?>"><?php echo get_theme_mod('cps_info_text'); ?></a></span>
		</div>
	<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>