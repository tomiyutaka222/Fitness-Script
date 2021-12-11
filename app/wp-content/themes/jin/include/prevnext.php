<?php if( ! get_option( 'prevnext_entries_delete' ) == '記事下の「次の記事」「前の記事」を非表示にする' ): ?>
	<div id="prev-next" class="clearfix">
		<?php
			$prevpost = get_adjacent_post(false, '', true); //前の記事
			$nextpost = get_adjacent_post(false, '', false); //次の記事
			$time = get_the_time('Y.m.d');
		?>

		<?php if ( $prevpost ) : ?>
			<a class="prev" href="<?php echo get_the_permalink($prevpost->ID); ?>" title="<?php echo get_the_title($prevpost->ID); ?>">
				<div class="metabox">
					<?php if( has_post_thumbnail($prevpost->ID) ) :?>
						<?php echo get_the_post_thumbnail($prevpost->ID, 'cps_thumbnails',array('width ' => '151','height ' => '85')); ?>
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/noimg320.png" width="151" height="85" alt="NO IMAGE" title="NO IMAGE" />
					<?php endif; ?>
					
					<p><?php if(mb_strlen($prevpost->post_title)>36) { $prevtitle= mb_substr($prevpost->post_title,0,36) ; echo $prevtitle.'...' ;
			} else {echo $prevpost->post_title;}?></p>
				</div>
			</a>
		<?php else: ?>
			<div class="prevnext-none prev"></div>
		<?php endif; ?>


		<?php if ( $nextpost ) :?>
			<a class="next" href="<?php echo get_the_permalink($nextpost->ID); ?>" title="<?php echo get_the_title($nextpost->ID); ?>">
				<div class="metabox">
					<p><?php if(mb_strlen($nextpost->post_title)>36) { $nexttitle= mb_substr($nextpost->post_title,0,36) ; echo $nexttitle.'...' ;
		} else {echo $nextpost->post_title;}?></p>

					<?php if( has_post_thumbnail($nextpost->ID) ) :?>
						<?php echo get_the_post_thumbnail($nextpost->ID, 'cps_thumbnails',array('width ' => '151','height ' => '85')); ?>
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/noimg320.png" width="151" height="85" alt="NO IMAGE" title="NO IMAGE" />
					<?php endif; ?>
				</div>
			</a>
		<?php else: ?>
			<div class="prevnext-none next"></div>
		<?php endif; ?>

	</div>
	<div class="clearfix"></div>
<?php endif; ?>