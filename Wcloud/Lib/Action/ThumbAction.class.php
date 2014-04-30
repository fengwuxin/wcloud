<?php

/**
 * 轻博客首页控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class ThumbAction extends Action {
    
    /**
     * [index 首页]
     * @return [type] [description]
     */
    public function index(){
        $m = M();
        $res = $m->table('pre_pic p,pre_thumb t')
                 ->where('p.iscover=1 AND p.thumbid=t.id')
                 ->field('p.*,t.thumb')
                 ->order('p.id desc')
                 ->select();
        $this->assign('data', $res);
        $this->assign('title', 'My Thumb');
        $this->display();
    }


    /**
     * 相册详情页面
     * @return [type] [description]
     */
    public function thumbInfo() {
        $id = $_GET['id'];
        $m = M();
        $res = $m->table('pre_pic p,pre_thumb t')
                 ->where('p.thumbid='.$id)
                 ->field('p.*,t.thumb')
                 ->order('p.id desc')
                 ->select();
        $this->assign('data', $res);
        $this->assign('title', $res[0]['thumb']);
        $this->display(); 
    }

}