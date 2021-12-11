<div class="clearfix"></div>
	<!--フッター-->
	<?php if( ! is_home() && ! is_front_page() ) :?>
	<?php if( is_bread_display() == "exist") :?>
	<?php if( ! is_mobile() ): ?>
	<?php get_template_part('include/breadcrumb'); ?>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	<footer role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
	
		<!--ここからフッターウィジェット-->
		
		<?php if ( ! wp_isset_widets( 'footer-menu-left',true ) && ! wp_isset_widets( 'footer-menu-center',true ) && ! wp_isset_widets( 'footer-menu-right',true ) ) : ?>
		
		<?php else : ?>
			<?php if( is_footer_design() == "footer_style1" ) :?>
			<div id="footer-widget-area" class="footer_style1 <?php echo jin_footer_type(); ?>">
				<div id="footer-widget-box">
					<div id="footer-widget-left">
						<?php dynamic_sidebar( 'footer-menu-left' ); ?>
					</div>
					<div id="footer-widget-center-box">
						<div id="footer-widget-center1">
							<?php dynamic_sidebar( 'footer-menu-center1' ); ?>
						</div>
						<div id="footer-widget-center2">
							<?php dynamic_sidebar( 'footer-menu-center2' ); ?>
						</div>
					</div>
					<div id="footer-widget-right">
						<?php dynamic_sidebar( 'footer-menu-right' ); ?>
					</div>
				</div>
			</div>
			<?php elseif( is_footer_design() == "footer_style2" ) : ?>
			<div id="footer-widget-area" class="footer_style2 <?php echo jin_footer_type(); ?>">
				<div id="footer-widget-box">
					<div id="footer-widget-left">
						<?php dynamic_sidebar( 'footer-menu-left' ); ?>
					</div>
					<div id="footer-widget-center">
						<?php dynamic_sidebar( 'footer-menu-center' ); ?>
					</div>
					<div id="footer-widget-right">
						<?php dynamic_sidebar( 'footer-menu-right' ); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="footersen"></div>
		<?php endif; ?>
		
		
		<div class="clearfix"></div>
		
		<!--ここまでフッターウィジェット-->
	
		<?php if ( footer_choice() == 'both' ) : ?>
			<div id="footer-box">
				<div class="footer-inner">
					<span id="privacy"><a href="<?php is_footer_link_left(); ?>"><?php is_footer_text_left(); ?></a></span>
					<span id="law"><a href="<?php is_footer_link_right(); ?>"><?php is_footer_text_right(); ?></a></span>
					<span id="copyright" itemprop="copyrightHolder"><i class="jic jin-ifont-copyright" aria-hidden="true"></i><?php echo get_copyright_date(); ?>&nbsp;&nbsp;<?php bloginfo('name'); ?></span>
				</div>
			</div>
		<?php elseif ( footer_choice() == 'onlycopy' ) : ?>
			<div id="footer-box">
				<div class="footer-inner">
					<span id="copyright-center" itemprop="copyrightHolder"><i class="jic jin-ifont-copyright" aria-hidden="true"></i><?php echo get_copyright_date(); ?>&nbsp;&nbsp;<?php bloginfo('name'); ?></span>
				</div>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div>
	</footer>
	
	
	
	<?php if ( is_mobile() ) : ?>
	<!--ここからフッターメニュー-->
		<?php if( has_nav_menu('sp-footer-menu') ) : ?>
			<div id="sp-footer-box">
				<?php wp_nav_menu( array(
					'theme_location' =>'sp-footer-menu',
					'container'      =>'sp-nav',
					'container_class'=>'sp-fixed-content',
					'items_wrap'     =>'<ul class="footer-menu-sp">%3$s</ul>') );
				?>
			</div>
		<?php endif; ?>
	<!--ここまでフッターメニュー-->
	<?php endif; ?>
	
	</div><!--scroll-content-->

	<?php if ( is_mobile() ) : ?>
	<!--ここからフッターサイドメニュー-->
		<?php if( ! get_post_meta( $post->ID, "sp_sidemenu_off", true) == 'この記事でスマホボタンメニューを表示しない' ) : ?>
			<?php if( has_nav_menu('sp-sidemenu') ) : ?>
			<div class="sp-sidemenu-wrapper">
				<input type="checkbox" id="sp-sidemenu-toggle">
				<label for="sp-sidemenu-toggle" class="sp-sidemenu-open <?php is_sp_header_fix(); ?>"><div class="sp-sidemenu-btn"><span class="sp-sidemenu-title ef"><?php is_sp_sidemenu_title(); ?></span></div></label>

				<div class="sp-sidemenu-bg" ontouchstart=""></div>

				<div class="sp-sidemenu-box" ontouchstart="">
					<div class="sp-sidemenu-search">
						<?php get_search_form(); ?>
					</div>

					<?php wp_nav_menu( array(
						'theme_location' =>'sp-sidemenu',
						'container'      =>'nav',
						'container_class'=>'sp-sidemenu-menu ef',
						'items_wrap'     =>'<ul class="menu-box">%3$s</ul>') );
					?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	<!--ここまでフッターサイドメニュー-->
	<?php endif; ?>
	<?php if( get_post_meta( $post->ID, "sp_sidemenu_off", true) == 'この記事でスマホボタンメニューを表示しない' ) : ?>
	<style>#page-top{bottom:75px;}</style>
	<?php endif; ?>
	
</div><!--wrapper-->

<?php wp_footer(); ?>

<script>
	var mySwiper = new Swiper ('.swiper-container', {
		// Optional parameters
		loop: true,
		slidesPerView: 5,
		spaceBetween: 15,
		autoplay: {
			delay: 2700,
		},
		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
		},
		breakpoints: {
              1024: {
				slidesPerView: 4,
				spaceBetween: 15,
			},
              767: {
				slidesPerView: 2,
				spaceBetween: 10,
				centeredSlides : true,
				autoplay: {
					delay: 4200,
				},
			}
        }
	});
	
	var mySwiper2 = new Swiper ('.swiper-container2', {
	// Optional parameters
		loop: true,
		slidesPerView: 3,
		spaceBetween: 17,
		centeredSlides : true,
		autoplay: {
			delay: 4000,
		},

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
		},

		breakpoints: {
			767: {
				slidesPerView: 2,
				spaceBetween: 10,
				centeredSlides : true,
				autoplay: {
					delay: 4200,
				},
			}
		}
	});

</script>
<?php if( is_totop_display() == "exist") :?>
<div id="page-top">
	<a class="totop"><i class="jic jin-ifont-arrowtop"></i></a>
</div>
<?php endif; ?>
<?php if( ! get_option('space_body') == null ) : ?>
<?php echo get_option('space_body'); ?>
<?php endif; ?>

</body>
</html>
<?php if( ! get_option('jin_code_highlighter') == null ) : ?>
<script src="<?php echo get_template_directory_uri() . '/js/prism.js' ?>"></script>
<link href="<?php echo get_template_directory_uri() . '/css/prism.css' ?>" rel="stylesheet" />
<?php endif; ?>
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<?php if( is_font_style() == 'nts-style' ): ?>
<link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
<?php elseif( is_font_style() == 'rm-style' ): ?>
<link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
<?php else: ?>
<?php endif; ?>