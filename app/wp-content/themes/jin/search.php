<?php get_header(); ?>

	<div id="contents">

		<!--メインコンテンツ-->
		<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
			<section class="cps-post-box hentry">
				<header class="archive-post-header">
					<span class="archive-title-sub ef">― SEARCH WORD ―</span>
					<h1 class="archive-title entry-title" itemprop="headline">
						<?php
						  $allsearch = new WP_Query("s=$s&showposts=-1");
						  $key = esc_html($s, 1);
						  $count = $allsearch->post_count;
						  echo '<h1>&#8216;'.$key.'&#8217; で検索した結果：'.$count.' 件</h1>';
					?>
					</h1>
				</header>
			</section>

			<section class="entry-content archive-box">
				<?php get_template_part('include/liststyle/parts/post-list-type'); ?>
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