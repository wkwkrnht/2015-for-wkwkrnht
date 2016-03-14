<?php
//add_option
add_option('blogkeyword');
add_option('ganalytics');
add_option('gsearchconsole');
add_option('bingwebmastertools');
add_option('Pushdog');
add_option('Push7');
add_option('OnePush');
add_option('LINE@');
add_option('twitter');
add_option('facebook');
add_option('fb:admins');
add_option('fb:app_id');
//update_option
if($_REQUEST['blogname'])update_option('blogname',$_REQUEST['blogname']);
if($_REQUEST['blogdescription'])update_option('blogdescription',$_REQUEST['blogdescription']);
if($_REQUEST['blogkeyword'])update_option('blogkeyword',$_REQUEST['blogkeyword']);
if($_REQUEST['ganalytics'])update_option('ganalytics',$_REQUEST['ganalytics']);
if($_REQUEST['gsearchconsole'])update_option('gsearchconsole',$_REQUEST['gsearchconsole']);
if($_REQUEST['bingwebmastertools'])update_option('bingwebmastertools',$_REQUEST['bingwebmastertools']);
if($_REQUEST['Pushdog'])update_option('Pushdog',$_REQUEST['Pushdog']);
if($_REQUEST['Push7'])update_option('Push7',$_REQUEST['Push7']);
if($_REQUEST['OnePush'])update_option('OnePush',$_REQUEST['OnePush']);
if($_REQUEST['LINE@'])update_option('LINE@',$_REQUEST['LINE@']);
if($_REQUEST['twitter'])update_option('twitter',$_REQUEST['twitter']);
if($_REQUEST['facebook'])update_option('facebook',$_REQUEST['facebook']);
if($_REQUEST['fb:admins'])update_option('fb:admins',$_REQUEST['fb:admins']);
if($_REQUEST['fb:app_id'])update_option('fb:app_id',$_REQUEST['fb:app_id']);
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
        <th scope="row"><label for="blogkeyword">キーワード</label></th>
        <td><input name="blogkeyword" type="text" value="<?php echo get_option('blogkeyword');?>" class="regular-text">
        <p class="description">このサイトのキーワード</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="ganalytics">Google Analyticsのコード</label></th>
        <td><input name="ganalytics" type="text" value="<?php echo get_option('ganalytics');?>" class="regular-text">
        <p class="description">UA-********-*となる様に入力して下さい</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="gsearchconsole">Google Search Consoleのコード</label></th>
        <td><input name="gsearchconsole" type="text" value="<?php echo get_option('gsearchconsole');?>" class="regular-text">
        <p class="description">content="***"の***の部分のみ入力して下さい</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="bingwebmastertools">bing Webmaster Toolsのコード</label></th>
        <td><input name="bingwebmastertools" type="text" value="<?php echo get_option('bingwebmastertools');?>" class="regular-text">
        <p class="description">content="***"の***の部分のみ入力して下さい</p></td>
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
    <tr valign="top">
        <th scope="row"><label for="fb:admins">fb:admins</label></label></th>
        <td><input name="fb:admins" type="text" value="<?php echo get_option('fb:admins');?>" class="regular-text">
        <p class="description">OGP用admins</p></td>
    </tr>
    <tr valign="top">
        <th scope="row"><label for="fb:app_id">fb:app_id</label></label></th>
        <td><input name="fb:app_id" type="text" value="<?php echo get_option('fb:app_id');?>" class="regular-text">
        <p class="description">OGP用app_id</p></td>
    </tr>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="保存"></p>
</form>