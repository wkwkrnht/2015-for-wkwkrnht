<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<div class="card-list">
		<div class="thumb"><?php twentyfifteen_post_thumbnail();?></div>
		<div class="content">
			<div class="title"><?php if(is_single()):the_title();else:the_title(sprintf('<a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a>');endif;?></div>
			<?php echo'<div class="meta">';twentyfifteen_entry_meta();echo'</div>';?>
		</div>
	</div>
</article>