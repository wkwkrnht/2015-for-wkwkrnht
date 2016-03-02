<?php $categories = get_the_category($post->ID);$category_ID=array();
foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
$args=array('posts_per_page'=>8,'post__not_in'=>array($post->ID),'category__in'=>$category_ID,'orderby'=>'rand',);
$query=new WP_Query($args);
if(has_post_thumbnail()):$image=get_the_post_thumbnail($post->ID);else:$image=get_stylesheet_directory_uri()echo'/img/no-img.png';endif;
  if($query -> have_posts()):
   while($query -> have_posts()):$query->the_post();?>
    <div class="swiper-slide"><div class="content"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
      <div class="thumb" style="background-image=<?php echo($image)?>"></div>
      <div class="title"><?php the_title();?></div>
    </a></div></div>
  <?php endwhile;
  else:
    $args = array('numberposts'=>8,'orderby'=>'rand','post_status'=>'publish','offset'=>1);
    $rand_posts = get_posts($args);
    foreach($rand_posts as $post):?>
      <div class="swiper-slide"><div class="content"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
        <div class="thumb">
          <?php if(has_post_thumbnail()):
            echo get_the_post_thumbnail($post->ID);
          else:?>
            <img src="<?php echo get_stylesheet_directory_uri();?>/img/no-img.png" alt="NO IMAGE"/>
          <?php endif;?>
        </div>
        <div class="title"><?php the_title();?></div>
      </a></div></div>
    <?php endforeach;?>
  <?php endif;?>
<?php wp_reset_postdata();?>
<br style="clear:both;">