<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<header class="entry-header">
		<?php if(is_single() ) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())), '</a></h2>');
			endif;?>
	</header><!-- .entry-header -->
	<?php if ( !is_home() && !is_front_page() ) :
		$cat = is_single() ? get_the_category() : array(get_category($cat));
		if($cat && !is_wp_error($cat)){
	    	$par = get_category($cat[0]->parent);
	    	echo '<div class="bread">';
	    	echo '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_bloginfo('url').'" itemprop="url"><span itemprop="title">ホーム</span></a><span class="sp">&gt;</span></div>';
	    	while($par && !is_wp_error($par) && $par->term_id != 0){
	         	$echo = '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a><span class="sp">&gt;</span></div>'.$echo;
	         	$par = get_category($par->parent);}
	    	echo $echo.'<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a></div>';
	    	echo '</div>';}endif; ?><!-- /#breadcrumb -->
	<div class="entry-content">
		<?php the_content( sprintf( __( 'Continue reading %s', 'twentyfifteen' ),the_title( '<span class="screen-reader-text">', '</span>', false )) );//%s=Name of current post
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',) );?>
	</div><!-- .entry-content -->
	<?php get_template_part( 'author-bio' );?>
	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
