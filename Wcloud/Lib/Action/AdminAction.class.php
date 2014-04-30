<?php

/**
 * 轻博客控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class AdminAction extends CommonAction {
    
    /**
     * [index 关于我们首页]
     * @return [type] [description]
     */
    public function index(){
        
        $this->assign('title', 'Start A Blog');
        $this->display();
    }

    /**
     * [do_add 发表博客]
     * @return [type] [description]
     */
    public function do_add() {
        $data['type'] = $this->_post('type');
        $data['title'] = $this->_post('title');
        $data['article'] = serialize($this->_post('article'));
        $data['time'] = time();
        // $data['uid'] = $session('id');
        $data['uid'] = '1';
        $res = M('Blog')->add($data);

        if ($res) {
            $this->redirect('/Blog/show/id/'.$res, '', 2, '恭喜，(*^__^*) 嘻嘻……，发表成功！');
        } else {
            $this->error('失败了，~~~~(>_<)~~~~ ，稍后再试吧！');
        }
    }

}