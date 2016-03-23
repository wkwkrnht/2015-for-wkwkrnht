<?php get_header();?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if(have_posts()):?><header class="page-header"><h1 class="page-title"><?php printf(__('Search Results for: %s','twentyfifteen'),get_search_query());if($wp_query->found_posts > 0)echo'('.$wp_query->found_posts.'件)';?></h1></header>
				<?php while(have_posts()):the_post();get_template_part('content-card');endwhile;the_posts_pagination(array('prev_text'=>__('Previous page','twentyfifteen'),'next_text'=>__('Next page','twentyfifteen'),'before_page_number'=>'<span class="meta-nav screen-reader-text">'.__('Page','twentyfifteen').'</span>',));
			else:get_template_part('content','none');endif;?>
		</main>
	</section>
<?php get_footer();?>
