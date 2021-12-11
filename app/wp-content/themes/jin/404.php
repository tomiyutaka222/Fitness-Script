<?php get_header(); ?>

	<div id="contents">
		
		<!--メインコンテンツ-->
		<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemprop="mainContentOfPage">
			<section class="cps-post-box hentry">
 				<article class="cps-post">
					<header class="cps-post-header">
						<h1 class="cps-post-title entry-title" itemprop="headline">お探しの記事が見つかりませんでした</h1>
					</header>
					<div class="cps-post-main <?php if( ! get_option('hl_custom_check')){is_h2_style();echo " "; is_h3_style();echo " "; is_h4_style(); }else{echo "hl-custom";} ?> entry-content <?php echo esc_html(get_option('font_size'));?> <?php echo esc_html(get_option('font_size_sp'));?>" itemprop="articleBody">
						<?php get_template_part('include/content', 'none'); ?>
					</div>
				</article>
    		</section>
			<?php if( is_bread_display() == "exist") :?>
			<?php if( is_mobile() ): ?>
			<?php get_template_part('include/breadcrumb'); ?>
			<?php endif; ?>
			<?php endif; ?>
		</main>

		<?php get_sidebar(); ?>
	</div>
	<?php get_footer(); ?>