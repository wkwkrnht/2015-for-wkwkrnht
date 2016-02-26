<div class="related-entry">
  <h3>関連記事</h3>
  <?php $categories = get_the_category($post->ID);
  $category_ID = array();
  foreach($categories as $category):
    array_push($category_ID, $category -> cat_ID);
  endforeach;
  $args = array(
    'post__not_in' => array($post -> ID),
    'posts_per_page'=> 5,
    'category__in' => $category_ID,
    'orderby' => 'rand',);
  $query = new WP_Query($args);
  if( $query -> have_posts() ): while ($query -> have_posts()) : $query -> the_post();?>
  <div class="content">
    <div class="thumb">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php if(has_post_thumbnail()){echo get_the_post_thumbnail($post->ID);}else{echo('<img src="img/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="100px" />');}?>
      </a>
      <div class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
    </div>
  </div><!--related-entry--> <?php endwhile;?>
