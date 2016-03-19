<?php $categories=get_the_category($post->ID);$category_ID=array();
foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
$args=array('posts_per_page'=>3,'post__not_in'=>array($post->ID),'category__in'=>$category_ID,'orderby'=>'rand',);
$query=new WP_Query($args);
  if($query->have_posts()):?>
    <div class="content">
      <?php while($query->have_posts()):$query->the_post();?>
        <a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>"><div class="related">
          <?php if(has_post_thumbnail()):echo get_the_post_thumbnail($post->ID,'related',array('class'=>'thumb'));else:echo'<img src="http://wkwkrnht.wp.xdomain.jp/wp-content/themes/2015-for-wkwkrnht/img/no-img.png" class="thumb" alt="no_thumbnail" width="150px" height="150px"/>';endif;
          the_title('<div class="title">','</div>');?>
        </div></a>
      <?php endwhile;?>
    </div>
    <?php wp_reset_postdata();
  else:?>
    <div class="content">
    <?php $args=array('numberposts'=>3,'orderby'=>'rand','post_status'=>'publish','offset'=>1);
    $rand_posts=get_posts($args);
    foreach($rand_posts as $post):?>
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>"><div class="related">
        <?php if(has_post_thumbnail()):echo get_the_post_thumbnail($post->ID,'related',array('class'=>'thumb'));else:echo'<img src="http://wkwkrnht.wp.xdomain.jp/wp-content/themes/2015-for-wkwkrnht/img/no-img.png" class="thumb" alt="no_thumbnail"/>';endif;
        the_title('<div class="title">','</div>');?>
      </div></a>
    <?php endforeach;?>
    </div>
    <?php wp_reset_postdata();
  endif;?>