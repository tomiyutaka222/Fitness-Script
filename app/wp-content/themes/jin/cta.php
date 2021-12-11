<?php if( get_the_category() != false ): ?>
<?php
	if( ! is_page() ){
		//個別記事用
		$categories = get_the_category();
		$category_id = $categories[0]->cat_ID;
		$cat_option_s = get_option($category_id);
		$cat_cat_s = (isset ($cat_option_s['cps_meta_category'] )) ? $cat_option_s['cps_meta_category'] : "" ;
		$cat_cta_s = (isset ($cat_option_s['cps_meta_cta'])) ? $cat_option_s['cps_meta_cta'] : "";
	}
	if( is_category() ){
		//カテゴリー一覧用
		$t_id = get_query_var('cat');
		$cat_option = get_option($t_id);
		$cat_cat = (isset($cat_option['cps_meta_category']) ) ? $cat_option['cps_meta_category'] : "" ;
		$cat_cta = (isset($cat_option['cps_meta_cta'])) ? $cat_option['cps_meta_cta'] : "" ;
		$cat_none_cta = $cat_option['cps_none_cta'][0];
	}
?>


<?php if( ! get_post_meta( $post->ID, "custom_info_off", true) == 'この記事でお知らせを表示しない' ) : ?>
	<?php if( is_single() && in_category($cat_cat_s) ) : ?>
		<?php
			$args = array(
				'posts_per_page' => '1', //表示件数。-1なら全件表示
				'post_type' => 'cta', //カスタム投稿タイプの名称を入れる
				'include' => $cat_cta_s,
				'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
			);
			$informaitonPost = get_posts($args);
		?>
		<?php if($informaitonPost) : foreach($informaitonPost as $post) : setup_postdata( $post ); ?>
				<section class="cta-content">
					<span class="info-title"><?php the_title(); ?></span>
					<div class="cta-text">
					<?php the_content(); ?>
					</div>
				</section>
		<?php endforeach; endif; wp_reset_postdata(); ?>
	<?php elseif( ! is_category() ) : ?>
		<?php
			$args = array(
				'posts_per_page' => '1', //表示件数。-1なら全件表示
				'post_type' => 'cta', //カスタム投稿タイプの名称を入れる
				'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
			);
			$informaitonPost = get_posts($args);
		?>
		<?php if($informaitonPost) : foreach($informaitonPost as $post) : setup_postdata( $post ); ?>
				<section class="cta-content">
					<span class="info-title"><?php the_title(); ?></span>
					<div class="cta-text">
					<?php the_content(); ?>
					</div>
				</section>
		<?php endforeach; endif; wp_reset_postdata(); ?>
	<?php elseif( is_category() && ! $cat_none_cta == 'CTAを非表示にする' ) : ?>

		<?php if( ! empty($cat_cta) ) :?>
			<?php
				$args = array(
					'posts_per_page' => '1', //表示件数。-1なら全件表示
					'post_type' => 'cta', //カスタム投稿タイプの名称を入れる
					'include' => $cat_cta,
					'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
				);
				$informaitonPost = get_posts($args);
			?>
			<?php if($informaitonPost) : foreach($informaitonPost as $post) : setup_postdata( $post ); ?>
					<section class="cta-content">
						<span class="info-title"><?php the_title(); ?></span>
						<div class="cta-text">
						<?php the_content(); ?>
						</div>
					</section>
			<?php endforeach; endif; wp_reset_postdata(); ?>
		<?php endif;?>

	<?php endif; ?>
<?php endif; ?>
<?php endif; ?>