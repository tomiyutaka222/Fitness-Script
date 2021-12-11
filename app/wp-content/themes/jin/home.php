<?php get_header(); ?>

	<div id="contents">

		<!--メインコンテンツ-->
		
		<?php if( is_toppage_style() == "one_column" ) : ?>
			<?php if( ! is_mobile()) :?>
			<main id="main-contents-one" class="main-contents <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
					
				<?php if ( wp_isset_widets( 'home-top-widget',true ) ) : ?>
				<div id="home-top-widget">
				<?php dynamic_sidebar( 'home-top-widget' ); ?>
				</div>
				<?php endif; ?>

				<?php get_template_part('include/liststyle/post-list-mag'); ?>

				<?php if ( wp_isset_widets( 'home-bottom-widget',true ) ) : ?>
				<div id="home-bottom-widget">
				<?php dynamic_sidebar( 'home-bottom-widget' ); ?>
				</div>
				<?php endif; ?>
				
			</main>
		
			<?php else: ?>
		
			<main id="main-contents" class="main-contents <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
				
				<?php if ( wp_isset_widets( 'home-top-widget',true ) ) : ?>
				<div id="home-top-widget">
				<?php dynamic_sidebar( 'home-top-widget' ); ?>
				</div>
				<?php endif; ?>

				<?php if( is_post_list_style() == "magazinestyle" ) : ?>
					<?php get_template_part('include/liststyle/post-list-mag'); ?>
				<?php elseif( is_post_list_style() == "magazinestyle-sp1col" ) : ?>
					<?php get_template_part('include/liststyle/post-list-mag-sp1col'); ?>
				<?php elseif( is_post_list_style() == "basicstyle" ) : ?>
					<?php get_template_part('include/liststyle/post-list'); ?>
				<?php endif; ?>
				
				<?php if ( wp_isset_widets( 'home-bottom-widget',true ) ) : ?>
				<div id="home-bottom-widget">
				<?php dynamic_sidebar( 'home-bottom-widget' ); ?>
				</div>
				<?php endif; ?>

			</main>
			<?php get_sidebar(); ?>
		
			<?php endif; ?>

		<?php elseif( is_toppage_style() == "two_column" ) : ?>
		
			<main id="main-contents" class="main-contents <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
				
				<?php if ( wp_isset_widets( 'home-top-widget',true ) ) : ?>
				<div id="home-top-widget">
				<?php dynamic_sidebar( 'home-top-widget' ); ?>
				</div>
				<?php endif; ?>

				<?php if( is_post_list_style() == "magazinestyle" ) : ?>
					<?php get_template_part('include/liststyle/post-list-mag'); ?>
				<?php elseif( is_post_list_style() == "magazinestyle-sp1col" ) : ?>
					<?php get_template_part('include/liststyle/post-list-mag-sp1col'); ?>
				<?php elseif( is_post_list_style() == "basicstyle" ) : ?>
					<?php get_template_part('include/liststyle/post-list'); ?>
				<?php endif; ?>
				
				<?php if ( wp_isset_widets( 'home-bottom-widget',true ) ) : ?>
				<div id="home-bottom-widget">
				<?php dynamic_sidebar( 'home-bottom-widget' ); ?>
				</div>
				<?php endif; ?>

			</main>
			<?php get_sidebar(); ?>
			
		<?php endif; ?>
		
	</div>
	
<?php get_footer(); ?>
