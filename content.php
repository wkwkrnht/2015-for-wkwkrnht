<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<header class="entry-header">
		<?php if(is_single() ) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())), '</a></h2>');
			endif;?>
			<?php if ( !is_home() && !is_front_page() ) :
				$cat = is_single() ? get_the_category() : array(get_category($cat));
				if($cat && !is_wp_error($cat)){
			    	$par = get_category($cat[0]->parent);
			    	echo '<div class="bread">';
			    	echo '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.home_url().'" itemprop="url"><span itemprop="title">ホーム</span></a></div>';
			    	while($par && !is_wp_error($par) && $par->term_id != 0){
			         	$echo = '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a></div>'.$echo;
			         	$par = get_category($par->parent);}
			    	echo $echo.'<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a></div>';
			    	echo '</div>';}endif; ?><!-- /#breadcrumb -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(sprintf( __( 'Continue reading %s', 'twentyfifteen' ),the_title( '<span class="screen-reader-text">', '</span>', false )) );//%s=Name of current post
			wp_link_pages(array(
				'before'      =>'<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       =>'</div>',
				'link_before' =>'<span>',
				'link_after'  =>'</span>',
				'pagelink'    =>'<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   =>'<span class="screen-reader-text">, </span>',) );?>
	</div><!-- .entry-content -->
	<div class="related-entries">
  	<h3>関連記事</h3>
		<?php $categories = get_the_category($post->ID);
		$category_ID = array();
		foreach($categories as $category):
  		array_push($category_ID, $category -> cat_ID);
		endforeach ;
		$args = array(
  		'post__not_in' => array($post -> ID),
  		'posts_per_page'=> 5,
  		'category__in' => $category_ID,
  		'orderby' => 'rand',);
		$query = new WP_Query($args);
  	if( $query -> have_posts() ): while ($query -> have_posts()) : $query -> the_post();?>
    <div class="related-entry">
      <div class="related-entry-thumb">
  			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        	<?php if(has_post_thumbnail()):
        		echo get_the_post_thumbnail($post->ID, 'thumb100');
        	else:
         		echo ('<img src="/wp-content/themes/2015-for-wkwkrnht/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="100px" />');
        	endif;?>
        </a>
      </div><!-- /.related-entry-thumb -->
      <div class="related-entry-content">
        <h4 class="related-entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
        <p class="related-entry-snippet">
       <?php echo mb_substr( strip_tags( $post->post_content  ),0,30 ) . '';?></p>
      </div><!-- /.related-entry-content -->
    </div><!-- /.new-entry -->
  <?php endwhile;
	else:
  	echo ('<p>記事はありませんでした</p>');
	endif;wp_reset_postdata();?>
	<br style="clear:both;">
	</div><!-- #related-entries -->
	<!--<?php get_template_part('author-bio');?>-->
	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
