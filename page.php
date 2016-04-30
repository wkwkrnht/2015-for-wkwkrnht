<?php $myAmp=false;$string=$post->post_content;$nowurl=$_SERVER["REQUEST_URI"];if(strpos($nowurl,'amp')!==false&&strpos($string,'<script>')===false&&is_single()){$myAmp=true;};?>
<?php if($myAmp):?>
	<?php get_template_part('amp');?>
<?php else:?>
	<?php get_header();?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php while(have_posts()):the_post();get_template_part('content','page');if(comments_open()||get_comments_number()):comments_template();endif;endwhile;?>
			</main>
		</div>
	<?php get_footer();?>
<?php endif;?>