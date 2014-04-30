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
            <!--start: Row -->
            <div class="row-fluid">
                    
                <!--start: Navigation -->
                <div class="navigation"> 
                
                    <div class="navbar navbar-inverse span9">
                        <div class="navbar-inner">
                            <a class="btn btn-navbar btnOverlay" data-toggle="collapse" data-target=".nav-collapse">
                                menu
                            </a>
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li class="active"><a href="__APP__">首页</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">博客<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="__APP__/Blog/index">技术类</a></li>
                                            <li><a href="__APP__/Blog/life">生活类</a></li>
                                            <li><a href="__APP__/Blog/travel">旅行类</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">说说<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="__APP__/Feeling/index">一句话</a></li>
                                            <li><a href="__APP__/Feeling/more">万千情</a></li>
                                        </ul>
                                    </li>                                   
                                    <li><a href="__APP__/Message/index">留言板</a></li>
                                    <li><a href="__APP__/Thumb/index">相册</a></li>
                                    <li><a href="__APP__/About/index">关于我</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                    <div class="search span3 hidden-tablet hidden-phone">
                        
                        <input type="text" name="search" />
                    
                    </div>
                
                </div>  
                <!--end: Navigation --> 
                    
            </div>
            <!--end: Row -->
            
        </div>
        <!--end: Container-->           
            
    </header>
    <!--end: Header-->
    <?php $uid = $_SESSION['member']['id']; ?>
    <?php echo W('UploadPhoto', array('app_name'=>'Wcloud', 'upload_btn'=>'popup_upload', 'uid'=>$uid));?>

    <!--start: Container -->
    <div class="container">
        <!-- command icon start -->
        <div class="command_icon">
            <a href="javascript:void(0)" class="command"><img src="__PUBLIC__/icons/net-vibes.png" title="写点什么" alt="写点什么"></a>
            <ul style="display:none;">
                <li><a href="<?php echo U('Admin/index');?>"><img src="__PUBLIC__/icons/blogger.png" title="写博客" alt="写博客"></a></li>
                <li><a href="<?php echo U('Feeling/index');?>"><img src="__PUBLIC__/icons/tech.png" title="写说说" alt="写说说"></a></li>
                <li><a href="<?php echo U('Message/index');?>"><img src="__PUBLIC__/icons/gmail.png" title="写留言" alt="写留言"></a></li>
                <li><a href="javascript:void(0)" class="popup_upload"><img src="__PUBLIC__/icons/vidderler.png" title="传照片" alt="传照片"></a></li>
            </ul>
        </div>
        <script type="text/javascript">
            $(function() {
                $('.command_icon').hover(function() {
                    $(this).find('ul').css('display', 'block');
                }, function() {
                    $(this).find('ul').css('display', 'none');
                });
            });
        </script>
        <!-- command icon end -->
        <!--start: Wrapper-->
        <div id="wrapper">
<!-- start: Page Title -->
<div id="page-title">

	<div id="page-title-inner">

			<h2><?php echo ($title); ?></h2>

	</div>	

</div>
<!-- end: Page Title -->

<!-- start: Row -->
<div class="row-fluid">

	<!-- start: Contact Form -->
	<div class="span12">
		
		<div class="title"><h3>About Us</h3></div>
		<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
		</p>
	
	</div>

</div>

<!-- start: Row -->
<div class="row-fluid">

	<div class="span12">	
		<!-- start: Beditor Form -->
		<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
		<script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.min.js"></script>
		<form id="form" action="" method='post'>
			<span>博客类型：</span>
			<select name="type">
				<option value="1">技术类</option>
				<option value="2">生活类</option>
				<option value="3">旅行类</option>
			</select>
			<br />
			<span>博客标题：</span><input type="text" name='title'>
			<textarea type="text/plain" name="article" id="myEditor"></textarea>
		</form>
		<div class="actions">
			<button onclick="document.getElementById('form').submit()" class="btn">发表博客</button>
		</div>
		<script type="text/javascript">
		    var editor_a = UE.getEditor('myEditor',{initialFrameHeight:500});

		    var doc=document,
		        version=editor_a.options.imageUrl||"php",
		        form = doc.getElementById("form");
		        form.action="__URL__/do_add";

		</script>
		<!-- end: Beditor Form -->
	</div>
</div>	
<!-- end: Row -->

    </div>
    <!-- end: Wrapper  -->          

</div>
<!--end: Container-->

<!-- start: Container -->
<div class="container">

<!-- start: Under Footer -->
<div id="under-footer">
    
    <!-- start: Row -->
    <div class="row-fluid">

        <!-- start: Under Footer Logo -->
        <div class="span2">
            <div id="under-footer-logo">
                <a class="brand" href="__APP__">W<span>C</span>loud</a>
            </div>
        </div>
        <!-- end: Under Footer Logo -->

        <!-- start: Under Footer Copyright -->
        <div class="span9">
            
            <div id="under-footer-copyright">
                &copy; 2013, <a href="#">creativeLabs</a>. Designed by <a href="#">daiqingping</a> in BeiJing <img src="__PUBLIC__/img/poland.png" alt="Poland" style="margin-top:-4px" />
            </div>
            
        </div>
        <!-- end: Under Footer Copyright -->

        <!-- start: Under Footer Back To Top -->
<!--         <div class="span1">
        
    <div id="under-footer-back-to-top">
        <a href="#"></a>
    </div>

</div> -->
        <!-- end: Under Footer Back To Top -->
    
    </div>
    <!-- end: Row -->
<!-- back-to-top start -->
<div id="all_top">
    <span><a class="fhdb1" href="javascript:void(0);" title="点击返回顶部"></a></span>
<!--     <span><a class="fhdb2 popup_upload" href="javascript:;"></a></span>
    <span><a class="fhdb3" href="javascript:;"></a></span> -->
</div>
<script type="text/javascript">
$(function(){
    //返回顶部
    $(window).scroll(function(){
        var a = document.documentElement.scrollTop==0? document.body.clientHeight : document.documentElement.clientHeight;
        var b = document.documentElement.scrollTop==0? document.body.scrollTop : document.documentElement.scrollTop;
        var c = document.documentElement.scrollTop==0? document.body.scrollHeight : document.documentElement.scrollHeight;
        
        if(a+b > (c-150)){
            $('#all_top').css({bottom:'250px'})
            
        }else{
            $('#all_top').css({bottom:'50px'})
        }
        if($(document).scrollTop() >= 200){
            $('#all_top').fadeIn(2000);
            $('#baby_more').css('display','block');
        }else{
            $('#all_top').fadeOut();    
        };  
    
    });
    $('#all_top .fhdb1').click(function(){
        $(document).scrollTop(0);   
    }); 
});    
</script>
<!-- back-to-top end -->    
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
<div style="display:none">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0117e42c8552a5d23fc297872e840b49' type='text/javascript'%3E%3C/script%3E"));
</script>
</div>
</body>
</html>