<?php get_header();?>
<div class="narrowcolumn">
    <?php $curauth=(isset($_GET['author_name']))?get_user_by('slug',$author_name):get_userdata(intval($author));?>
	<header class="author-header">
		<h1>作成者:<?php echo $curauth->nickname;?></h1>
			<p><?php the_author_meta(description,$author);?></p>
		<h2>連絡先</h2>
			<?php $user_data=get_userdata($author);
				if($user_data->Addres){echo"<span>" . $user_data->Addres . "</span>";};
				if($user_data->TEL){echo"<span>" . $user_data->TEL . "</span>";};
				if($user_data->FAX){echo"<span>" . $user_data->FAX . "</span>";};
				if($user_data->user_email){echo"<span>" . $user_data->->user_email . "</span>";};?>
	</header>
	<aside>
		<h2>アカウント一覧</h2>
			<h3 class="section-name">SNS</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->LINE){echo $user_data->LINE . "<br />";};
				if($user_data->twitter){echo $user_data->twitter . "<br />";};
				if($user_data->facebook){echo $user_data->facebook . "<br />";};
				if($user_data->Linkedin){echo $user_data->Linkedin . "<br />";};
				if($user_data->mixi){echo $user_data->mixi . "<br />";};
				if($user_data->Instagram){echo $user_data->Instagram . "<br />";};
				if($user_data->Flickr){echo $user_data->Flickr . "<br />";};
				if($user_data->FourSquare){echo $user_data->FourSquare . "<br />";};
				if($user_data->Swarm){echo $user_data->Swarm . "<br />";};
				if($user_data->Pocket){echo $user_data->Pocket . "<br />";};
				if($user_data->hatebu){echo $user_data->hatebu . "<br />";};
				if($user_data->YO!){echo $user_data->YO! . "<br />";};?></p>
			<h3 class="section-name">Blog</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->user_url){echo $user_data->user_url . "<br />";};
				if($user_data->wordpress.com){echo $user_data->wordpress.com . "<br />";};
				if($user_data->Blogger){echo $user_data->Blogger . "<br />";};
				if($user_data->ameba){echo $user_data->ameba . "<br />";};
				if($user_data->fc2){echo $user_data->fc2 . "<br />";};
				if($user_data->livedoor){echo $user_data->livedoor . "<br />";};
				if($user_data->hatenablog){echo $user_data->hatenablog . "<br />";};
				if($user_data->hatenadiary){echo $user_data->hatenadiary . "<br />";};
				if($user_data->Tumblr){echo $user_data->Tumblr . "<br />";};
				if($user_data->note){echo $user_data->note . "<br />";};
				if($user_data->Medium){echo $user_data->Medium . "<br />";};?></p>
			<h3 class="section-name">Shop</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->Amazonlist){echo $user_data->Amazonlist . "<br />";};
				if($user_data->Yahooactio){echo $user_data->Yahooactio . "<br />";};
				if($user_data->Rakutenaction){echo $user_data->Rakutenaction . "<br />";};
				if($user_data->Rakuma){echo $user_data->Rakuma . "<br />";};
				if($user_data->Merukari){echo $user_data->Merukari . "<br />";};?></p>
			<h3 class="section-name">DEV</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->Github){echo $user_data->Github . "<br />";};
				if($user_data->Bitbucket){echo $user_data->Bitbucket . "<br />";};
				if($user_data->Codepen){echo $user_data->Codepen . "<br />";};
				if($user_data->JSbuddle){echo $user_data->JSbuddle . "<br />";};
				if($user_data->Quita){echo $user_data->Quita . "<br />";};
				if($user_data->xda){echo $user_data->xda . "<br />";};?></p>
			<h3 class="section-name">MOVIE</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->YouTube){echo $user_data->YouTube . "<br />";};
				if($user_data->niconico){echo $user_data->niconico . "<br />";};
				if($user_data->vimeo){echo $user_data->vimeo . "<br />";};
				if($user_data->vine){echo $user_data->vine . "<br />";};
				if($user_data->twitcasting){echo $user_data->twitcasting . "<br />";};
				if($user_data->Skype){echo $user_data->Skype . "<br />";};
				if($user_data->USTREAM){echo $user_data->USTREAM . "<br />";};
				if($user_data->Twitch){echo $user_data->Twitch . "<br />";};
				if($user_data->MixCannel){echo $user_data->MixCannel . "<br />";};?></p>
			<h3 class="section-name">GAME</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->PSN){echo $user_data->PSN . "<br />";};
				if($user_data->XboxLive){echo $user_data->XboxLive . "<br />";};
				if($user_data->Steam){echo $user_data->Steam . "<br />";};
				if($user_data->NINTENDOaccount){echo $user_data->NINTENDOaccount . "<br />";};
				if($user_data->NINTENDONetworkID){echo $user_data->NINTENDONetworkID . "<br />";};
				if($user_data->friendcode){echo $user_data->friendcode . "<br />";};
				if($user_data->UPlay){echo $user_data->UPlay . "<br />";};
				if($user_data->EAOrigin){echo $user_data->EAOrigin . "<br />";};
				if($user_data->EAOrigin){echo $user_data->EAOrigin . "<br />";};
				if($user_data->SQUAREENIXMembers){echo $user_data->SQUAREENIXMembers . "<br />";};
				if($user_data->BANDAINAMCOID){echo $user_data->BANDAINAMCOID . "<br />";};
				if($user_data->SEGAID){echo $user_data->SEGAID . "<br />";};?></p>
			<h3 class="section-name">Others</h3>
			<p><?php $user_data=get_userdata($author);
				if($user_data->Bitcoin){echo $user_data->Bitcoin . "<br />";};
				if($user_data->Pxiv){echo $user_data->Pxiv . "<br />";};
				if($user_data->Slideshare){echo $user_data->Slideshare . "<br />";};?></p>
	</aside>
	<section>
		<h2><?php echo $curauth->nickname;?>の投稿:</h2>
		<ul>
		<?php if(have_posts()):while(have_posts()):the_post();?>
			<li>
				<a href="<?php the_permalink();?>" rel="bookmark" title="Permanent Link:<?php the_title();?>"><?php the_title(); ?></a>,
				<?php the_time('Y年n月j日');?>(カテゴリー:<?php the_category('&');?>)
			</li>
		<?php endwhile;else:?>
			<p><?php _e('この作成者の投稿はありません。');?></p>
		<?php endif;?>
		</ul>
	</section>
</div>
<?php get_footer();?>