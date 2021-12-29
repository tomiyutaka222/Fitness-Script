<div class="category-article">
	<div class="category-article-area">
		<span class="contents-title">- HEALTH -</span>
		<div class="category-article-items">
			<?php
			$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
			$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
			$infeed_ad_pc = explode(",", $ad_infeed_pc_num);
			$infeed_ad_sp = explode(",", $ad_infeed_sp_num);
			$infeed_ad_count = 1;
			$infeed_ad_sp_num = 0;
			$infeed_ad_num = 0;

			$arg = array(
				'posts_per_page' => 3, // 表示する件数
				'orderby' => 'date', // 日付でソート
				'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
				'category_name' => 'health' // 表示したいカテゴリーのスラッグを指定
			);

			// カテゴリーの投稿を3件取得
			$posts = get_posts($arg);

			foreach ($posts as $post) :
				setup_postdata($post);
				// カテゴリー情報を取得
				$category = get_the_category();
				if (isset($category[0])) {
					$cat_id   = $category[0]->cat_ID;
					$cat_name = $category[0]->cat_name;
					$cat_slug = $category[0]->category_nicename;
					$cat_url = get_category_link($cat_id);
				} else {
					$cat_name = "";
				}
			?>

				<?php if (!is_mobile() && isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

					<?php if (!get_option('ad_infeed_magazine') == null) : ?>
						<div class="post-list-item pconly">
							<div class="post-list-inner-infeed">
								<?php echo get_option('ad_infeed_magazine'); ?>
							</div>
						</div>

					<?php endif; ?>

					<?php $infeed_ad_num++;
					$infeed_ad_count++;  ?>

					<?php if (isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

						<?php if (!get_option('ad_infeed_magazine') == null) : ?>
							<div class="post-list-item pconly">
								<div class="post-list-inner-infeed">
									<?php echo get_option('ad_infeed_magazine'); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php $infeed_ad_num++;
						$infeed_ad_count++; ?>
					<?php endif; ?>

				<?php endif; ?>

				<article class="post-list-item" itemscope itemtype="https://schema.org/BlogPosting">
					<a class="post-list-link" rel="bookmark" href="<?php the_permalink() ?>" itemprop='mainEntityOfPage'>
						<div class="post-list-inner">
							<div class="post-list-meta vcard">
								<?php if (!$cat_name == "") : ?>
									<span class="top-contents-title" itemprop="keywords"><?php echo "-" . $cat_name . "-" ?></span>
								<?php endif; ?>

								<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $post->post_title; ?></h2>


								<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>

								<div class="post-list-publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
									<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
										<span itemprop="url"><?php echo get_topnavi_logo_image_url(); ?></span>
									</span>
									<span itemprop="name"><?php bloginfo('name'); ?></span>
								</div>
							</div>
							<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<?php if (!is_mobile()) : ?>
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('small_size', array('width ' => '368', 'height ' => '207', 'alt' => jin_image_alt('small_size'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="640">
										<meta itemprop="height" content="360">
									<?php else : ?>
										<!-- TODO 画像表示部分のデザイン実装 -->
										<img src="<?php echo get_jin_noimage_url(); ?>" width="368" height="207" alt="no image" />
										<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
										<meta itemprop="width" content="480">
										<meta itemprop="height" content="270">
									<?php endif; ?>
								<?php else : ?>
									<?php if (is_post_list_style() == "magazinestyle-sp1col") : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('small_size', array('width ' => '345', 'height ' => '194', 'alt' => jin_image_alt('small_size'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="640">
											<meta itemprop="height" content="360">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="345" height="194" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="480">
											<meta itemprop="height" content="270">
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('cps_thumbnails', array('width ' => '167', 'height ' => '94', 'alt' => jin_image_alt('cps_thumbnails'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="167" height="94" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="item-over-view">
								<?php if (mb_strlen($post->post_content, 'UTF-8') > 100) {
									$content = mb_substr($post->post_content, 0, 100, 'UTF-8');
									echo $content . '……';
								} ?>
							</div>
							<span class="item-more">more ➤</span>
						</div>
					</a>
				</article>

				<?php $infeed_ad_count++; ?>
			<?php endforeach;
			wp_reset_postdata();
			?>
		</div>
		<a class="category-more-link" href="<?php $blog_home = get_home_url(); ?>/health/">
			<span class="category-more-button">more | このカテゴリをもっと見る</span>
		</a>
	</div>
	<div class="category-article-area">
		<span class="contents-title">- NUTRION -</span>
		<div class="category-article-items">
			<?php
			$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
			$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
			$infeed_ad_pc = explode(",", $ad_infeed_pc_num);
			$infeed_ad_sp = explode(",", $ad_infeed_sp_num);
			$infeed_ad_count = 1;
			$infeed_ad_sp_num = 0;
			$infeed_ad_num = 0;

			$arg = array(
				'posts_per_page' => 3, // 表示する件数
				'orderby' => 'date', // 日付でソート
				'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
				'category_name' => 'nutrion' // 表示したいカテゴリーのスラッグを指定
			);

			// カテゴリーの投稿を3件取得
			$posts = get_posts($arg);

			foreach ($posts as $post) :
				setup_postdata($post);
				// カテゴリー情報を取得
				$category = get_the_category();
				if (isset($category[0])) {
					$cat_id   = $category[0]->cat_ID;
					$cat_name = $category[0]->cat_name;
					$cat_slug = $category[0]->category_nicename;
					$cat_url = get_category_link($cat_id);
				} else {
					$cat_name = "";
				}
			?>

				<?php if (!is_mobile() && isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

					<?php if (!get_option('ad_infeed_magazine') == null) : ?>
						<div class="post-list-item pconly">
							<div class="post-list-inner-infeed">
								<?php echo get_option('ad_infeed_magazine'); ?>
							</div>
						</div>

					<?php endif; ?>

					<?php $infeed_ad_num++;
					$infeed_ad_count++;  ?>

					<?php if (isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

						<?php if (!get_option('ad_infeed_magazine') == null) : ?>
							<div class="post-list-item pconly">
								<div class="post-list-inner-infeed">
									<?php echo get_option('ad_infeed_magazine'); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php $infeed_ad_num++;
						$infeed_ad_count++; ?>
					<?php endif; ?>

				<?php endif; ?>

				<article class="post-list-item" itemscope itemtype="https://schema.org/BlogPosting">
					<a class="post-list-link" rel="bookmark" href="<?php the_permalink() ?>" itemprop='mainEntityOfPage'>
						<div class="post-list-inner">
							<div class="post-list-meta vcard">
								<?php if (!$cat_name == "") : ?>
									<span class="top-contents-title" itemprop="keywords"><?php echo "-" . $cat_name . "-" ?></span>
								<?php endif; ?>

								<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $post->post_title; ?></h2>


								<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>

								<div class="post-list-publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
									<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
										<span itemprop="url"><?php echo get_topnavi_logo_image_url(); ?></span>
									</span>
									<span itemprop="name"><?php bloginfo('name'); ?></span>
								</div>
							</div>
							<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<?php if (!is_mobile()) : ?>
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('small_size', array('width ' => '368', 'height ' => '207', 'alt' => jin_image_alt('small_size'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="640">
										<meta itemprop="height" content="360">
									<?php else : ?>
										<!-- TODO 画像表示部分のデザイン実装 -->
										<img src="<?php echo get_jin_noimage_url(); ?>" width="368" height="207" alt="no image" />
										<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
										<meta itemprop="width" content="480">
										<meta itemprop="height" content="270">
									<?php endif; ?>
								<?php else : ?>
									<?php if (is_post_list_style() == "magazinestyle-sp1col") : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('small_size', array('width ' => '345', 'height ' => '194', 'alt' => jin_image_alt('small_size'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="640">
											<meta itemprop="height" content="360">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="345" height="194" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="480">
											<meta itemprop="height" content="270">
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('cps_thumbnails', array('width ' => '167', 'height ' => '94', 'alt' => jin_image_alt('cps_thumbnails'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="167" height="94" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="item-over-view">
								<?php if (mb_strlen($post->post_content, 'UTF-8') > 100) {
									$content = mb_substr($post->post_content, 0, 100, 'UTF-8');
									echo $content . '……';
								} ?>
							</div>
							<span class="item-more">more ➤</span>
						</div>
					</a>
				</article>

				<?php $infeed_ad_count++; ?>
			<?php endforeach;
			wp_reset_postdata();
			?>
		</div>
		<a class="category-more-link" href="<?php $blog_home = get_home_url(); ?>/nutrion/">
			<span class="category-more-button">more | このカテゴリをもっと見る</span>
		</a>
	</div>
	<div class="category-article-area">
		<span class="contents-title">- MEAL -</span>
		<div class="category-article-items">
			<?php
			$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
			$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
			$infeed_ad_pc = explode(",", $ad_infeed_pc_num);
			$infeed_ad_sp = explode(",", $ad_infeed_sp_num);
			$infeed_ad_count = 1;
			$infeed_ad_sp_num = 0;
			$infeed_ad_num = 0;

			$arg = array(
				'posts_per_page' => 3, // 表示する件数
				'orderby' => 'date', // 日付でソート
				'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
				'category_name' => 'meal', // 表示したいカテゴリーのスラッグを指定
			);

			// カテゴリーの投稿を3件取得
			$posts = get_posts($arg);

			foreach ($posts as $post) :
				setup_postdata($post);
				// カテゴリー情報を取得
				$category = get_the_category();
				if (isset($category[0])) {
					$cat_id   = $category[0]->cat_ID;
					$cat_name = $category[0]->cat_name;
					$cat_slug = $category[0]->category_nicename;
					$cat_url = get_category_link($cat_id);
				} else {
					$cat_name = "";
				}
			?>

				<?php if (!is_mobile() && isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

					<?php if (!get_option('ad_infeed_magazine') == null) : ?>
						<div class="post-list-item pconly">
							<div class="post-list-inner-infeed">
								<?php echo get_option('ad_infeed_magazine'); ?>
							</div>
						</div>

					<?php endif; ?>

					<?php $infeed_ad_num++;
					$infeed_ad_count++;  ?>

					<?php if (isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

						<?php if (!get_option('ad_infeed_magazine') == null) : ?>
							<div class="post-list-item pconly">
								<div class="post-list-inner-infeed">
									<?php echo get_option('ad_infeed_magazine'); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php $infeed_ad_num++;
						$infeed_ad_count++; ?>
					<?php endif; ?>

				<?php endif; ?>

				<article class="post-list-item" itemscope itemtype="https://schema.org/BlogPosting">
					<a class="post-list-link" rel="bookmark" href="<?php the_permalink() ?>" itemprop='mainEntityOfPage'>
						<div class="post-list-inner">
							<div class="post-list-meta vcard">
								<?php if (!$cat_name == "") : ?>
									<span class="top-contents-title" itemprop="keywords"><?php echo "-" . $cat_name . "-" ?></span>
								<?php endif; ?>

								<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $post->post_title; ?></h2>


								<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>

								<div class="post-list-publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
									<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
										<span itemprop="url"><?php echo get_topnavi_logo_image_url(); ?></span>
									</span>
									<span itemprop="name"><?php bloginfo('name'); ?></span>
								</div>
							</div>
							<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<?php if (!is_mobile()) : ?>
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('small_size', array('width ' => '368', 'height ' => '207', 'alt' => jin_image_alt('small_size'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="640">
										<meta itemprop="height" content="360">
									<?php else : ?>
										<!-- TODO 画像表示部分のデザイン実装 -->
										<img src="<?php echo get_jin_noimage_url(); ?>" width="368" height="207" alt="no image" />
										<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
										<meta itemprop="width" content="480">
										<meta itemprop="height" content="270">
									<?php endif; ?>
								<?php else : ?>
									<?php if (is_post_list_style() == "magazinestyle-sp1col") : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('small_size', array('width ' => '345', 'height ' => '194', 'alt' => jin_image_alt('small_size'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="640">
											<meta itemprop="height" content="360">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="345" height="194" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="480">
											<meta itemprop="height" content="270">
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('cps_thumbnails', array('width ' => '167', 'height ' => '94', 'alt' => jin_image_alt('cps_thumbnails'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="167" height="94" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="item-over-view">
								<?php if (mb_strlen($post->post_content, 'UTF-8') > 100) {
									$content = mb_substr($post->post_content, 0, 100, 'UTF-8');
									echo $content . '……';
								} ?>
							</div>
							<span class="item-more">more ➤</span>
						</div>
					</a>
				</article>

				<?php $infeed_ad_count++; ?>
			<?php endforeach;
			wp_reset_postdata();
			?>
		</div>
		<a class="category-more-link" href="<?php $blog_home = get_home_url(); ?>/meal/">
			<span class="category-more-button">more | このカテゴリをもっと見る</span>
		</a>
	</div>
	<div class="category-article-area">
		<span class="contents-title">- EXERCISE -</span>
		<div class="category-article-items">
			<?php
			$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
			$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
			$infeed_ad_pc = explode(",", $ad_infeed_pc_num);
			$infeed_ad_sp = explode(",", $ad_infeed_sp_num);
			$infeed_ad_count = 1;
			$infeed_ad_sp_num = 0;
			$infeed_ad_num = 0;

			$arg = array(
				'posts_per_page' => 3, // 表示する件数
				'orderby' => 'date', // 日付でソート
				'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
				'category_name' => 'exercise' // 表示したいカテゴリーのスラッグを指定
			);

			// カテゴリーの投稿を3件取得
			$posts = get_posts($arg);

			foreach ($posts as $post) :
				setup_postdata($post);
				// カテゴリー情報を取得
				$category = get_the_category();
				if (isset($category[0])) {
					$cat_id   = $category[0]->cat_ID;
					$cat_name = $category[0]->cat_name;
					$cat_slug = $category[0]->category_nicename;
					$cat_url = get_category_link($cat_id);
				} else {
					$cat_name = "";
				}
			?>

				<?php if (!is_mobile() && isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

					<?php if (!get_option('ad_infeed_magazine') == null) : ?>
						<div class="post-list-item pconly">
							<div class="post-list-inner-infeed">
								<?php echo get_option('ad_infeed_magazine'); ?>
							</div>
						</div>

					<?php endif; ?>

					<?php $infeed_ad_num++;
					$infeed_ad_count++;  ?>

					<?php if (isset($infeed_ad_pc[$infeed_ad_num]) && $infeed_ad_pc[$infeed_ad_num] == $infeed_ad_count) : ?>

						<?php if (!get_option('ad_infeed_magazine') == null) : ?>
							<div class="post-list-item pconly">
								<div class="post-list-inner-infeed">
									<?php echo get_option('ad_infeed_magazine'); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php $infeed_ad_num++;
						$infeed_ad_count++; ?>
					<?php endif; ?>

				<?php endif; ?>

				<article class="post-list-item" itemscope itemtype="https://schema.org/BlogPosting">
					<a class="post-list-link" rel="bookmark" href="<?php the_permalink() ?>" itemprop='mainEntityOfPage'>
						<div class="post-list-inner">
							<div class="post-list-meta vcard">
								<?php if (!$cat_name == "") : ?>
									<span class="top-contents-title" itemprop="keywords"><?php echo "-" . $cat_name . "-" ?></span>
								<?php endif; ?>

								<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $post->post_title; ?></h2>


								<span class="writer fn" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span>

								<div class="post-list-publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
									<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
										<span itemprop="url"><?php echo get_topnavi_logo_image_url(); ?></span>
									</span>
									<span itemprop="name"><?php bloginfo('name'); ?></span>
								</div>
							</div>
							<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<?php if (!is_mobile()) : ?>
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('small_size', array('width ' => '368', 'height ' => '207', 'alt' => jin_image_alt('small_size'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="640">
										<meta itemprop="height" content="360">
									<?php else : ?>
										<!-- TODO 画像表示部分のデザイン実装 -->
										<img src="<?php echo get_jin_noimage_url(); ?>" width="368" height="207" alt="no image" />
										<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
										<meta itemprop="width" content="480">
										<meta itemprop="height" content="270">
									<?php endif; ?>
								<?php else : ?>
									<?php if (is_post_list_style() == "magazinestyle-sp1col") : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('small_size', array('width ' => '345', 'height ' => '194', 'alt' => jin_image_alt('small_size'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="640">
											<meta itemprop="height" content="360">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="345" height="194" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="480">
											<meta itemprop="height" content="270">
										<?php endif; ?>
									<?php else : ?>
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('cps_thumbnails', array('width ' => '167', 'height ' => '94', 'alt' => jin_image_alt('cps_thumbnails'))); ?>
											<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php else : ?>
											<img src="<?php echo get_jin_noimage_url(); ?>" width="167" height="94" alt="no image" />
											<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
											<meta itemprop="width" content="320">
											<meta itemprop="height" content="180">
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="item-over-view">
								<?php if (mb_strlen($post->post_content, 'UTF-8') > 100) {
									$content = mb_substr($post->post_content, 0, 100, 'UTF-8');
									echo $content . '……';
								} ?>
							</div>
							<span class="item-more">more ➤</span>
						</div>
					</a>
				</article>

				<?php $infeed_ad_count++; ?>
			<?php endforeach;
			wp_reset_postdata();
			?>
		</div>
		<a class="category-more-link" href="<?php $blog_home = get_home_url(); ?>/exercise/">
			<span class="category-more-button">more | このカテゴリをもっと見る</span>
		</a>
	</div>
</div>