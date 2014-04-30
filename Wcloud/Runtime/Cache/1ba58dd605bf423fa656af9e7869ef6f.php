<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8" />
    <title><?php echo ($title); ?></title> 
    <meta name="description" content="The clouds are pale and a light breeze is blowing" />
    <meta name="keywords" content="clouds, Dai, DaiQingping, Ariel, html5, css3, Bootstrap" />
    <meta name="author" content="DaiQingping" />
    <!-- end: Meta -->
	
	<!-- sina weibo -->
    <meta property="wb:webmaster" content="49a6a2a99ec3295d" />
    <!-- QQ -->
    <meta property="qc:admins" content="7155245674754631611006375" />

	<!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- end: Mobile Specific -->
    
    <!-- start: Facebook Open Graph -->
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- end: Facebook Open Graph -->

    <!-- start: CSS -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic" />
    <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/parallax-slider.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/common.css" rel="stylesheet" />
    <?php if(is_array($css)): foreach($css as $key=>$vo): ?><link rel="stylesheet" type="text/css" href="__PUBLIC__/css/<?php echo ($vo); ?>.css" /><?php endforeach; endif; ?>
    <script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2834852838" type="text/javascript" charset="utf-8"></script>
    <!--[if lt IE 9 ]>
      <link href="__PUBLIC__/css/styleIE.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9 ]>
      <link href="__PUBLIC__/css/styleIE9.css" rel="stylesheet">
    <![endif]-->
    
    <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <!--start: Header -->
    <header>
        
        <!--start: Container -->
        <div class="container">
            
            <!--start: Row -->
            <div class="row">
                    
                <!--start: Logo -->
                <div class="logo span6">
                    <a class="brand" href="__APP__"><img src="__PUBLIC__/img/logo.png" alt="logo" /></a>
                    <div class="logo_title">The clouds are pale and a light breeze is blowing</div>    
                </div>
                <!--end: Logo -->
                <?php if($_SESSION['member']['username']!= '' OR $_COOKIE['wcloud_username']!= '' ): ?><div class="welcome">
                        <ul>
                            <li>欢迎你，<a href="__APP__/User/index/id/<?php echo ($_SESSION['member']['id'] ? $_SESSION['member']['id'] : $_COOKIE['wcloud_id']); ?>" title="点击进入个人中心"><?php echo (ucwords($_SESSION['member']['username'] ? $_SESSION['member']['username'] : $_COOKIE['wcloud_username'] )); ?></a></li>
                            <li><a href="__APP__/User/logout" title="点击退出登录">退出</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                <!-- login start -->
                <div class="top_login">
                    <ul>
                        <li><a href="__APP__/User/login" title="点击登录" >登录</a></li>
                        <li><a href="__APP__/User/register" title="点击注册">注册</a></li>
                    </ul>
                </div>
                <!-- login end --><?php endif; ?>
            </div>
            <!--end: Row -->

<div class="uc">
  <div class="box-uc register box-register ">
    <div class="box-top">
      <a title="云淡风轻" href="__APP__" class="logo icon">云淡风轻</a>
      <h1 class="text-sign text icon">用户注册</h1>
      <a href="__APP__" title="返回首页" class="home icon">返回</a> 
    </div>
    <div class="box-body">
      <div class="status">
        <div class="sending status-img icon"></div>
        <div class="status-message"></div>
        <a data-url="" class="status-button btn-green icon" target="_blank">查看邮件</a>
      </div>
      <form>
        <label class="shadow-box">
          <input type="text" maxlength="128" placeholder="邮箱" class="name" autocomplete="off" tabindex="1" name="loginname"> <i class="loading"></i>
        </label>
        <label class="shadow-box">
          <input type="text" maxlength="16" placeholder="昵称（2-16位，允许中文字符）" class="name" autocomplete="off" tabindex="2" name="user_name"> <i class="loading"></i>
        </label>
        <div class="tip message login-message"></div>
        <label class="shadow-box">
          <input type="password" maxlength="16" placeholder="密码（4-16位，区分大小写）" class="pass" autocomplete="off" tabindex="3" name="password">    
          <i class="loading"></i>
        </label>
        <div class="captcha-box">
          <label class="shadow-box">
            <input type="text" id="verify" maxlength="4" placeholder="验证码（点击刷新）" autocomplete="off" class="pass" tabindex="4" name="captcha">    
            <i class="loading"></i>
          </label>
          <div class="captcha-img">
            <img src="__APP__/Public/verify" onClick="this.src=this.src+'?'+Math.random();verify.value=''"  title="点击刷新验证码" />
          </div>
        </div>
        <div class="warning message">请输入密码</div>
        <input id="for-register" class="submit-btn btn-blue icon" type="submit" tabindex="5" value="注 册">
      </form>
    </div>
    <div class="box-bottom">
      <span>
        已有帐号？<a href="__URL__/login">点击登录</a>
      </span>
      <i class="loading"></i>
    </div>
  </div>
</div>

<script type="text/javascript">
  var _URL_ = "__URL__";
</script>

</div>  
<!-- end: Under Footer -->

</div>
<!-- end: Container  -->    

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="__PUBLIC__/js/isotope.js"></script>
<script src="__PUBLIC__/js/jquery.imagesloaded.js"></script>
<script src="__PUBLIC__/js/bootstrap.js"></script>
<script src="__PUBLIC__/js/flexslider.js"></script>
<script src="__PUBLIC__/js/carousel.js"></script>
<script src="__PUBLIC__/js/jquery.cslider.js"></script>
<script src="__PUBLIC__/js/slider.js"></script>
<script src="__PUBLIC__/js/fancybox.js"></script>
<script src="__PUBLIC__/js/twitter.js"></script>
<script src="__PUBLIC__/js/jquery.placeholder.min.js"></script>

<script src="__PUBLIC__/js/excanvas.js"></script>
<script src="__PUBLIC__/js/jquery.flot.min.js"></script>
<script src="__PUBLIC__/js/jquery.flot.pie.min.js"></script>
<script src="__PUBLIC__/js/jquery.flot.stack.js"></script>
<script src="__PUBLIC__/js/jquery.flot.resize.min.js"></script>

<script defer="defer" src="__PUBLIC__/js/custom.js"></script>

<?php if(is_array($js)): foreach($js as $key=>$vo): ?><script type="text/javascript" src="__PUBLIC__/js/<?php echo ($vo); ?>.js"></script><?php endforeach; endif; ?>
<!-- end: Java Script -->

<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0117e42c8552a5d23fc297872e840b49' type='text/javascript'%3E%3C/script%3E"));
</script>

</body>
</html>