<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="__ROOT__/<?php echo ($data["app_name"]); ?>/Lib/Widget/UploadPhoto/css/default.css">
<div class="swf_message" style="display:none">
    <div class="swf_message01"></div>
</div>
<div id="swf_upload" style="display:none;">
    <div id="page_upload" class="round">
        <div id="btn_close"></div>
        <form id="swf_form">
            <div class="image_box">
                <label style="margin-left:8px;color:#9a9a9a;width:100%" id="chooseThumb">
                    <span style="float:left;font-size:18px;line-height:28px;">选择相册：</span>
                    <?php if($thumbData): ?><div id="selectThumb">
                            <select name="thumbid" id="thumbid" style="margin-bottom:5px;">
                                <?php if(is_array($thumbData)): foreach($thumbData as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["thumb"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            <span class="swf_addbtn"><a href="javascript:void(0)" class="thumbCreate">新建相册</a></span>
                        </div>
                    <?php else: ?>
                    <span class="swf_createbtn">您还没有相册哦，先<a href="javascript:void(0)" class="thumbCreate">创建</a>一个吧</span>    
                    <div id="selectThumb" style="display:none;">
                        <select name="thumbid" id="thumbid" style="margin-bottom:5px;">
                            <?php if(is_array($thumbData)): foreach($thumbData as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["thumb"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        <span class="swf_addbtn"><a href="javascript:void(0)" class="thumbCreate">新建相册</a></span>
                    </div><?php endif; ?>
                </label>
                <label style="margin-left:8px;color:#9a9a9a;display:none;" id="createThumb">
                    <span style="font-size:18px;">新建相册：</span>
                    <input type="text" id="thumbName" style="margin-bottom:5px;">
                    <a href="javascript:void(0)" id="thumbAdd">添加</a>
                </label>
                <label style="margin-left:8px;color:#9a9a9a;"><span style="font-size:18px;">上传照片</span><span style="color:#f00">（图片上传格式 jpg、jpeg、png、gif，单张图片不大于 5M，最多 20 张）</span></label><br />
                <div id="divFileProgressContainer" style="display:none;"></div>
                <div id="thumbnails"></div>
                <div class="btn_upload round">
                    <span id="spanButtonPlaceholder"></span>
                    <span class="btn_text">选择照片</span>
                </div>
            </div>
            <div class="thumb_info"></div>
            <input class="round swf_btn" id="swf_submit" type="button" value="确定上传">
        </form>
    </div>
</div>
<script type="text/javascript">
    var _basedir = "__ROOT__/<?php echo ($data["app_name"]); ?>/Lib/Widget/UploadPhoto/swfupload/";  // 自定义附件路径 '/'
    var _pre = "";                                                            // 要显示的文件前缀
    var _uploaddir = "__PUBLIC__/upload/";                                       // 文件上传根目录

    var swfu;
    window.onload = function () {
        swfu = new SWFUpload({
            // Backend Settings
            upload_url: "__APP__/UploadPhoto/swf_upload",
            // post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
            
            // File Upload Settings
            file_size_limit : "5 MB",   // 5MB
            file_types : "*.jpg;*.gif;*.png;*.jpeg;",
            file_types_description : "Images",
            file_upload_limit : "20",

            // Event Handler Settings - these functions as defined in Handlers.js
            //  The handlers are not part of SWFUpload but are part of my website and control how
            //  my website reacts to the SWFUpload events.
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,

            // Button Settings
            button_image_url : "__ROOT__/<?php echo ($data["app_name"]); ?>/Lib/Widget/UploadPhoto/images/uploadbtn.png",
            button_placeholder_id : "spanButtonPlaceholder",
            button_width: 42,
            button_height: 42,
            // button_text : '<span class="swf_button">上传图片<span class="swf_buttonSmall">(5 MB)</span></span>',
            // button_text_style : '.swf_button {font-family: 微软雅黑, Arial, sans-serif; font-size: 15px; } .swf_buttonSmall {font-size: 12px; }',
            // button_text_top_padding: 20,
            // button_text_left_padding: -30,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,
            
            // Flash Settings
            flash_url : _basedir + "js/swfupload.swf",

            custom_settings : {
                upload_target : "divFileProgressContainer"
            },
            
            // Debug Settings
            debug: false
        });
    };

    // 删除后重置上传数量限制
    function restLimit() {
        var stats = swfu.getStats();
        stats.successful_uploads--;
        swfu.setStats(stats);
    }

    //函数：获取尺寸
    function getSize(obj) {
        var winWidth = 0;
        var winHeight = 0;
         //获取窗口宽度
         if (window.innerWidth)
               var winWidth = window.innerWidth;
         else if ((document.body) && (document.body.clientWidth))
               var winWidth = document.body.clientWidth;
         //获取窗口高度
         if (window.innerHeight)
               var winHeight = window.innerHeight;
         else if ((document.body) && (document.body.clientHeight))
               var winHeight = document.body.clientHeight;
         //获取界面宽高
        var docw = $(obj).width();
        var doch = $(obj).height();
        var WWT = (winWidth-docw)/2;
        var WHT = (winHeight-doch)/2
        $(obj).css({left:WWT+'px',top:WHT+'px'});
    }
    

    //创建屏障
    function barrier(){
        var _docH = $(document).height();
        var _docW = $(document).width();
        $('body').append('<div id="barrier"></div>');
        $('#barrier').css({width:_docW+'px',height:_docH+'px',display:'block',position:'absolute',background:'#fff',top:'0',left:'0',zIndex:'9999',opacity: 0.5});
    }

    // 相关操作
    $(function() {
        // 打开上传浮层
        $(".<?php echo ($data["upload_btn"]); ?>").click(function(){
            var uid = "<?php echo ($data["uid"]); ?>";
            if (!uid) {
                window.location.href="__APP__/User/login";
            } else {
                barrier();
                getSize('#swf_upload');
                $('#swf_upload').css({display:'block',zIndex:'10000'});
            }
        });

        window.onresize=getSize('#swf_upload');
        
        // 创建相册
        $('.thumbCreate').live('click',function() {
            swf_close('#chooseThumb');
            swf_open('#createThumb');
        });

        // 添加相册
        $('#thumbAdd').click(function() {
            var thumb = $('#thumbName').val();
            $.ajax({
               type: "POST",
               url: "__APP__/UploadPhoto/createThumb",
               data: "thumb="+thumb+"&uid=<?php echo ($data["uid"]); ?>",
               dataType: "json",
               success: function(data){
                    if (data.message) {
                        swf_message('swf_message02', data.message);
                    } else if (data.id) {
                        $('#thumbid').prepend('<option value="'+data.id+'">'+thumb+'</option>');
                        $('.swf_createbtn').remove();
                        swf_close('#createThumb');
                        swf_open('#selectThumb', '#chooseThumb');
                    }
               }
            });
        });

        // 点击上传按钮，使上传浮层固定
        $('.btn_upload').click(function() {
            $('#page_upload').css('position', 'relative');
        });

        // 关闭上传浮层
        $("#btn_close").click(function() {
            swf_close('#swf_upload', '#barrier');
            $('#page_upload').css('position', 'fixed');
        });

        // 鼠标滑过效果
        $("#thumbnails div").live("mouseover", function() {
            $(this).find("span").css('display','inline-block');
        });

        // 鼠标移出效果
        $("#thumbnails div").live("mouseout", function() {
            $(this).find("span").css('display','none');
        });

       // 图片删除
        $(".swf_delete").live("click", function() {
            var _this = $(this);
            var path = _this.parent().parent().find("input[name='swf_path[]']").val();
            var file = _this.parent().parent().find("input[name='swf_file[]']").val();
            $.ajax({
               type: "POST",
               url: "__APP__/UploadPhoto/swf_del",
               data: "path="+path+"&file="+file,
               success: function(){
                    // 判断删除的是否是封面图
                    if (_this.prev().attr('node') == 'true') {
                        $('.thumb_info').find("input[name='cover_path']").remove();
                        $('.thumb_info').find("input[name='cover_file']").remove();                        
                    }
                    _this.parent().parent().remove();
                    restLimit();// 重置上传数量
               }
            });
        });

        // 设为封面
        $(".swf_cover").live("click", function() {
            var _this = $(this);
            if(_this.attr('node') == 'false'){
                clearCover();
                $("#thumbnails").find("a[node='true']").attr('node','false');
                _this.attr('node','true');
                _this.addClass('cover');
                _this.parent().parent().css('border', '2px solid #FF3366');
                _this.parent().parent().addClass('round');
                _this.parent().parent().find("input[name='swf_cover[]']").val('1');
            } else if (_this.attr('node') == 'true'){
                clearCover();
                _this.attr('node','false');
            }
        });

        // 图片标题输入框获取焦点
        $('.swf_newText').live('focus', function() {
            if ($(this).val() == '请输入图片标题') {
                $(this).val('');
                $(this).css('color', '#000');
            }
        });

        // 图片标题输入框失去焦点
        $('.swf_newText').live('blur', function() {
            if ($(this).val() == '') {
                $(this).val('请输入图片标题');
                $(this).css('color', '#9a9a9a');
            }
        });

        // 提交上传
        $('#swf_submit').click(function() {
            if (!$('#thumbid').val()) {
                swf_message('swf_message02', '请先创建相册！');
            } else if (!$('#thumbnails').html()) {
                swf_message('swf_message02', '请先上传图片！');
            } else {
                $.ajax({
                    url:'__APP__/UploadPhoto/do_upload',
                    type:'POST',
                    data:$('#swf_form').serialize(),
                    success:function(data){
                        if (data == 'error') {
                            swf_message('swf_message02', '上传错误，请刷新重试！');
                        } else if (data == 'success') {
                            // 关闭浮层
                            swf_message('swf_message01', '上传成功！');
                            swf_close('#swf_upload', '#barrier');
                            window.location.href = window.location.href
                        }
                    }
                });
            }
        });

        // 重置设为封面
        function clearCover() {
            $(".swf_cover").removeClass('cover');
            $("#thumbnails").find("input[name='swf_cover[]']").val('0');
            $("#thumbnails").find('div').css('border', '2px solid #fff');
        }

        // 隐藏浮层
        function swf_close(obj, obj1, obj2) {
            $(obj).css('display', 'none');
            $(obj1).css('display', 'none');
            $(obj2).css('display', 'none');
        }

        // 显示浮层
        function swf_open(obj, obj1, obj2) {
            $(obj).css('display', 'block');
            $(obj1).css('display', 'block');
            $(obj2).css('display', 'block');
        }

        // 上传信息输出
        function swf_message(className, data) {
            getSize('.swf_message');
            $('.swf_message').find('div').attr('class', className);
            $('.swf_message').find('div').html('<span>'+data+'</span>');
            $('.swf_message').css({display:'block',zIndex:'10001'});
            setTimeout(function(){swf_close('.swf_message')},3000);
        }     
    });    
</script>
<script type="text/javascript" src="__ROOT__/<?php echo ($data["app_name"]); ?>/Lib/Widget/UploadPhoto/swfupload/js/swfupload.js"></script>
<script type="text/javascript" src="__ROOT__/<?php echo ($data["app_name"]); ?>/Lib/Widget/UploadPhoto/swfupload/js/handlers.js"></script>