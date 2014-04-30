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
	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2></h2>
				<p></p>
				<a href="#" class="da-link"></a>
				<div class="da-img" style="margin-left: -600px"><a target="_blank" href="__ROOT__/api/love/index.html"><img src="__PUBLIC__/images/love/love.jpg" alt="爱的告白" /></a></div>
			</div>
			<div class="da-slide">
				<h2>爱的告白</h2>
				<p>被风吹过的夏天</p>
				<a target="_blank" href="__ROOT__/api/love/index.html" class="da-link">READ MORE</a>
				<div class="da-img" style="margin-left: -100px"><a target="_blank" href="__ROOT__/api/love/index.html"><img src="__PUBLIC__/images/love/love1.jpg" alt="爱的告白" /></a></div>
			</div>
			<div class="da-slide">
				<h2></h2>
				<p></p>
				<a target="_blank" href="#" class="da-link"></a>
				<div class="da-img" style="margin-left: -680px"><a target="_blank" href="__ROOT__/api/love/index.html"><img src="__PUBLIC__/images/love/love2.jpg" alt="爱的告白" /></a></div>
			</div>
			<div class="da-slide">
				<h2>想念你</h2>
				<p>I MISS YOU</p>
				<a target="_blank" href="__ROOT__/api/love/index.html" class="da-link">READ MORE</a>
				<div class="da-img" style="margin-left: -200px"><a target="_blank" href="__ROOT__/api/love/index.html"><img src="__PUBLIC__/images/love/love3.jpg" alt="爱的告白" /></a></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>

	</div>
	<!-- end: Slider -->
	
	<hr class="clean" />
	<div class="row-fluid">
		<!-- 广告位：首页中部广告 -->
		<script type="text/javascript" >BAIDU_CLB_SLOT_ID = "877527";</script>
		<script type="text/javascript" src="http://cbjs.baidu.com/js/o.js"></script>
	</div>
	<!-- start: Row -->
	<div class="row-fluid">
		<?php if(is_array($blog)): foreach($blog as $key=>$vo): ?><div class="span3">
		  			<div class="box">
						<i class="fa-icon-resize-full"></i>
						<h3><?php echo ($vo["title"]); ?></h3>
						<h5><?php echo ($vo["username"]); ?></h5>
						<p>
							<?php echo ($vo["article"]); ?>
						</p>
						<div class="clear"></div>
					</div>
				</div><?php endforeach; endif; ?>
	</div>
	<!-- end: Row -->
	
	<hr />
	
	<!-- start: Row -->
		<div class="row-fluid">

		<div class="span9">
			
			<div class="title-out"><h3>相册</h3></div>
			
			<!-- start: Row -->
      		<div class="row-fluid">
				<?php if(is_array($thumb)): foreach($thumb as $key=>$vo): ?><div class="span4">
					<div class="picture">
						<a target="_blank" href="__APP__/Thumb/thumbInfo/id/<?php echo ($vo["thumbid"]); ?>" title="<?php echo ($vo["thumb"]); ?>">
							<img src="__PUBLIC__/upload/<?php echo ($vo["filepath"]); echo ($vo["filename"]); ?>" alt="<?php echo ($vo["thumb"]); ?>" />
							<div class="image-overlay-zoom"></div>
						</a>
						<div class="item-description">
							<h4><a href="__APP__/Thumb/thumbInfo/id/<?php echo ($vo["thumbid"]); ?>"><?php echo ($vo["thumb"]); ?></a></h4>
							<p></p>
						</div>
					</div>
				</div>
				<hr class="visible-phone" /><?php endforeach; endif; ?>
			</div>
			<!-- end: Row -->

		</div>
		
		<hr class="visible-phone" />

		<div class="span3">
			
			<!-- start: List Style -->

			<div class="title-out"><h3>Why graVis?</h3></div>
			<ul class="check_list">
				<li>Fully responsive so your content will always look good on any screen size</li>
				<li>Awesome sliders give you the opportunity to showcase important content</li>
				<li>Tested on iPhone and iPad with Retina Display</li>
				<li>Multiple layout options for home pages, portfolio section & blog section</li>
				<li>We offer very good support because we care about your site as much as you do.</li>
				<li>Over 400 Icons .</li>
			</ul>
			<!-- end: List Style -->
			
		</div>

		</div>
	<!-- end: Row -->
	
	<hr />
	
	<!-- start: Row -->
	<div class="row-fluid">

		<div class="span4">
			<div class="title-out"><h3>Blog</h3></div>
			
			<!-- start: Post -->
			<div class="post">
				<div class="info">
					<span class="post-date">
						<span class="day">1</span>
						<span class="month-year">June, 2012</span>
					</span>
				</div>	
				<div class="post-content">
					<div class="post-title">
						<h4><a href="post.html">Post title</a></h4>
					</div>
					<div class="post-description">
						<p>
							 
						</p>
					</div>
					<a class="post-entry" href="post.html">Read More...</a>
				</div>
			</div>
			<!-- end: Post -->
			
			<!-- start: Post -->
			<div class="post">
				<div class="info">
					<span class="post-date">
						<span class="day">1</span>
						<span class="month-year">June, 2012</span>
					</span>
				</div>	
				<div class="post-content">
					<div class="post-title">
						<h4><a href="post.html">Post title</a></h4>
					</div>
					<div class="post-description">
						<p>
							 
						</p>
					</div>
					<a class="post-entry" href="post.html">Read More...</a>
				</div>
			</div>
			<!-- end: Post -->
				
		</div>
		
		<div class="span4">
			<div class="title-out"><h3>Investor News</h3></div>
			
			<!-- start: Post -->
			<div class="post">
				<div class="info">
					<span class="post-date">
						<span class="day">1</span>
						<span class="month-year">June, 2012</span>
					</span>
				</div>	
				<div class="post-content">
					<div class="post-title">
						<h4><a href="post.html">Post title</a></h4>
					</div>
					<div class="post-description">
						<p>
							 
						</p>
					</div>
					<a class="post-entry" href="post.html">Read More...</a>
				</div>
			</div>
			<!-- end: Post -->
			
			<!-- start: Post -->
			<div class="post">
				<div class="info">
					<span class="post-date">
						<span class="day">1</span>
						<span class="month-year">June, 2012</span>
					</span>
				</div>	
				<div class="post-content">
					<div class="post-title">
						<h4><a href="post.html">Post title</a></h4>
					</div>
					<div class="post-description">
						<p>
							 
						</p>
					</div>
					<a class="post-entry" href="post.html">Read More...</a>
				</div>
			</div>
			<!-- end: Post -->
				
		</div>	

		<div class="span4">
			<div class="title-out"><h3>Current Stock Price</h3></div>
			<div id="stockPrice" class="center" style="height:286px"></div>
		</div>	

	</div>
	<!-- end: Row -->
	
	<hr class="clean" />
	
	<!-- start: Row -->
	<div class="contact row-fluid">
	
		<div class="span9">
			<p>	
				We really love beautiful design, creativeLabs Team.
			</p>	
		</div>
		
		<div class="span3">	
			<button class="btn btn-success btn-large">Stay in touch!</button>
		</div>
	
	</div>
	<!-- end: Row -->		
	
	<hr class="clean" />
			
	<!-- start Clients List -->	
	<div class="clients row-fluid">

		<div class="client span2"><img src="__PUBLIC__/img/logos/1.png" alt="client" /></div>
		<div class="client span2"><img src="__PUBLIC__/img/logos/2.png" alt="client" /></div>
		<div class="client span2"><img src="__PUBLIC__/img/logos/3.png" alt="client" /></div>
		<div class="client span2"><img src="__PUBLIC__/img/logos/10.png" alt="client" /></div>
		<div class="client span2"><img src="__PUBLIC__/img/logos/9.png" alt="client" /></div>
		<div class="client span2"><img src="__PUBLIC__/img/logos/6.png" alt="client" /></div>

	</div>
	<!-- end Clients List -->
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