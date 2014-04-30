<?php

/**
 * 轻博客控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class BlogAction extends CommonAction {
    
    /**
     * [index 技术类博客首页]
     * @return [type] [description]
     */
    public function index(){
        
        $this->assign('title', 'My Technology Blog');
        $this->display();
    }

    /**
     * [life 生活类博客首页]
     * @return [type] [description]
     */
    public function life(){
        $this->assign('title', 'My Life Blog');
        $this->display();
    }

    /**
     * [travel 旅行类博客首页]
     * @return [type] [description]
     */
    public function travel(){

        $this->assign('title', 'My Travel Blog');
        $this->display();
    }


    /**
     * [show 博客详情展示]
     * @return [type] [description]
     */
    public function show() {
        $id = $_GET['id'];
        $blog_res = M('Blog')->field('title, article, uid, type ,time')->find($id);
        $article = htmlspecialchars_decode(unserialize($blog_res['article']));

        $this->assign('title', $blog_res['title']);
        $this->assign('article', $article);
        $this->assign('blog_res', $blog_res);
        $this->display();
    }
}