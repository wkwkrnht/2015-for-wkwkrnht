<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="bread"><?php if(!is_home()&&!is_front_page()):
  $cat = is_single() ? get_the_category():array(get_category($cat));
  if($cat && !is_wp_error($cat)){$par = get_category($cat[0]->parent);
      echo'<a href="'.home_url().'" itemprop="url"><span itemprop="title">Home</span></a><span class="sp">/</span>';
      while($par && !is_wp_error($par) && $par->term_id != 0){$echo = '<a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a><span class="sp">/</span>'.$echo;$par = get_category($par->parent);}
      echo $echo.'<a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a>';}endif;?></div>