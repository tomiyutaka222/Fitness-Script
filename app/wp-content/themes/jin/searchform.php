<div class="search-contents">
	<span class="contents-title">- SERACH FORM -</span>
	<form class="search-box" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
		<input type="search" placeholder="キーワード検索" class="text search-text" value="" name="s" id="s">
		<input type="submit" id="searchsubmit" value="&#xe931;">
	</form>
	<div class="tag-contents">
		<!-- 登録されているタグを15件分表示 -->
		<?php
		$tags = get_tags();
		$tag_count = 0;
		foreach ($tags as $tag) {
			echo '<a href="' . get_tag_link($tag->term_id) . '"><button class="tag-search-button">' . $tag->name . '</button></a>';
			$tag_count++;
			if ($tag_count >= 15) {
				return;
			}
		}
		?>
	</div>
</div>