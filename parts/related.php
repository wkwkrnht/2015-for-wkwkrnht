<?php $categories = get_the_category($post->ID);$category_ID = array();
foreach($categories as $category):
  array_push($category_ID,$category -> cat_ID);
endforeach ;
$args = array(
  'post__not_in' => array($post -> ID),
  'posts_per_page'=> 8,
  'category__in' => $category_ID,
  'orderby' => 'rand',);
$query = new WP_Query($args);
   if($query -> have_posts()):
   while ($query -> have_posts()) : $query -> the_post();?>
    <div class="related-entry">
      <div class="related-entry-thumb">
  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute();?>">
        <?php if (has_post_thumbnail()):
         echo get_the_post_thumbnail($post->ID,'thumb100');
         else:?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="200px"/>
        <?php endif; ?>
        </a>
      </div><!-- /.related-entry-thumb -->
      <div class="related-entry-content">
        <h4 class="related-entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
        <p class="related-entry-read"><a href="<?php the_permalink();?>">記事を読む</a></p>
      </div><!-- /.related-entry-content -->
    </div><!-- /.new-entry -->
  <?php endwhile;
   else:
  echo '<p>記事はありませんでした</p>'
endif;
wp_reset_postdata();?>
<br style="clear:both;">