<?php

/**
 * 轻博客控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class FeelingAction extends CommonAction {
    
    /**
     * [index 一句话首页]
     * @return [type] [description]
     */
    public function index(){
        $member = session('member');
        // $feeling_res = M('Feeling')->where('uid='.$member['id'])->limit('7')->select();
        // foreach ($feeling_res as $key => $value) {
        //     $feeling_res[$key]['message'] = htmlspecialchars_decode(unserialize($value['message']));
        // }

        // $feeling_reply_res = array();
        // foreach ($fids as $key => $value) {
        //     $feeling_reply_res[$value] = M('Feeling_reply')->where('fid='.$value)->select();
        // }
        // $feelings = array();
        // $reply_ids = array();
        // foreach ($feeling_reply_res as $key => $value) {
        //     foreach ($value as $k => $v) {
        //         $feelings[$key][$v['id']] = $v;
        //         $reply_ids[] = $v['id'];
        //     }
        // }

        // $reply_res = array();
        // foreach ($reply_ids as $key => $value) {
        //     $reply_res[$value] = M('Feeling_reply')->where('pid='.$value)->select();
        // }

        $model = new Model();
        $feelings = $model->table('pre_feeling f, pre_feeling_reply r')
              ->where('f.uid = '.$member['id'].' AND r.fid = f.id')
              ->select();

        // dump($feelings);
        // dump($reply_res);
        $this->assign('css', array('feeling_index'));
        $this->assign('feeling', $feeling_res);
        $this->assign('title', 'My Feeling');
        $this->display();
    }

    /**
     * [life 万千情首页]
     * @return [type] [description]
     */
    public function more(){
        $this->assign('title', 'My Feelings');
        $this->display();
    }


    /**
     * 添加心情
     * @return [type] [description]
     */
    public function do_add() {
        $member = session('member');
        $data['message'] = serialize($this->_post('message'));
        $data['time'] = time();
        $data['uid'] = $member['id'];
        $data['uip'] = $_SERVER['REMOTE_ADDR'];
        $res = M('Feeling')->add($data);

        if ($res) {
            $this->redirect('Feel/index/id/'.$res, '', 2, '发表成功！');
        } else {
            $this->error('发表失败，请稍后再试！');
        }
    }


    /**
     * 心情回复
     * @return [type] [description]
     */
    public function reply() {
        $member = session('member');
        if (!$member) {
            $this->redirect('User/login');
        } else {
            $data['uid'] = $member['id'];
            $data['fid'] = $this->_post('fid');
            $data['content'] = $this->_post('reply_content');
            $data['time'] = time();
            $data['pid'] = $this->_post('pid');

            $res = M('Feeling_reply')->add($data);
            if ($res) {
                $this->success('回复成功');
            } else {
                $this->error('回复失败');
            }
        }
    }

}