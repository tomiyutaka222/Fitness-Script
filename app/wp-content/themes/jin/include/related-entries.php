<?php if( ! get_option( 'related_entries_delete' ) == '記事下の関連記事を非表示にする' ): ?>
<?php if( ! get_post_meta( $post->ID, "related_off", true) == 'この記事で関連記事を表示しない' ) : ?>
<?php if( get_the_category() != false ): ?>
<?php
	$categories = get_the_category($post->ID);
	$cat_name = $categories[0]->cat_name;
	$category_ID = array();
	foreach($categories as $category):
	  array_push( $category_ID, $category -> cat_ID);
	endforeach ;
	
	$cat_ID = $categories[0]->cat_ID;
	$cat_post_num = get_category($cat_ID);
	$cat_num = $cat_post_num->count;

	$args = array(
	  'post__not_in' => array($post -> ID),
	  'posts_per_page'=> is_related_num(),//カスタマイザで指定した値を取得
	  'category__in' => $category_ID,
	  'orderby' => 'rand',
	);
	$query = new WP_Query($args); 
?>

<?php if( $query -> have_posts() ): ?>
<div class="toppost-list-box-simple">
<section class="related-entry-section toppost-list-box-inner">
	<?php if( ! is_related_title() == "" ) :?>
	<div class="related-entry-headline">
		<div class="related-entry-headline-text ef"><span class="fa-headline"><i class="jic jin-ifont-post" aria-hidden="true"></i><?php echo is_related_title(); ?></span></div>
	</div>
	<?php endif; ?>
	<?php if( is_related_type() == "basic1" ) : ?>
		<div class="post-list basicstyle">
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-parts'); ?>
		<?php endwhile;?>
		</div>
	<?php elseif( is_related_type() == "magazine1" ) : ?>
		<div class="post-list-mag">
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>
		<?php endwhile;?>
		</div>
	<?php elseif( is_related_type() == "magazine2" ) : ?>
		<div class="post-list-mag3col">
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>
		<?php endwhile;?>
		</div>
	<?php elseif( is_related_type() == "slide" ) : ?>
		<?php if( $cat_num < 4 ) : ?>
		<div class="post-list-mag3col">
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>
		<?php endwhile;?>
		</div>
		<?php else: ?>
		<div class="post-list-mag3col-slide related-slide">
			<div class="swiper-container2">
				<ul class="swiper-wrapper">
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts-slide'); ?>
		<?php endwhile;?>
				</ul>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
</section>
</div>
<div class="clearfix"></div>
<?php endif; wp_reset_postdata(); ?>
<?php endif; ?>
	

<?php if( ! get_post_meta( $post->ID, "custom_ad_off", true) == 'この記事で広告を表示しない' ) : ?>
	<?php if( ! get_option('ad_related_pc_left') == null || ! get_option('ad_related_pc_right') == null || ! get_option('ad_related_sp') == null ) : ?>
		<?php if ( is_mobile() ) :?>
			<?php if( ! get_option('ad_related_sp') == null ) : ?>
			<div class="related-ad-area">
				<div class="sponsor"><?php echo get_option('ad_setting_text'); ?></div>
				<section class="ad-single">
					<div class="sp-bottom-rectangle">
						<?php echo get_option('ad_related_sp'); ?>
					</div>
				</section>
			</div>
			<?php endif; ?>
		<?php else: ?>
			<?php if( ! get_option('ad_related_pc_left') == null && get_option('ad_related_pc_right') == null ) : ?>
			<div class="related-ad-area">
				<section class="ad-single">
					
					<div class="center-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_related_pc_left'); ?>
					</div>
				</section>
			</div>
			<?php elseif( get_option('ad_related_pc_left') == null && ! get_option('ad_related_pc_right') == null ) : ?>
			<div class="related-ad-area">
				<section class="ad-single">
					
					<div class="center-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_related_pc_right'); ?>
					</div>
				</section>
			</div>
			<?php elseif( ! get_option('ad_related_pc_left') == null && ! get_option('ad_related_pc_right') == null ) : ?>
			<div class="related-ad-area">
				<section class="ad-single">
					
					<div class="left-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_related_pc_left'); ?>
					</div>
					<div class="right-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_related_pc_right'); ?>
					</div>
					<div class="clearfix"></div>
				</section>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>