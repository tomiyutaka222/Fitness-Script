<?php get_header(); ?>
	<div id="contents">

		<!--メインコンテンツ-->
		<main id="main-contents" itemscope itemtype="https://schema.org/Blog">
			<?php get_template_part('include/liststyle/post-list'); ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>