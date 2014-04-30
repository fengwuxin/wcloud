<?php
/**
 * 图集上传组件
 * @author DaiQingping <751583294@qq.com>
 * @example {:W('UploadPhoto',array('app_name'=>$app_name, 'upload_btn'=>$upload_btn, 'uid'=>$uid))}
 * @param app_name=>当前项目名称，upload_btn=>上传按钮类名
 * @date 2014.01.27
 */
class UploadPhotoWidget extends Action {
    /**
     * 模版渲染
     * @param $data array 上传图片属性信息
     * @param string callback 回调方法
     */    
    public function render($data) {
        $uid = $data['uid'];
        $thumbData = M('Thumb')->where('uid='.$uid)->order('id desc')->select();
        $this->assign('thumbData', $thumbData);
        $this->assign('data', $data);
        $this->display(dirname(__FILE__)."/UploadPhoto/default.html");
    }

}