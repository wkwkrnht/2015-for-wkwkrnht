<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<?php twentyfifteen_post_thumbnail();?>
	<header class="entry-header">
		<?php if(is_single()):
				the_title('<h1 class="entry-title">','</h1>');
			else:
				the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');
			endif;
		get_template_part('parts/bread');
		twentyfifteen_entry_meta();?>
	</header>
	<div id="toc"></div>
	<div class="entry-content">
		<?php the_content(sprintf(__('Continue reading %s','twentyfifteen'),the_title('<span class="screen-reader-text">','</span>',false)));//%s=Name of current post
			wp_link_pages(array(
				'before'      =>'<div class="page-links"><span class="page-links-title">' . __('Pages:','twentyfifteen') . '</span>',
				'after'       =>'</div>',
				'link_before' =>'<span>',
				'link_after'  =>'</span>',
				'pagelink'    =>'<span class="screen-reader-text">' . __('Page','twentyfifteen') . ' </span>%',
				'separator'   =>'<span class="screen-reader-text">,</span>',));?>
	</div>
	<footer class="entry-footer">
		<h2>Share Button＆関連記事</h2>
		<div class="swiper-container swiper-wrapper">
			<?php get_template_part('parts/snsbutton');?><?php get_template_part('parts/related');?>
		</div>
	</footer>
</article>
