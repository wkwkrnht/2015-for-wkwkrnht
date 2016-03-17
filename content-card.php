<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<div class="card-list">
		<div class="card-thumb"><?php twentyfifteen_post_thumbnail();?></div>
		<aside class="card-content">
			<div class="card-title"><?php if(is_single()):the_title();else:the_title(sprintf('<a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a>');endif;?></div>
			<div class="card-meta"><?php twentyfifteen_entry_meta();?></div>
		</aside>
	</div>
</article>