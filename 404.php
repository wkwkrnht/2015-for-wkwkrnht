<?php get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.','twentyfifteen');?></h1>
					<p><?php _e('It looks like nothing was found at this location. Maybe try a search?','twentyfifteen');?></p>
					<?php get_search_form();?>
				</header>
				<div id="page-content">
					<h2>カテゴリから検索</h2>
					<h2>タグから検索</h2>
					<?php wp_tag_cloud();?>
				</div>
			</section>
		</main>
	</div>
<?php get_footer();?>