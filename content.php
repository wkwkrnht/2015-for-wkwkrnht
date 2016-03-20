<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<header class="entry-header">
		<?php twentyfifteen_post_thumbnail();
		get_template_part('parts/bread');
		if(is_single()){the_title('<h1 class="entry-title">','</h1>');}else{the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');};
		echo'<div class="meta">';twentyfifteen_entry_meta();echo'</div>';?>
	</header>
	<section class="entry-content">
		<?php the_content(sprintf(__('Continue reading %s','twentyfifteen'),the_title('<span class="screen-reader-text">','</span>',false)));//%s=Name of current post
			wp_link_pages(array(
				'before'      =>'<div class="page-links"><span class="page-links-title">' . __('Pages:','twentyfifteen') . '</span>',
				'after'       =>'</div>',
				'link_before' =>'<span>',
				'link_after'  =>'</span>',
				'pagelink'    =>'<span class="screen-reader-text">' . __('Page','twentyfifteen') . ' </span>%',
				'separator'   =>'<span class="screen-reader-text">,</span>',));?>
	</section>
	<footer class="entry-footer">
		<h2>Share＆関連記事</h2>
		<div id="slide">
			<?php get_template_part('parts/snsbutton');get_template_part('parts/related');?>
		</div>
	</footer>
</article>