<?php get_header(); ?>
	
	<div id="contents">
		
		<!--メインコンテンツ-->
		<main id="main-contents" class="main-contents <?php echo is_article_design(); ?> <?php is_animation_style(); ?>" itemprop="mainContentOfPage">
				<section class="cps-post-box hentry">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article class="cps-post">
							<header class="cps-post-header">
								<h1 class="cps-post-title entry-title" itemprop="headline"><?php esc_html(the_title()); ?></h1>
								<div class="cps-post-meta vcard">
									<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>
									<span class="cps-post-cat" itemprop="keywords"></span>
									<span class="cps-post-date-box">
										<?php get_template_part( 'include/custom-time' ); ?>
									</span>
								</div>
								<?php if ( ! get_option( 'sns_delete' ) ) : ?>
									<?php if ( ! get_option( 'sns_top_delete' ) ) : ?>
										<?php get_template_part('include/sns-top'); ?>
									<?php endif; ?>
								<?php endif; ?>
							</header>

							<div class="cps-post-main-box">
								<div class="cps-post-main <?php if( ! get_option('hl_custom_check')){is_h2_style();echo " "; is_h3_style();echo " "; is_h4_style(); }else{echo "hl-custom";} ?> entry-content <?php echo esc_html(get_option('font_size'));?> <?php echo esc_html(get_option('font_size_sp'));?>" itemprop="articleBody">

									<?php if (wp_attachment_is_image($post->id)) : ?>
										<?php $att_image = wp_get_attachment_image_src( $post->id, "full-size"); ?>
										<p>
											<a href="<?php echo $att_image[0];?>" target="_blank"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>" alt="<?php $post->post_excerpt; ?>" /></a>
										</p>
									<?php endif; ?>
									<?php the_content(); ?>

								</div>
							</div>
						</article>
					<?php endwhile; ?>
					<?php else : ?>
						<article class="cps-post">
							<h1 class="post-title">記事が見つかりませんでした。</h1>
						</article>
					<?php endif; ?>
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