<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<?php twentyfifteen_post_thumbnail();?>
	<header class="entry-header">
		<?php if(is_single() ) :
				the_title('<h1 class="entry-title">','</h1>');
			else :
				the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');
			endif;
		get_template_part('parts/bread');?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div id="toc"></div>
		<?php the_content(sprintf(__('Continue reading %s','twentyfifteen'),the_title('<span class="screen-reader-text">','</span>',false)));//%s=Name of current post
			wp_link_pages(array(
				'before'      =>'<div class="page-links"><span class="page-links-title">' . __('Pages:','twentyfifteen') . '</span>',
				'after'       =>'</div>',
				'link_before' =>'<span>',
				'link_after'  =>'</span>',
				'pagelink'    =>'<span class="screen-reader-text">' . __('Page','twentyfifteen') . ' </span>%',
				'separator'   =>'<span class="screen-reader-text">,</span>',));?>
	</div><!-- .entry-content -->
  <?php get_template_part('parts/snsbutton');?>
	<h2 class="related-title">関連記事</h2>
	<div class="swiper-container"><div class="swiper-wrapper"><?php get_template_part('parts/related');?></div></div>
	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta();
		edit_post_link(__('Edit','twentyfifteen'),'<span class="edit-link">','</span>');?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->