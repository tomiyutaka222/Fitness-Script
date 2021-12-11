<?php if( ! get_theme_mod('toppost_list_cat') ) :?>
<div class="toppost-list-box-simple">
	<div class="post-list-mag">
		
		<?php
			$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
			$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
		?>
		<?php if( isset($ad_infeed_pc_num) || isset($ad_infeed_sp_num) ) :?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts-infeed'); ?>
		<?php else: ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>
			<?php endwhile; ?>
		<?php endif; ?>

		<section class="pager-top">
			<?php if( function_exists('responsive_pagination') ) { responsive_pagination( $wp_query->max_num_pages ); } ?>
		</section>
	</div>
</div>
<?php else: ?>
<div class="toppost-list-box">
	<?php
		$toppost_list_cat = get_theme_mod('toppost_list_cat');
		$list_cat_id = explode(",", $toppost_list_cat);
		$list_cat_num = 0;
		$list_cat_num2 = 0;
	?>
	<input type="radio" name="switch" id="tab-1" checked>
	<input type="radio" name="switch" id="tab-2">
	<input type="radio" name="switch" id="tab-3">
	<input type="radio" name="switch" id="tab-4">
	<input type="radio" name="switch" id="tab-5">
	
	<ul class="tabBtn-mag">
		<li><label for="tab-1"><?php echo get_theme_mod('jin_toppost_list_name','最新記事'); ?></label></li>
		<?php while( isset($list_cat_id[$list_cat_num2]) ): ?>
		<?php
			// カテゴリー情報を取得
			$category_tab = get_category($list_cat_id[$list_cat_num2]);
			$cat_name_tab = $category_tab->cat_name;
		?>
		<li><label for="tab-<?php echo $list_cat_num2+2; ?>"><?php echo $cat_name_tab; ?></label></li>
		<?php $list_cat_num2++; ?>
		<?php endwhile; ?>
	</ul>
	<div class="toppost-list-box-inner">
	
		<div class="post-list-mag autoheight">
			
			<?php
				$ad_infeed_pc_num = get_option('ad_infeed_pc_num');
				$ad_infeed_sp_num = get_option('ad_infeed_sp_num');
			?>
			<?php if( isset($ad_infeed_pc_num) || isset($ad_infeed_sp_num) ) :?>
				<?php get_template_part('include/liststyle/parts/post-list-mag-parts-infeed'); ?>
			<?php else: ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<section class="pager-top">
				<?php if( function_exists('responsive_pagination') ) { responsive_pagination( $wp_query->max_num_pages ); } ?>
			</section>
		</div>
		
		
		<?php while( isset($list_cat_id[$list_cat_num]) ): ?>

		<div class="post-list-mag autoheight">

			<?php
				$child_categories = get_term_children($list_cat_id[$list_cat_num], 'category');
				$cat_url = get_category_link($list_cat_id[$list_cat_num]);
				$cat_url = rtrim($cat_url, '/');
				$parent_cat_id = $list_cat_id[$list_cat_num];
			
				if( $child_categories ){// 子カテゴリーがあるとき
					$all_cat_id = $list_cat_id[$list_cat_num];
					$child_categories_total = count($child_categories);
					
					if( get_category($all_cat_id)->parent == 0 ){
						foreach ($child_categories as $key => $value) {
							$all_cat_id .= ','.$value;
							$child_cat_count[$key] = get_category($value)->count;
						}
						$cat_count_child = 0;
						for( $i = 0 ; $i < $child_categories_total; $i++){
							$cat_count_child += $child_cat_count[$i];
						}
						$cat_count = $cat_count_child + get_category($parent_cat_id)->count;
					}else{
						foreach ($child_categories as $key => $value) {
							$all_cat_id .= ','.$value;
							$child_cat_count[$key] = get_category($value)->count;
						}
						$all_cat_id_each = explode(",", $all_cat_id);
						$all_cat_id2 = count($all_cat_id_each);
						$cat_count_child = 0;
						for( $i = 0 ; $i < $all_cat_id2 - 1; $i++){
							$cat_count_child += $child_cat_count[$i];
						}
						$cat_count = $cat_count_child + get_category($parent_cat_id)->count;
					}
				}
				else{// 子カテゴリーがないとき
					$cat_count = get_category($parent_cat_id)->count;
				}
				$args = array(
					'cat' => array($parent_cat_id),
					'posts_per_page' => get_option('posts_per_page'),
				);
				$the_query = new WP_Query( $args );
			?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post() ?>
			<?php
				// カテゴリー情報を取得
				$category = get_the_category();
				$cat_id   = $category[0]->cat_ID;
				$cat_name = $category[0]->cat_name;
			?>

			<?php get_template_part('include/liststyle/parts/post-list-mag-parts'); ?>

			<?php endwhile; ?>

			<?php if( isset( $cat_url ) && $cat_count > get_option('posts_per_page') ) :?>
			
				<?php if( strstr( $cat_url,'/?' ) == false ): ?>
				<div class="more-cat">
					<div class="more-cat-button ef"><a href="<?php echo $cat_url; ?>/page/2/"><span>next</span></a></div>
				</div>
				<?php else: ?>
				<div class="more-cat">
					<div class="more-cat-button ef"><a href="<?php echo $cat_url; ?>&paged=2"><span>next</span></a></div>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	
	<?php $list_cat_num++; ?>
	<?php endwhile; ?>
	
	</div>

</div>
<?php endif; ?>