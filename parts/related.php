<?php $categories = get_the_category($post->ID);$category_ID=array();
foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
$args=array('posts_per_page'=>8,'post__not_in'=>array($post->ID),'category__in'=>$category_ID,'orderby'=>'rand',);
$query=new WP_Query($args);
  if($query -> have_posts()):?>
    <div id="slide">
      <?php while($query -> have_posts()):$query->the_post();?>
        <div class="swiper-slide content"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
          <?php if(has_post_thumbnail()):echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'=>'thumb'));else:echo'<img src="http://wkwkrnht.wp.xdomain.jp/wp-content/themes/2015-for-wkwkrnht/img/no-img.png" class="thumb" alt="no_thumbnail"/>';endif;?>
          <div class="title"><?php the_title();?></div>
        </a></div>
      <?php endwhile;?>
    </div>
  <?php else:?>
    <div id="slide">
    <?php $args = array('numberposts'=>8,'orderby'=>'rand','post_status'=>'publish','offset'=>1);
    $rand_posts = get_posts($args);
    foreach($rand_posts as $post):?>
      <div class="swiper-slide"><div class="content"><a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>">
        <?php if(has_post_thumbnail()):echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'=>'thumb'));else:echo'<img src="http://wkwkrnht.wp.xdomain.jp/wp-content/themes/2015-for-wkwkrnht/img/no-img.png" class="thumb" alt="no_thumbnail"/>';endif;?>
        <div class="title"><?php the_title();?></div>
      </a></div></div>
    <?php endforeach;?>
    </div>
  <?php endif;?>
<?php wp_reset_postdata();?>