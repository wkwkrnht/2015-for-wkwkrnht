<?php if(!is_home()&&!is_front_page()):
  $cat = is_single() ? get_the_category():array(get_category($cat));
  if($cat && !is_wp_error($cat)){$par = get_category($cat[0]->parent);
      echo'<div class="bread"><div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.home_url().'" itemprop="url"><span itemprop="title">Home</span></a></div>';
      while($par && !is_wp_error($par) && $par->term_id != 0){$echo = '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a><span class="sp">/</span></div>'.$echo;$par = get_category($par->parent);}
      echo $echo.'<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a><span class="sp">/</span></div></div>';}endif;?>