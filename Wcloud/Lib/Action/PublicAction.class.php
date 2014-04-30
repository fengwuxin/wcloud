<?php

/**
 *  公共应用类
 *  @date 2013.11.15
 *  @author 代青平 751583294@qq.com
 */
class PublicAction extends Action {

    /**
     * 生成验证码
     * @return [type] [description]
     */
    public function verify() {

        // 导入验证码类
        import('@.ORG.Image');
        $str_type = mt_rand(0, 5);
        if ($str_type == 4) {
           /**
             * 生成中文图像验证码
             * @param string $length  位数
             * @param string $type 图像格式
             * @param string $width  宽度
             * @param string $height  高度
             * @param string $fontface  字体
             * @param string $verifyName session存储名称
             */
            Image::GBVerify(4, 'png', 180, 50, 'simhei.ttf', 'verify');
        } else {
            /**
             * 生成图像验证码
             * @param string $length  位数
             * @param string $mode  类型
             * @param string $type 图像格式
             * @param string $width  宽度
             * @param string $height  高度
             * @param string $fontface  字体
             * @param string $verifyName session存储名称
             */
            Image::buildImageVerify(4, $str_type, 'png', 106, 40, 'elephant.ttf', 'verify');
        }
    }

    /**
     * 微博回调处理方法
     * @return [type] [description]
     */
    public function sina_callback() {
        include_once( __ROOT__.'api/sina/config.php' );
        include_once( __ROOT__.'api/sina/saetv2.ex.class.php' );

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

        $data = array();
        if ($token) {
            $_SESSION['token'] = $token;
            setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
            $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
            $ms  = $c->home_timeline(); // done
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
            $link = M('User_link');
            $where['ouid'] = $uid;
            $res = $link->where($where)->select();
            if ($uid && !$res) {
                // 创建一个用户
                $data['username'] = $user_message['screen_name'];
                $data['regip']    = $_SERVER['REMOTE_ADDR'];
                $data['regtime']  = time();
                $data['status']   = 2;
                $id = M('User')->add($data);

                $info['uid']    = $id;
                $info['ouid']   = $uid;
                $info['ouname'] = $user_message['screen_name'];
                $info['otype']  = 1;
                $info['ctime']  = time();
                $res = $link->add($info);
                if ($id && $res) {
                    $_SESSION['member']['username'] = $user_message['screen_name'];
                }
            } else {
                $_SESSION['member']['username'] = $user_message['screen_name'];
            }
            echo "<script>window.location.href='http://wcloud.sinaapp.com'</script>";
        }
    }

    /**
     *  不用密码登陆
     */
    private function loginWithoutPassword($uname) {

    }

    /**
     * 打开QQ登录窗口
     * @return [type] [description]
     */
    public function openQQ() {
        require_once(__ROOT__."api/QQ/API/qqConnectAPI.php");
        $qc = new QC();
        $qc->qq_login();
    }

    /**
     * QQ登录回调
     * @return [type] [description]
     */
    public function qq_callback() {
        echo "<meta charset='utf-8' />";
        require_once(__ROOT__."api/QQ/API/qqConnectAPI.php");
        $qc = new QC();
        $acs = $qc->qq_callback();
        $oid = $qc->get_openid();
        $qc = new QC($acs,$oid);
        $uinfo = $qc->get_user_info();
        $str = substr($uinfo['figureurl'], 38, 32); // 用户唯一识别码
        $link = M('User_link');
        $where['ouid'] = $str;
        $res = $link->where($where)->select();
        if ($str && !$res) {
            $data['username'] = $uinfo['nickname'];
            $data['regip']    = $_SERVER['REMOTE_ADDR'];
            $data['regtime']  = time();
            $data['status']   = 2;
            $id = M('User')->add($data);

            $info['uid']    = $id;
            $info['ouid']   = $str;
            $info['ouname'] = $uinfo['nickname'];
            $info['otype']  = 2;
            $info['ctime']  = time();
            $res1 = $link->add($info);
            if ($id && $res) {
                $_SESSION['member']['username'] = $uinfo['nickname'];
            }
        } else {
            $_SESSION['member']['username'] = $uinfo['nickname'];
        }

        echo "<script>window.location.href='http://wcloud.sinaapp.com'</script>";
    }
}
