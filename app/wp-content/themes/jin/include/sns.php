<?php
	$site_name = trim( get_bloginfo('name'));
	$tw_name = get_the_tw_code();
	$site_hashtag = get_theme_mod('sns_hashtag',"");
	if( ! $site_hashtag == null){
		$explode_site_hashtag = explode(' ', $site_hashtag);
		$implode_site_hashtag = implode(',', $explode_site_hashtag);
	}
	

	if( is_category() ){
		$t_id = get_category( intval( get_query_var('cat') ) )->term_id;
		$url_encode = get_category_link($t_id);
		
		$cat_class = get_category($t_id);
		$cat_option = get_option($t_id);

		if( isset($cat_option['cps_meta_title']) && $cat_option['cps_meta_title'] !== '' ){
			$title_encode = $cat_option['cps_meta_title']." - ".$site_name;
		}else{
			$title_encode = $cat_class->name." - ".$site_name;
		}
	}else{
		$url_encode = urlencode(get_permalink());
		$title_encode = urlencode(get_the_title())." - ".$site_name;
		
		//ハッシュタグ取得
		$get_hashtags = get_post_meta($post->ID, 'jin_hashtag',true);
		$explode_hashtag = explode(' ', $get_hashtags);
		$implode_hashtag = implode(',', $explode_hashtag);
		if( ! $site_hashtag == null){
			if( ! $get_hashtags == null ){
				$sns_hashtag = str_replace('#', '', $implode_site_hashtag.",".$implode_hashtag);
			}else{
				$sns_hashtag = str_replace('#', '', $implode_site_hashtag);
			}
		}else{
			$sns_hashtag = str_replace('#', '', $implode_hashtag);
		}
	}


?>
<?php if( ! get_post_meta( $post->ID, "custom_postsns_off", true) == 'この記事でSNSボタンを表示しない' ) : ?>
<div class="share <?php is_sns_design_type(); ?>">
	<div class="sns">
		<ol>
			<!--ツイートボタン-->
			<?php if( function_exists('scc_get_share_twitter') && ! empty( scc_get_share_twitter() ) ): ?>
				<li class="twitter"><a href="https://twitter.com/share?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?><?php if( ! $tw_name == null ){echo '&via='.$tw_name;} ?><?php if( ! $sns_hashtag == null ){echo '&hashtags='.$sns_hashtag;} ?><?php if( ! $tw_name == null ){echo '&related='.$tw_name;} ?>"><i class="jic jin-ifont-twitter"></i><span>&nbsp;<?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>
				</li>
			<?php else: ?>
				<li class="twitter"><a href="https://twitter.com/share?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?><?php if( ! $tw_name == null ){echo '&via='.$tw_name;} ?><?php if( ! $sns_hashtag == null ){echo '&hashtags='.$sns_hashtag;} ?><?php if( ! $tw_name == null ){echo '&related='.$tw_name;} ?>"><i class="jic jin-ifont-twitter"></i></a>
				</li>
			<?php endif; ?>
			<!--Facebookボタン-->
			<?php if( function_exists('scc_get_share_facebook') && ! empty( scc_get_share_facebook() ) ): ?>
				<li class="facebook">
				<a href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="jic jin-ifont-facebook-t" aria-hidden="true"></i>&nbsp;<span><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>
				</li>
			<?php else: ?>
				<li class="facebook">
				<a href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="jic jin-ifont-facebook-t" aria-hidden="true"></i></a>
				</li>
			<?php endif; ?>
			<!--はてブボタン-->
			<?php if( function_exists('scc_get_share_hatebu') && ! empty( scc_get_share_hatebu() ) ): ?>
				<li class="hatebu">
				<a href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" ><i class="font-hatena"></i>&nbsp;<span><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>
				</li>
			<?php else: ?>
				<li class="hatebu">
				<a href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" ><i class="font-hatena"></i></a>
				</li>
			<?php endif; ?>
			<!--Poketボタン-->
			<?php if( function_exists('scc_get_share_pocket') && ! empty( scc_get_share_pocket() ) ): ?>
				<li class="pocket">
				<a href="https://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><i class="jic jin-ifont-pocket" aria-hidden="true"></i>&nbsp;<span><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>
				</li>
			<?php else: ?>
				<li class="pocket">
				<a href="https://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><i class="jic jin-ifont-pocket" aria-hidden="true"></i></a>
				</li>
			<?php endif; ?>
				<li class="line">
				<a href="https://line.me/R/msg/text/?<?php echo $url_encode;?>"><i class="jic jin-ifont-line" aria-hidden="true"></i></a>
				</li>
		</ol>
	</div>
</div>

<?php endif; ?>