<?php

/**
 * 图集上传控制类
 * @author DaiQingping 【751583294@qq.com】
 * @date 2014.01.28
 */
class UploadPhotoAction extends Action {

    /**
     * 创建相册
     * @return [type] [description]
     */
    public function createThumb() {
        $where['thumb'] = $_POST['thumb'];
        $where['uid']   = $_POST['uid'];
        $m = M('Thumb');
        $res = $m->where($where)->select();
        if ($res) {
            $info['message'] = '该相册已存在！';
        } else {
            $data = $where;
            $data['ctime'] = time();
            $id = $m->add($data);
            if ($id) {
                $info['id'] = $id;
            } else {
                $info['message'] = '创建失败！';
            }
        }

        echo json_encode($info);
    }


    /**
     * 执行用户参加活动方法
     * @return [type] [description]
     */
    public function do_upload() {
        $filenames  = $_POST['swf_file'];
        $filepaths  = $_POST['swf_path'];
        $filetitles = $_POST['swf_title'];
        $filecovers = $_POST['swf_cover'];
        if (!$filenames[0]) {
            echo 'error';
        } else {
            $num = count($filenames);
            $fileData = array();
            for ($i=0;$i<$num;$i++) {
                $fileData[$i]['filename']  = $filenames[$i];
                $fileData[$i]['filepath']  = $filepaths[$i];
                $fileData[$i]['filetitle'] = trim($filetitles[$i]) == '请输入图片标题' ? '' : $filetitles[$i];
                $fileData[$i]['iscover']   = $filecovers[$i];
            }
            $m = M('Pic');
            $r = $m->where('thumbid='.$_POST['thumbid'])->select();
            // 第一次往此相册传图
            if (!$r) {
                // 判断相册是否设置封面
                if (!in_array('1', $filecovers)) {
                    // 默认第一张为相册封面
                    $fileData[0]['iscover'] = 1;
                }
            } else {
                // 如果设置了封面
                if (in_array('1', $filecovers)) {
                    // 把原来的封面取消
                    $aa = $m->where('iscover=1 AND thumbid='.$_POST['thumbid'])->select();
                    $info['iscover'] = 0;
                    $m->where('id='.$aa[0]['id'])->save($info);
                }
            }
            $res = array();
            foreach ($fileData as $data) {
                $data['thumbid'] = $_POST['thumbid'];
                $data['ctime']   = time();
                if ($m->add($data)) {
                    $res[] = 'true';
                }
            }

            if (count($res) == $num) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }


    /**
     * 图片上传方法
     */
    public function swf_upload() {
        $basedir= __ROOT__.'Public/upload/';
        $uuid   = $this->uuid();
        $filedir= 'thumb/'.substr($uuid, 0, 2).'/'.substr($uuid, 2, 2).'/';
        $dir    = $basedir.$filedir;
        $width  = '50, 200, 500';
        $height = '10000, 10000, 10000';
        $prefix = 's_,m_,b_';
        $filenames = $this->fileUpload($dir, false, $width, $height, $prefix, false);
        $data = array();
        $data['filename'] = $filenames[0];
        $data['filepath'] = $filedir;
        echo json_encode($data);
    }

    
    /**
     * 图片删除
     * @return [type] [description]
     */
    public function swf_del() {
        $path = $_POST['path'];
        $file = $_POST['file'];
        sae_unlink(__ROOT__.'Public/upload/'.$path.$file);
        sae_unlink(__ROOT__.'Public/upload/'.$path.'s_'.$file);
        sae_unlink(__ROOT__.'Public/upload/'.$path.'m_'.$file);
        sae_unlink(__ROOT__.'Public/upload/'.$path.'b_'.$file);
    }


    /**
     * 设置为封面
     * @return [type] [description]
     */
    public function swf_cover() {
        $data['path'] = $_POST['path'];
        $data['file'] = $_POST['file'];
        echo json_encode($data);
    }


    /**
     * 普通图片上传方法 fileUpload
     * @$dir string 图片上传目录
     * @$zip bool 是否执行图片压缩
     * @$maxWidth int 图片最大宽度
     * @$maxHeight int 图片最大高度
     * @$prefix string 图片名前缀
     * @$bool bool 是否删除原图
     * @return array 文件名
     */
    public function fileUpload($dir, $zip=false, $maxWidth, $maxHeight, $prefix, $bool=true) {
        // 导入文件上传扩展类
        import('@.ORG.UploadFile');

        $upload = new UploadFile();

        // 上传文件最大字节限制
        $upload->maxSize  = 5120000;
        // 设置附件上传类型
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
        
        // 自定义上传文件路径，路径后面的'/'不能省略
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $upload->savePath = rtrim($dir, '/').'/';
        
        // 自定义命名规则
        $upload->saveRule = time().mt_rand(10000,99999);
        
        // 执行图片缩放
        $upload->thumb = $zip;
        $upload->thumbMaxWidth     = $maxWidth;
        $upload->thumbMaxHeight    = $maxHeight;
        $upload->thumbPrefix       = $prefix;
        $upload->thumbRemoveOrigin = $bool;
        
        // 执行文件上传
        if (!$upload->upload()) {
            echo "<script>alert('".$upload->getErrorMsg()."');history.back(-1);</script>";
        } else {
            $info =  $upload->getUploadFileInfo();
        }
        // 返回文件名数组
        $filenames = array();
        foreach ($info as $value) {
            $filenames[] = $value['savename'];
        }
        return $filenames;
    }


    /**
     * Create a new uuid
     *
     * @param string $prefix
     * @return string
     */
    public static function uuid($prefix = '') {
        $chars = md5($prefix.uniqid(mt_rand(), true));
        
        $uuid  = substr($chars,0,8).'-'
                . substr($chars,8,4).'-'
                . substr($chars,12,4).'-'
                . substr($chars,16,4).'-'
                . substr($chars,20,12);
        return $uuid;
    }

}