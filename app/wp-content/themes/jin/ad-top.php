<div class="clearfix"></div>
<?php if( ! get_post_meta( $post->ID, "custom_ad_off", true) == 'この記事で広告を表示しない' ) : ?>
	<?php if( ! get_option('ad_single_h1_sp') == null || ! get_option('ad_single_h1_pc') == null ) : ?>
		<?php if ( is_mobile() ) :?>
			<?php if( ! get_option('ad_single_h1_sp') == null ) : ?>
				<div class="sponsor"><?php echo get_option('ad_setting_text'); ?></div>
				<section class="ad-single ad-top-sp">
					<div class="sp-bottom-rectangle">
						<?php echo get_option('ad_single_h1_sp'); ?>
					</div>
				</section>
			<?php endif; ?>
		<?php else: ?>
			<?php if( ! get_option('ad_single_h1_pc') == null ) : ?>
				<div class="sponsor-top"><?php echo get_option('ad_setting_text'); ?></div>
				<section class="ad-single ad-top">
					<div class="center-rectangle">
						<?php echo get_option('ad_single_h1_pc'); ?>
					</div>
				</section>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>