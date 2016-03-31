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
	<?php get_sidebar('8');?>
</article>