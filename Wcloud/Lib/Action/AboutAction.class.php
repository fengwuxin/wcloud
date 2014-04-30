<?php

/**
 * 轻博客控制器类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2013.9.7
 */
class AboutAction extends CommonAction {
    
    /**
     * [index 关于我们首页]
     * @return [type] [description]
     */
    public function index(){
        
        $this->assign('title', 'About Me');
        $this->display();
    }

}