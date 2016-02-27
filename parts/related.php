<?php $categories = get_the_category($post->ID);$category_ID = array();
foreach($categories as $category):
  array_push($category_ID,$category -> cat_ID);
endforeach ;
$args = array('posts_per_page'=> 8,'post__not_in' => array($post -> ID),'category__in' => $category_ID,'orderby' => 'rand',);
$query = new WP_Query($args);
  if($query -> have_posts()):
   while ($query -> have_posts()) : $query -> the_post();?>
    <div class="content swiper-slide">
      <div class="thumb"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
        <?php if(has_post_thumbnail()):
         echo get_the_post_thumbnail($post->ID,'thumb');
        else:?>
         <img src="/img/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="200px"/>
        <?php endif;?>
        </a>
      </div>
      <div class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
    </div>
  <?php endwhile;
  else:?>
    <?php $args = array('numberposts'=>8,'orderby'=>'rand','post_status'=>'publish','offset'=>1);
    $rand_posts = get_posts($args);
    foreach($rand_posts as $post) :?>
      <div class="content swiper-slide">
        <div class="thumb"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
          <?php if(has_post_thumbnail()):
            echo get_the_post_thumbnail($post->ID,'thumb');
          else:?>
            <img src="/img/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="200px"/>
          <?php endif;?>
        </a></div>
        <div class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
      </div>
    <?php endforeach;?>
  <?php endif;?>
<?php wp_reset_postdata();?>
<br style="clear:both;">