<?php

/**
 * 图像处理类
 */
class Image extends CApplicationComponent {
    //生成缩略图的方式
    public $thumbType;
    //缩略图的宽度
    public $thumbWidth;
    //缩略图的高度
    public $thumbHeight;
    //生成缩略图文件名后缀
    public $thumbEndFix;
    //缩略图文件前缀
    public $thumbPreFix;

    /**
     * 构造函数
     */
    public function __construct() {
        //缩略图参数
        $this->thumbType = 5;
        $this->thumbWidth = 100;
        $this->thumbHeight = 100;
        $this->thumbPreFix = 'thumb_';
        $this->thumbEndFix = '';
    }

    /**
     * 环境验证
     * @param $img 图像
     * @return bool
     */
    private function check($img) {
        $type = array(".jpg", ".jpeg", ".png", ".gif");
        $imgType = strtolower(strrchr($img, '.'));
        return extension_loaded('gd') && file_exists($img) && in_array($imgType, $type);
    }

    /**
     * 获得缩略图的尺寸信息
     * @param $imgWidth 原图宽度
     * @param $imgHeight 原图高度
     * @param $thumbWidth 缩略图宽度
     * @param $thumbHeight 缩略图的高度
     * @param $thumbType 处理方式
     * 1 固定宽度  高度自增 2固定高度  宽度自增 3固定宽度  高度裁切
     * 4 固定高度 宽度裁切 5缩放最大边 原图不裁切
     * @return mixed
     */
    private function thumbSize($imgWidth, $imgHeight, $thumbWidth, $thumbHeight, $thumbType) {
        //初始化缩略图尺寸
        $w = $thumbWidth;
        $h = $thumbHeight;
        //初始化原图尺寸
        $cuthumbWidth = $imgWidth;
        $cuthumbHeight = $imgHeight;

//        if ($imgWidth <= $thumbWidth && $imgHeight <= $thumbHeight) {
//            $w = $imgWidth;
//            $h = $imgHeight;
//        } else {
        switch ($thumbType) {
            case 1 :
                //固定宽度  高度自增
                $h = $thumbWidth / $imgWidth * $imgHeight;
                break;
            case 2 :
                //固定高度  宽度自增
                $w = $thumbHeight / $imgHeight * $imgWidth;
                break;
            case 3 :
                //固定宽度  高度裁切
                $cuthumbHeight = $imgWidth / $thumbWidth * $thumbHeight;
                break;
            case 4 :
                //固定高度  宽度裁切
                $cuthumbWidth = $imgHeight / $thumbHeight * $thumbWidth;
                break;
            case 5 :
                //缩放最大边 原图不裁切
                if (($imgWidth / $thumbWidth) > ($imgHeight / $thumbHeight)) {
                    $h = $thumbWidth / $imgWidth * $imgHeight;
                } elseif (($imgWidth / $thumbWidth) < ($imgHeight / $thumbHeight)) {
                    $w = $thumbHeight / $imgHeight * $imgWidth;
                } else {
                    $w = $thumbWidth;
                    $h = $thumbHeight;
                }
                break;
            default:
                //缩略图尺寸不变，自动裁切图片
                if (($imgHeight / $thumbHeight) < ($imgWidth / $thumbWidth)) {
                    $cuthumbWidth = $imgHeight / $thumbHeight * $thumbWidth;
                } elseif (($imgHeight / $thumbHeight) > ($imgWidth / $thumbWidth)) {
                    $cuthumbHeight = $imgWidth / $thumbWidth * $thumbHeight;
                }
//            }
        }
        $arr [0] = $w;
        $arr [1] = $h;
        $arr [2] = $cuthumbWidth;
        $arr [3] = $cuthumbHeight;
        return $arr;
    }

    /**
     * 图片裁切处理
     * @param $img 原图
     * @param string $outFile 另存文件名
     * @param string $path 文件存放路径
     * @param string $thumbWidth 缩略图宽度
     * @param string $thumbHeight 缩略图高度
     * @param string $thumbType 裁切图片的方式
     * 1 固定宽度  高度自增 2固定高度  宽度自增 3固定宽度  高度裁切
     * 4 固定高度 宽度裁切 5缩放最大边 原图不裁切 6缩略图尺寸不变，自动裁切最大边
     * @return bool|string
     */
    public function thumb($img, $outFile = '', $thumbWidth = '', $thumbHeight = '', $thumbType = '', $path = '') {
        if (!$this->check($img)) {
            return false;
        }
        //基础配置
        $thumbType = $thumbType ? $thumbType : $this->thumbType;
        $thumbWidth = $thumbWidth ? $thumbWidth : $this->thumbWidth;
        $thumbHeight = $thumbHeight ? $thumbHeight : $this->thumbHeight;
        $path = $path ? $path : './uploads/';
        //获得图像信息
        $imgInfo = getimagesize($img);
        $imgWidth = $imgInfo [0];
        $imgHeight = $imgInfo [1];
        $imgType = image_type_to_extension($imgInfo [2]);
        //获得相关尺寸
        $thumb_size = $this->thumbSize($imgWidth, $imgHeight, $thumbWidth, $thumbHeight, $thumbType);
        //原始图像资源
        $func = "imagecreatefrom" . substr($imgType, 1);
        $resImg = $func($img);
        //缩略图的资源
        if ($imgType == '.gif') {
            $res_thumb = imagecreate($thumb_size [0], $thumb_size [1]);
            $color = imagecolorallocate($res_thumb, 255, 0, 0);
        } else {
            $res_thumb = imagecreatetruecolor($thumb_size [0], $thumb_size [1]);
            imagealphablending($res_thumb, false); //关闭混色
            imagesavealpha($res_thumb, true); //储存透明通道
        }
        //绘制缩略图X
        if (function_exists("imagecopyresampled")) {
            imagecopyresampled($res_thumb, $resImg, 0, 0, 0, 0, $thumb_size [0], $thumb_size [1], $thumb_size [2], $thumb_size [3]);
        } else {
            imagecopyresized($res_thumb, $resImg, 0, 0, 0, 0, $thumb_size [0], $thumb_size [1], $thumb_size [2], $thumb_size [3]);
        }
        //处理透明色
        if ($imgType == '.gif') {
            imagecolortransparent($res_thumb, $color);
        }
        //配置输出文件名
        $imgInfo = pathinfo($img);
        $outFile = $outFile ? $outFile : $this->thumbPreFix . $imgInfo['filename'] . $this->thumbEndFix . "." . $imgInfo['extension'];
        $upload_dir = $path ? rtrim($path, '/') . '/' : (strstr($outFile, '/') ? dirname($outFile) : dirname($img) . '/');

        if (!strstr($outFile, '/')) {
            $outFile = $upload_dir . $outFile;
        }
        $func = "image" . substr($imgType, 1);
        $func($res_thumb, $outFile);
        if (isset($resImg))
            imagedestroy($resImg);
        if (isset($res_thumb))
            imagedestroy($res_thumb);
        return $outFile;
    }


}
