<?php
	// カテゴリー情報を取得
	$category = get_the_category();
	if(isset($category[0])){
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	$cat_slug = $category[0]->category_nicename;
	$cat_url = get_category_link($cat_id);
	}else{
		$cat_name = "";
	}
?>
<article class="post-list-item" itemscope itemtype="https://schema.org/BlogPosting">
	<a class="post-list-link" rel="bookmark" href="<?php the_permalink() ?>" itemprop='mainEntityOfPage'>
		<div class="post-list-inner">
			<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php if ( ! is_mobile() ): ?>
					<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail('small_size',array('width ' => '368','height ' => '207')); ?>
						<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
						<meta itemprop="width" content="640">
						<meta itemprop="height" content="360">
					<?php else: ?>
						<img src="<?php echo get_jin_noimage_url(); ?>" width="368" height="207" alt="no image" />
						<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
						<meta itemprop="width" content="480">
						<meta itemprop="height" content="270">
					<?php endif; ?>
				<?php else: ?>
					<?php if( is_post_list_style() == "magazinestyle-sp1col" ): ?>
						<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail('small_size',array('width ' => '345','height ' => '194')); ?>
							<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
							<meta itemprop="width" content="640">
							<meta itemprop="height" content="360">
						<?php else: ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="345" height="194" alt="no image" />
							<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
							<meta itemprop="width" content="480">
							<meta itemprop="height" content="270">
						<?php endif; ?>
					<?php else: ?>
						<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail('cps_thumbnails',array('width ' => '167','height ' => '94')); ?>
							<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
							<meta itemprop="width" content="320">
							<meta itemprop="height" content="180">
						<?php else: ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="167" height="94" alt="no image" />
							<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
							<meta itemprop="width" content="320">
							<meta itemprop="height" content="180">
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="post-list-meta vcard">
				<?php if( ! $cat_name == "") :?>
				<span class="post-list-cat category-<?php echo $cat_slug; ?>" style="background-color:<?php cps_category_color(); ?>!important;" itemprop="keywords"><?php echo $cat_name ?></span>
				<?php endif; ?>

				<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $post->post_title; ?></h2>

				<?php if( is_date_style() != 'none' ) : ?>
					<span class="post-list-date date updated ef" itemprop="datePublished dateModified" datetime="<?php the_time('Y-m-d'); ?>" content="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ) ;?></span>
				<?php endif; ?>

				<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>

				<div class="post-list-publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<span itemprop="url"><?php echo get_topnavi_logo_image_url(); ?></span>
					</span>
					<span itemprop="name"><?php bloginfo('name'); ?></span>
				</div>
			</div>
		</div>
	</a>
</article>