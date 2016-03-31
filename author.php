<?php get_header();?>
<div id="content" class="narrowcolumn">
    <?php $curauth=(isset($_GET['author_name']))?get_user_by('slug',$author_name):get_userdata(intval($author));?>
    <h2>作成者:<?php echo $curauth->nickname;?></h2>
    <dl>
        <dt>Web サイト</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
        <dt>プロフィール</dt>
        <dd><?php echo $curauth->user_description; ?></dd>
    </dl>
    <h2><?php echo $curauth->nickname;?> の投稿:</h2>
    <ul>
    <?php if(have_posts()):while(have_posts()):the_post();?>
        <li>
            <a href="<?php the_permalink();?>" rel="bookmark" title="Permanent Link:<?php the_title();?>">
            <?php the_title(); ?></a>,
            <?php the_time('Y年n月j日');?> (カテゴリー:<?php the_category('&');?>)
        </li>
    <?php endwhile;else:?>
        <p><?php _e('この作成者の投稿はありません。');?></p>
    <?php endif;?>
    </ul>
</div>
<?php get_footer();?>