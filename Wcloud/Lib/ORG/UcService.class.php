<?php
/**
 * 
 * @author Ariel
 * uc通信
 */
class UcService{
	// 构造方法
	public function __construct(){
		include_once(WCLOUD_ROOT_PATH.'/Conf/config_ucenter.php');
		include_once(WCLOUD_ROOT_PATH.'/Api/uc_client/client.php');
	}
	
    /**
    * 会员注册
    */
    public function uc_reg($username, $password, $email){
        
        //UCenter的注册验证函数
        $uid = uc_user_register($username, $password, $email);
        if($uid <= 0) {
            if($uid == -1) {
                return '用户名不合法';
            } elseif($uid == -2) {
                return '包含不允许注册的词语';
            } elseif($uid == -3) {
                return '用户名已经存在';
            } elseif($uid == -4) {
                return 'Email 格式有误';
            } elseif($uid == -5) {
                return 'Email 不允许注册';
            } elseif($uid == -6) {
                return '该 Email 已经被注册';
            } else {
                return '未定义';
            }
        } else {
            return intval($uid);//返回一个非负数用户id
        }
    }

    /**
    * uc 用户登录
    */
    public function uc_login($username, $password){
        list($uid, $username, $password, $email) = uc_user_login($username, $password);
        if($uid > 0) {
            return array(
            'uid' => $uid,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            );
        } elseif ($uid == -1) {
            return '用户不存在,或者被删除';
        } elseif($uid == -2) {
            return '密码错误';
        } else {
            return '未定义';
        }
    }

    /**
    * 修改用户信息
    */
    public function uc_edit($username, $oldpassword, $newpassword, $emailnew) {
        $ucresult = uc_user_edit($username, $oldpassword, $newpassword, $emailnew);
        if($ucresult == -1) {
            echo '旧密码不正确';
        } elseif($ucresult == -4) {
            echo 'Email 格式有误';
        } elseif($ucresult == -5) {
            echo 'Email 不允许注册';
        } elseif($ucresult == -6) {
            echo '该 Email 已经被注册';
        }
    }
}
