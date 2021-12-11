<div class="clearfix"></div>
<?php if( ! get_post_meta( $post->ID, "custom_ad_off", true) == 'この記事で広告を表示しない' ) : ?>
<div class="adarea-box">
	<?php if( ! get_option('ad_single_pc_left') == null || ! get_option('ad_single_pc_right') == null || ! get_option('ad_single_sp') == null ) : ?>
		<?php if ( is_mobile() ) :?>
			<?php if( ! get_option('ad_single_sp') == null ) : ?>
				<div class="sponsor"><?php echo get_option('ad_setting_text'); ?></div>
				<section class="ad-single">
					<div class="sp-bottom-rectangle">
						<?php echo get_option('ad_single_sp'); ?>
					</div>
				</section>
			<?php endif; ?>
		<?php else: ?>
			<?php if( ! get_option('ad_single_pc_left') == null && get_option('ad_single_pc_right') == null ) : ?>
				
				<section class="ad-single">
					
					<div class="center-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_single_pc_left'); ?>
					</div>
				</section>
			<?php elseif( get_option('ad_single_pc_left') == null && ! get_option('ad_single_pc_right') == null ) : ?>
				
				<section class="ad-single">
					
					<div class="center-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_single_pc_right'); ?>
					</div>
				</section>
			<?php elseif( ! get_option('ad_single_pc_left') == null && ! get_option('ad_single_pc_right') == null ) : ?>
				
				<section class="ad-single">
					
					<div class="left-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_single_pc_left'); ?>
					</div>
					<div class="right-rectangle">
						<div class="sponsor-center"><?php echo get_option('ad_setting_text'); ?></div>
						<?php echo get_option('ad_single_pc_right'); ?>
					</div>
					<div class="clearfix"></div>
				</section>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
</div>
<?php endif; ?>