<?php

/**
 * 轻博客首页控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class UserAction extends CommonAction {
    
    /**
     * [index 首页]
     * @return [type] [description]
     */
    public function index(){
        
        $this->assign('title', '云淡风轻 畅想生活');
        $this->assign('css', array('user'));
        $this->display();
    }

    /**
     * 调取用户注册模版
     * @return [type] [description]
     */
    public function register() {
        if (session('member')) {
            header("Location:".__APP__);
        }
        $this->assign('title', '新用户注册 | 云淡风轻');
        $this->assign('css', array('user'));
        $this->assign('js',array('login-script', 'modernizr-1.7.min'));
        $this->display();
    }

    /**
     * 执行注册
     * @return [type] [description]
     */
    public function do_register() {
        if ($this->_post('agree') == 'checked') {
            $to       = $this->_post('email');
            $username = $this->_post('username');
            $verify   = md5($this->_post('verification'));
            $salt     = mt_rand(1000, 9999);
            $data['email']    = $to;
            $data['username'] = $username;
            $data['password'] = md5($this->_post('password'));
            $data['regip']    = $_SERVER['REMOTE_ADDR'];
            $data['regtime']  = time();
            $data['verify']   = $verify;
            $data['hack']     = $this->_post('password'); // 明文密码
            // 发送邮件
            $subject = '云淡风轻博客激活';
            $body = '亲爱的'.$username.'：
            感谢您注册风轻云淡博客，请点击下面的链接激活您的账户
            '.C('site_name').__APP__.'/User/activate/email/'.$to.'/verify/'.$verify;
            $info = $this->send_email($to, $subject, $body);
            if ($info) {
                $res = M('User')->add($data);
                $data = array();
                if ($res) {
                    $data['sent'] = 1;
                    $data['url'] = '#';
                } else {
                    $data['sent'] = '';
                    $data['message'] = '注册失败，请稍后重试！';
                }
            } else {
                $data = array();
                $data['sent'] = '';
                $data['message'] = '给'.$to.'发送邮件失败，请检查邮箱是否填写正确！';
            }
            echo json_encode($data);
        }
    }


    /**
     * 调用用户登录模版方法
     * @return [type] [description]
     */
    public function login() {

        if (session('member')) {
            header('Location:'.__APP__);
        }
        include_once( __ROOT__.'api/sina/config.php' );
        include_once( __ROOT__.'api/sina/saetv2.ex.class.php' );
        $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        $this->assign('code_url', $code_url);
        if ($loginname = $this->_get('loginname')) {
            $this->assign('loginname', $loginname);
        }
        $this->assign('title', '用户登录 | 云淡风轻');
        $this->assign('css', array('user'));
        $this->assign('js',array('login-script', 'modernizr-1.7.min'));
        $this->assign('url', $_SERVER['HTTP_REFERER']);
        $this->display();
    }

    /**
     * 执行登录操作
     * @return [type] [description]
     */
    public function do_login() {
        $where['loginname'] = $this->_post('loginname');
        $where['password'] = md5($this->_post('password'));
        $res = M('User')->field('id, username, email, regip, regtime')->where($where)->select();
        if ($res[0]['id']) {
            session('member', $res[0]);
            if ('true' == $this->_post('remember')) {
                cookie("id", $res[0]['id'], 1209600);
                cookie("username", $res[0]['username'], 1209600);
            }
            $data['is_login'] = 1;
        } else {
            $data['is_login'] = '';
        }

        echo json_encode($data);
    }


    /**
     * 找回密码方法
     * @return [type] [description]
     */
    public function getpwd() {

        $this->assign('title', '找回密码 | 云淡风轻');
        $this->assign('css', array('user'));
        $this->assign('js',array('login-script', 'modernizr-1.7.min'));
        $this->display();
    }


    /**
     * 执行密码找回方法
     * @return [type] [description]
     */
    public function do_getpwd() {
        
    }
    

    /**
     * 账户激活
     * @return  
     */
    public function activate() {
        $where['email'] = $this->_get('email');
        $where['verify'] = $this->_get('verify');
        $res = M('User')->field('id')->where($where)->select();
        if ($res[0]['id']) {
            $data['id'] = $res[0]['id'];
            $data['status'] = 2;
            $res = M('User')->save($data);
            if ($res) {
                $this->assign('status', 'actived');
                $this->assign('display', 'none');
                $this->assign('message', '您的账号已激活成功，现在可以去 <a href="'.__APP__.'/User/login">登录</a> 了！');
            } else {
                $this->assign('status', 'error');
                $this->assign('display', 'block');
                $this->assign('message', '此激活链接已失效，请尝试 <a href="'.__APP__.'/User/login">登录</a> 或 <a href="#">重新激活</a>');
            }
        }
        $this->assign('css', array('user'));
        $this->assign('js',array('login-script', 'modernizr-1.7.min'));
        $this->display();
    }

    /**
     * 退出登录
     * @return [type] [description]
     */
    public function logout() {
        session('member', null);
        session('token', null);
        cookie('id', null);
        cookie('username', null);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    /**
     * 邮箱验证
     * @return [type] [description]
     */
    public function check_email() {
        $where['email'] = $this->_post('email');
        $res = M('User')->field('status')->where($where)->select();
        $data['state'] = $res[0]['status'] ? $res[0]['status'] : 4;
        echo json_encode($data);
    }


    /**
     * 注册验证
     * @return [type] [description]
     */
    public function check_register() {
        // 验证用户名
        if ($username = $this->_post('username')) {
            $where['username'] = $username;
            $res = M('User')->field('id')->where($where)->select();
            if ($res[0]['id']) {
                $data['error'] = 1;
                $data['message'] = '用户名已被占用';
            } else {
                $data['error'] = '';
            }
        }
        // 验证验证码
        if ($verify = $this->_post('verification')) {
            if (md5(strtoupper($verify)) != session('verify')) {
                $data['error'] = 1;
                $data['message'] = '验证码错误';
            } else {
                $data['error'] = '';
            }
            
        }
        echo json_encode($data);
    }



    /**
     * 发送邮件方法
     * @return [type] [description]
     */
    public function sending_email() {
        $to = $this_post('email');
        $info = $this->send_email($to);
        if ($info) {
            $data['send'] = '1';
        } else {
            $data['send'] = '';
            $data['message'] = '邮箱填写错误，请重新填写';
        }

        echo json_encode($data);
    }




}