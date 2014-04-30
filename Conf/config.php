<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,
    'URL_HTML_SUFFIX'=>'.html',

    // 域名
    'SITE_NAME'   => 'www.wcloud.com',
    // 修改定界符
    'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',
    // 使用DSN方式配置数据库信息
    'DB_TYPE'   => 'mysql',     // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'wcloud',    // 数据库名
    'DB_USER'   => 'root',      // 用户名
    'DB_PWD'    => 'dqp2012',   // 密码
    'DB_PORT'   => 3306,        // 端口
    'DB_PREFIX' => 'pre_',      // 数据库表前缀 

    // 邮件服务器设置
    'EMAIL_HOST'     => 'smtp.163.com',      // 您的企业邮局域名
    'EMAIL_SMTPAUTH' => true,            // 启用SMTP验证功能
    'EMAIL_ADS'      => 'dqping2008@163.com', // 邮局用户名(请填写完整的email地址)
    'EMAIL_PWD'      => 'dqp***1990310520',   // 邮局密码
    'EMAIL_PORT'     => '25',                // 端口号
    'EMAIL_NAME'     => '云淡风轻',       // 邮件发送者名称

    // cookie设置
    'COOKIE_PREFIX'=>'wcloud_', // cookie前缀
);
?>