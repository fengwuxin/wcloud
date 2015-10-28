<?php

echo phpinfo();exit;

define('WCLOUD_ROOT_PATH', rtrim(dirname(__FILE__), '/\\'));
define('THINK_PATH','./ThinkPHP/');
define('APP_NAME','Wcloud');
define('APP_PATH','./Wcloud/');
define('APP_DEBUG',true);
define('ENGINE_NAME','sae');
require THINK_PATH.'ThinkPHP.php';
