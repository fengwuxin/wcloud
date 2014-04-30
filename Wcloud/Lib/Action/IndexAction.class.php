<?php

/**
 * 轻博客首页控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class IndexAction extends Action {
    
    /**
     * [index 首页]
     * @return [type] [description]
     */
    public function index(){
        $m = M();
        // 博客
        $blog = $m->table('pre_blog b,pre_user u')
                  ->where('b.uid=u.id')
                  ->field('b.*,u.username')
                  ->order('b.id desc')
                  ->select();
        foreach ($blog as $key=>$value) {
            $blog[$key]['article'] = utf8_substr(htmlspecialchars_decode(unserialize($value['article'])), 0, 420);
        }

        // 相册
        $thumb = $m->table('pre_pic p,pre_thumb t')
         ->where('p.iscover=1 AND p.thumbid=t.id')
         ->field('p.*,t.thumb')
         ->order('p.id desc')
         ->limit('0, 3')
         ->select();
        $this->assign('blog', $blog);
        $this->assign('thumb', $thumb);
        $this->assign('title', '云淡风轻 畅想生活');
        $this->assign('css', array('index'));
        $this->display();
    }




}