<?php get_header();?>
 <div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
   <?php if(have_posts()):?>
     <?php if(is_home() && ! is_front_page()):?>
       <header>
         <h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
       </header>
     <?php endif;?>
     <?php while(have_posts()):the_post();
       if(is_home() || is_front_page()):
         get_template_part('content-card',get_post_format());
        else:
         get_template_part('content',get_post_format());
       endif;
     endwhile;
     the_posts_pagination(array(
       'prev_text'          => __('Previous page','twentyfifteen'),
       'next_text'          => __('Next page','twentyfifteen'),
       'before_page_number' => '<span class="meta-nav screen-reader-text">'.__('Page','twentyfifteen').'</span>',));
   else:
     get_template_part('content','none');
   endif;?>
   </main>
 </div>
<?php get_footer();?>
