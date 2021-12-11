<!-- breadcrumb -->
<div id="breadcrumb" class="<?php echo jin_footer_type(); ?>">
	<ul itemscope itemtype="https://schema.org/BreadcrumbList">
		
		<div class="page-top-footer"><a class="totop"><i class="jic jin-ifont-arrowtop"></i></a></div>
		
		<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<a href="<?php echo home_url('/'); ?>" itemid="<?php echo home_url('/'); ?>" itemscope itemtype="https://schema.org/Thing" itemprop="item">
				<i class="jic jin-ifont-home space-i" aria-hidden="true"></i><span itemprop="name">HOME</span>
			</a>
			<meta itemprop="position" content="1">
		</li>
		
		<?php
		$content = 2;
		
		if( is_single() ){
			
			if( get_the_category() != false ){
				
				$category = get_the_category();
				$category_hierarchy = get_category_parents( $category[0]->term_id, true, '////' );
				$category_hierarchy = explode( "////", $category_hierarchy );
				
				foreach( $category_hierarchy as $cat_list ){
					if( !empty( $cat_list ) ){
						$cat_list = preg_replace('/href="(\S+)"/', 'href="$1" itemid="$1"', $cat_list);
						$cat_list = preg_replace('/>/', ' itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">', $cat_list, 1);
						$cat_list = preg_replace('/<\/a>/', '</span></a>', $cat_list);

						echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i>'.$cat_list.'<meta itemprop="position" content="'. $content++. '"></li>';
					}
				}
			}
			
		}elseif (is_category()  ) {
			if( get_the_category() != false ){
				
				global $cat;
				$category_hierarchy = get_category_parents( $cat, true, '////' );
				$category_hierarchy = explode( "////", $category_hierarchy );
				
				foreach( $category_hierarchy as $cat_list ){
					if( !empty( $cat_list ) ){
						$cat_list = preg_replace('/href="(\S+)"/', 'href="$1" itemid="$1"', $cat_list);
						$cat_list = preg_replace('/>/', ' itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">', $cat_list, 1);
						$cat_list = preg_replace('/<\/a>/', '</span></a>', $cat_list);

						echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i>'.$cat_list.'<meta itemprop="position" content="'. $content++. '"></li>';
					}
				}
			}
		}elseif( is_tax() ){
			
			global $post;
				$query_obj = get_queried_object();        
				$query_obj_id = get_queried_object_id();  
				$name = $query_obj->name;                 
				$slug = $query_obj->slug;

				if($query_obj -> parent != 0){
					$ancestor_arr = array_reverse(get_ancestors($query_obj_id, '', 'taxonomy'));
					
					foreach($ancestor_arr as $ancestor){
						$parent_term = get_term($ancestor);
						$parent_slug = $parent_term->slug;
						$parent_name = $parent_term->name;
						$parent_str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><a href="'.$parent_slug.'" itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">'.$parent_name.'</span></a><meta itemprop="position" content="'. $content++. '"></li>';
					}
					$str =$parent_str.'<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'.$name.'</span><meta itemprop="position" content="'. $content. '"></li>';
					
					echo $str;

				}else{
					$str ='<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'.$name.'</span><meta itemprop="position" content="'. $content. '"></li>';
					
					echo $str;
				}
		
		}elseif( is_tag() ){
			
			$tag = single_tag_title("", false);
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'.$tag.'</span><meta itemprop="position" content="'. $content. '"></li>';
			
		}elseif( is_date() ){

			$day = get_query_var('day');
			$month = get_query_var('monthnum');
			$year = get_query_var('year');
			$postTyleLink = get_post_type_archive_link(get_post_type());
			
			if( $day != 0 ){
				
				$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><a href="'.$postTyleLink.'/'.$year.'/" itemid="'.$postTyleLink.'/'.$year.'/" itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">' . $year. '年</span></a><meta itemprop="position" content="2"></li>';
				
				$str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><a href="'.$postTyleLink. '/'.$year.'/'.$month.'/" itemid="'.$postTyleLink.'/'.$year.'/'.$month.'/" itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">'.$month.'月</span></a><meta itemprop="position" content="3"></li>';
				
				$str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'. $day.'日</span><meta itemprop="position" content="4"></li>';
				
			} elseif( $month != 0 ){

				$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><a href="'.$postTyleLink. '/'.$year. '/" itemid="'.$postTyleLink.'/'.$year.'/" itemscope itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">'.$year.'年</span></a><meta itemprop="position" content="2"></li>';

				$str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'. $month.'月</span><meta itemprop="position" content="3"></li>';
				
			} else {
				$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'.$year.'年</span><meta itemprop="position" content="2"></li>';
			}
			echo $str;
			
		}elseif( is_search() ){
			
            $str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">検索結果「'. get_search_query() .'」</span><meta itemprop="position" content="2"></li>';
			
			echo $str;
			
        }elseif( is_author() ){

			$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">投稿者：'. get_the_author_meta( "display_name", get_query_var("author") ).'<meta itemprop="position" content="2"></li>';
			
			echo $str;
		
		}elseif( is_404() ){
			
			$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">ページが見つかりませんでした<meta itemprop="position" content="2"></li>';
			
			echo $str;
			
		}elseif( is_post_type_archive() ){
			$customPostTitle = post_type_archive_title('', false );
			
			$str = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><i class="jic jin-ifont-arrow space" aria-hidden="true"></i><span itemprop="name">'.$customPostTitle.'<meta itemprop="position" content="2"></li>';
			
			echo $str;
		}
		?>
		
		<?php if( is_singular() ):?>
		<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<i class="jic jin-ifont-arrow space" aria-hidden="true"></i>
			<a href="#" itemid="" itemscope itemtype="https://schema.org/Thing" itemprop="item">
				<span itemprop="name"><?php the_title(); ?></span>
			</a>
			<?php echo '<meta itemprop="position" content="'. $content. '">'; ?>
		</li>
		<?php endif; ?>
	</ul>
</div>
<!--breadcrumb-->