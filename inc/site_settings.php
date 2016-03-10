<?php
//add_option
add_option('ganalytics');
add_option('twitter');
add_option('facebook');
//update_option
if($_REQUEST['blogname'])update_option('blogname',$_REQUEST['blogname']);
if($_REQUEST['blogdescription'])update_option('blogdescription',$_REQUEST['blogdescription']);
if($_REQUEST['ganalytics'])update_option('ganalytics',$_REQUEST['ganalytics']);
if($_REQUEST['twitter'])update_option('twitter',$_REQUEST['twitter']);
if($_REQUEST['facebook'])update_option('facebook',$_REQUEST['facebook']);
?>
<div id="icon-options-general" class="icon32"></div>
<h2>サイト設定</h2>
<form method="post" action="admin.php?page=site_settings">
    <table class="form-table">
    <tr valign="top">
        <th scope="row"><label for="blogname">サイトのタイトル</label></th>
        <td><input name="blogname" type="text" value="<?php echo get_option('blogname');?>" class="regular-text"></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="blogdescription">キャッチフレーズ</label></th>
        <td><input name="blogdescription" type="text" value="<?php echo get_option('blogdescription');?>" class="regular-text">
        <p class="description">このサイトの簡単な説明</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="blogdescription">Google Analyticsのコード</label></th>
        <td><input name="blogdescription" type="text" value="<?php echo get_option('blogdescription');?>" class="regular-text">
        <p class="description">UA-********-*となる様に入力して下さい</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="twitter">Twitterアカウント</label></th>
        <td><input name="twitter" type="text" value="<?php echo get_option('twitter');?>" class="regular-text">
        <p class="description">このサイトの公式アカウント</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="facebook">Facebookアカウント</label></label></th>
        <td><input name="facebook" type="text" value="<?php echo get_option('facebook');?>" class="regular-text">
        <p class="description">このサイトの公式アカウント</p></td>
    </tr>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="保存"></p>
</form>