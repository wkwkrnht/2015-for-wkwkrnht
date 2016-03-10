<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<div class="card-list">
		<div class="card-thumb"><?php twentyfifteen_post_thumbnail();?></div>
		<div class="card-content">
			<span class="card-title"><?php if(is_single()):the_title();else:the_title(sprintf('<a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a>');endif;?></span>
			<span class="card-meta"><?php twentyfifteen_entry_meta();?></span>
		</div>
	</div>
</article>