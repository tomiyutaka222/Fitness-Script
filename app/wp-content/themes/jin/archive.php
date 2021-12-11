<?php get_header(); ?>

	<div id="contents">
		
		<!--メインコンテンツ-->
		<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
			<section class="cps-post-box hentry">
				<header class="archive-post-header">
					<?php if(is_month()): /* 月別アーカイブ */?>
						<span class="archive-title-sub ef">― ARCHIVES ―</span>
						<h1 class="archive-title entry-title" itemprop="headline"><?php echo get_the_time('Y'); ?>年&nbsp;<?php echo get_the_time('n'); ?>月</h1>
					<?php elseif(is_year()): /* 年別アーカイブ */ ?>
						<span class="archive-title-sub ef">― ARCHIVES ―</span>
						<h1 class="archive-title entry-title" itemprop="headline"><?php echo get_the_time('Y'); ?>年</h1>
					<?php elseif(is_tag()): /* タグアーカイブ */ ?>
						<span class="archive-title-sub ef">― TAG ―</span>
						<h1 class="archive-title entry-title" itemprop="headline"><?php esc_html(single_cat_title()); ?></h1>
					<?php endif; ?>
					<div class="cps-post-meta vcard">
						<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php $cps_author = get_userdata($post->post_author);
						echo $cps_author->display_name; ?></span></span>
					</div>
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
