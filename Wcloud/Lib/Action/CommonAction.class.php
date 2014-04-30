<?php

/**
 *    公共应用功能类
 *    @date 2013.10.29
 *    @author 代青平 751583294@qq.com
 */
class CommonAction extends Action {
        
    /**
     * 普通图片上传方法 upload
     * @$dir string 图片上传目录
     * @$maxWidth int 图片最大宽度
     * @$maxHeight int 图片最大高度
     * @$prefix string 图片名前缀
     * @$bool bool 是否删除原图
     * @return array 文件名
     */
    public function upload($dir,$maxWidth, $maxHeight, $prefix, $bool=true) {

        // 导入文件上传扩展类
        import('@.ORG.UploadFile');

        $upload = new UploadFile();

        // 上传文件最大字节限制
        $upload->maxSize  = 3145728 ;
        
        // 设置附件上传类型
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
        
        // 自定义上传文件路径，路径后面的'/'不能省略
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $upload->savePath = rtrim($dir, '/').'/';
        
        // 自定义命名规则
        $upload->saveRule = time().mt_rand(10000,99999);
        
        // 执行图片缩放
        $upload->thumb = true;
        $upload->thumbMaxWidth     = $maxWidth;
        $upload->thumbMaxHeight    = $maxHeight;
        $upload->thumbPrefix       = $prefix;
        $upload->thumbRemoveOrigin = $bool;
        
        // 执行文件上传
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        } else {
            $info =  $upload->getUploadFileInfo();
        }
        // 返回文件名数组
        $filenames = array();
        foreach ($info as $value) {
            $filenames[] = $value['savename'];
        }
        return $filenames;
    }

    /*************************************************

    附件：
    phpmailer 中文使用说明（简易版）
    A开头：
    $AltBody--属性
    出自：PHPMailer::$AltBody
    文件：class.phpmailer.php
    说明：该属性的设置是在邮件正文不支持HTML的备用显示
    AddAddress--方法
    出自：PHPMailer::AddAddress()，文件：class.phpmailer.php
    说明：增加收件人。参数1为收件人邮箱，参数2为收件人称呼。例 AddAddress("eb163@eb163.com","eb163")，但参数2可选，AddAddress(eb163@eb163.com)也是可以的。
    函数原型：public function AddAddress($address, $name = '') {}
    AddAttachment--方法
    出自：PHPMailer::AddAttachment()
    文件：class.phpmailer.php。
    说明：增加附件。
    参数：路径，名称，编码，类型。其中，路径为必选，其他为可选
    函数原型：
    AddAttachment($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream'){}
    AddBCC--方法
    出自：PHPMailer::AddBCC()
    文件：class.phpmailer.php
    说明：增加一个密送。抄送和密送的区别请看[SMTP发件中的密送和抄送的区别] 。
    参数1为地址，参数2为名称。注意此方法只支持在win32下使用SMTP，不支持mail函数
    函数原型：public function AddBCC($address, $name = ''){}
    AddCC --方法
    出自：PHPMailer::AddCC()
    文件：class.phpmailer.php
    说明：增加一个抄送。抄送和密送的区别请看[SMTP发件中的密送和抄送的区别] 。
    参数1为地址，参数2为名称注意此方法只支持在win32下使用SMTP，不支持mail函数
    函数原型：public function AddCC($address, $name = '') {}
    AddCustomHeader--方法
    出自：PHPMailer::AddCustomHeader()
    文件：class.phpmailer.php
    说明：增加一个自定义的E-mail头部。
    参数为头部信息
    函数原型：public function AddCustomHeader($custom_header){}
    AddEmbeddedImage --方法
    出自：PHPMailer::AddEmbeddedImage()
    文件：class.phpmailer.php
    说明：增加一个嵌入式图片
    参数：路径,返回句柄[,名称,编码,类型]
    函数原型：public function AddEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {}
    提示：AddEmbeddedImage(PICTURE_PATH. "index_01.jpg ", "img_01 ", "index_01.jpg ");
    在html中引用
    AddReplyTo--方法
    出自：PHPMailer:: AddRepl
    *************************************************/
    /**
     * 邮件发送
     * @param  [type] $email_ads     收件人邮箱地址
     * @param  [type] $email_subject 邮件主题
     * @param  [type] $email_body    邮件内容
     * @return [type]                [description]
     */
    public function send_email($email_ads, $email_subject, $email_body) {

        import('@.ORG.Phpmailer');
        $mail = new PHPMailer(); //建立邮件发送类
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = C('email_host'); // 您的企业邮局域名
        $mail->SMTPAuth = C('email_smtpauth'); 
        $mail->Username = C('email_ads'); // 邮局用户名(请填写完整的email地址)
        $mail->Password = C('email_pwd');  // 邮局密码
        $mail->Port = C('email_port');
        $mail->From = C('email_ads'); //邮件发送者email地址
        $mail->FromName = C('email_name');
        $mail->AddAddress($email_ads);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        
        //$mail->AddReplyTo("", "");
        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
        //$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式

        $mail->Subject = $email_subject; //邮件标题
        $mail->Body = $email_body; //邮件内容
        // $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

        if(!$mail->Send()) {
            return '';
            exit;
        }

        return '1';
    }

}