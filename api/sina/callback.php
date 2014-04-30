<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}

if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
    $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
    $ms  = $c->home_timeline(); // done
    $uid_get = $c->get_uid();
    $uid = $uid_get['uid'];
    $user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
    $_SESSION['member']['username'] = $user_message['screen_name'];
?>    
    
} else {
?>
    授权失败，<a id="href" href="http://wcloud.sinaapp.com/index.php/User/login">返回</a> 等待时间： <span id="wait">3</span>;
<?php    
}
?>
<script type="text/javascript">
(function(){
    var wait = document.getElementById('wait'),href = document.getElementById('href').href;
    var interval = setInterval(function(){
        var time = --wait.innerHTML;
        if(time == 0) {
            location.href = href;
            clearInterval(interval);
        };
    }, 1000);
})();
</script>
