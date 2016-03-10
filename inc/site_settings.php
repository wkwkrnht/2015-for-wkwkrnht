<?php
//add_option
add_option('ganalytics');
add_option('Pushdog');
add_option('Push7');
add_option('OnePush');
add_option('LINE@');
add_option('twitter');
add_option('facebook');
//update_option
if($_REQUEST['blogname'])update_option('blogname',$_REQUEST['blogname']);
if($_REQUEST['blogdescription'])update_option('blogdescription',$_REQUEST['blogdescription']);
if($_REQUEST['ganalytics'])update_option('ganalytics',$_REQUEST['ganalytics']);
if($_REQUEST['Pushdog'])update_option('twitter',$_REQUEST['Pushdog']);
if($_REQUEST['Push7'])update_option('twitter',$_REQUEST['Push7']);
if($_REQUEST['OnePush'])update_option('twitter',$_REQUEST['OnePush']);
if($_REQUEST['LINE@'])update_option('twitter',$_REQUEST['LINE@']);
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
        <th scope="row"><label for="ganalytics">Google Analyticsのコード</label></th>
        <td><input name="ganalytics" type="text" value="<?php echo get_option('ganalytics');?>" class="regular-text">
        <p class="description">UA-********-*となる様に入力して下さい</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="Pushdog">Pushdog</label></th>
        <td><input name="Pushdog" type="text" value="<?php echo get_option('Pushdog');?>" class="regular-text">
        <p class="description">このサイトの登録URLト</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="Push7">Push7</label></th>
        <td><input name="Push7" type="text" value="<?php echo get_option('Push7');?>" class="regular-text">
        <p class="description">このサイトの登録URLト</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="OnePush">OnePush</label></th>
        <td><input name="OnePush" type="text" value="<?php echo get_option('OnePush');?>" class="regular-text">
        <p class="description">このサイトの登録URLト</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="LINE@">LINE@アカウント</label></th>
        <td><input name="LINE@" type="text" value="<?php echo get_option('LINE@');?>" class="regular-text">
        <p class="description">このサイトの公式アカウント</p></td>
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