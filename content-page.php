<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php twentyfifteen_post_thumbnail();
		the_title('<h1 class="entry-title">','</h1>');?>
		<div class="meta"><?php twentyfifteen_entry_meta();?></div>
	</header>
	<div class="entry-content">
		<?php the_content();?>
		<?php wp_link_pages(array('before'=>'<div class="page-links"><span class="page-links-title">' . __('Pages:','twentyfifteen' ) . '</span>','after'=>'</div>','link_before'=>'<span>','link_after'=>'</span>','pagelink'=>'<span class="screen-reader-text">' . __('Page','twentyfifteen' ) . ' </span>%','separator'=>'<span class="screen-reader-text">,</span>',));?>
	</div>
	<footer class="entry-footer">
		<h2>Share＆関連記事</h2>
		<div id="slide">
			<?php get_template_part('parts/snsbutton');get_template_part('parts/related');?>
		</div>
	</footer>
</article>