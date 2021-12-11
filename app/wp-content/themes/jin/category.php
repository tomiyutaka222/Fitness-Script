<?php get_header(); ?>

	<div id="contents">
		
		<!--メインコンテンツ-->
		<?php
			$t_id = get_category( intval( get_query_var('cat') ) )->term_id;
		    $cat_class = get_category($t_id);
		    $cat_option = get_option($t_id);

		    if( is_array($cat_option) ){
				$cat_option = array_merge(array('cont'=>''),$cat_option);
		    }
			if( ! empty($cat_option['cps_image_cat']) ){
				$cat_eyecatch = $cat_option['cps_image_cat'];
			}
			$cat_desc = (isset($cat_option['cps_meta_content'])) ? $cat_option['cps_meta_content'] : "";
		
		?>
		<?php if( empty( $cat_desc ) ) :?>
			<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
				<section class="cps-post-box hentry">
					<header class="archive-post-header">
						<span class="archive-title-sub ef">― CATEGORY ―</span>
						<h1 class="archive-title entry-title" itemprop="headline"><?php esc_html(single_cat_title()); ?></h1>
						<div class="cps-post-meta vcard">
							<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php $cps_author = get_userdata($post->post_author);
							echo $cps_author->display_name; ?></span></span>
							<span class="cps-post-date-box" style="display: none;">
								<?php get_template_part( 'include/custom-time' ); ?>
							</span>
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
		<?php else: ?>
			<?php if ( ! is_paged() ) : ?>
			<?php
				// カテゴリー情報を取得
				$category = get_the_category();
				$cat_id   = $category[0]->cat_ID;
				$cat_name = $category[0]->cat_name;
				$cat_slug = $category[0]->category_nicename;
				$cat_link = get_category_link($cat_id);
			?>
			<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemprop="mainContentOfPage">
				<section class="cps-post-box hentry">
					<article class="cps-post">
						<header class="cps-post-header">
							<span class="cps-post-cat" itemprop="keywords"><a href="<?php get_the_permalink(); ?>" style="background-color:<?php cps_category_color(); ?>!important;"><?php esc_html(single_cat_title()); ?></a></span>
							<h1 class="cps-post-title entry-title" itemprop="headline"><?php echo cps_category_title() ?></h1>
							<div class="cps-post-meta vcard">
								<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php $cps_author = get_userdata($post->post_author);
								echo $cps_author->display_name; ?></span></span>
								<span class="cps-post-cat" itemprop="keywords"></span>
								<span class="cps-post-date-box">
									<?php get_template_part( 'include/custom-time' ); ?>
								</span>
							</div>
							
						</header>
						<?php if( ! empty( $cat_eyecatch ) ) :?>
							<div class="cps-post-thumb" itemscope itemtype="https://schema.org/ImageObject">
								<img src="<?php cps_category_eyecatch(); ?>"/>
							</div>
						<?php endif; ?>
						<?php if ( ! get_option( 'sns_delete' ) ) : ?>
							<?php if ( ! get_option( 'sns_top_delete' ) ) : ?>
								<?php get_template_part('include/sns-top'); ?>
							<?php endif; ?>
						<?php endif; ?>
						<div class="cps-post-main-box">
							<div class="cps-post-main <?php if( ! get_theme_mod('h2_style_icon') == ""){ echo get_theme_mod('h2_style_icon'); } ?> <?php if( ! get_theme_mod('h3_style_icon') == ""){ echo get_theme_mod('h3_style_icon'); } ?> <?php if( ! get_theme_mod('h4_style_icon') == ""){ echo get_theme_mod('h4_style_icon'); } ?> <?php if( ! get_option('hl_custom_check')){is_h2_style();echo " "; is_h3_style();echo " "; is_h4_style(); }else{echo "hl-custom";} ?> entry-content <?php echo esc_html(get_option('font_size'));?> <?php echo esc_html(get_option('font_size_sp'));?>" itemprop="articleBody">
								<?php cps_category_description(); ?>
								<?php get_template_part('ad'); ?>
								<?php get_template_part('cta'); ?>
							</div>
						</div>
					</article>
				</section>
				
				<?php if( is_mobile() ): ?>
				<div class="area-border2"></div>
				<?php endif; ?>

				<section class="entry-content archive-box">
					<?php get_template_part('include/liststyle/parts/post-list-type'); ?>
				</section>
				
				<?php if( is_bread_display() == "exist") :?>
				<?php if( is_mobile() ): ?>
				<?php get_template_part('include/breadcrumb'); ?>
				<?php endif; ?>
				<?php endif; ?>
			</main>
			<?php else: ?>
			<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemscope itemtype="https://schema.org/Blog">
				<section class="cps-post-box hentry">
					<header class="archive-post-header">
						<span class="archive-title-sub ef">― CATEGORY ―</span>
						<h1 class="archive-title entry-title" itemprop="headline"><?php esc_html(single_cat_title()); ?></h1>
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
			<?php endif; ?>
		
		<?php endif; ?>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
