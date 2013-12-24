<?php

/**
 * 文章管理模型
 */
class Article extends CActiveRecord {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function tableName() {
        return '{{article}}';
    }

    function attributeLabels() {
        return array(
            'title' => '标题',
            'type' => '类型',
            'cid' => '栏目',
            'pic' => '缩略图',
            'info' => '摘要',
            'content' => '内容'
        );
    }

    function rules() {
        return array(
            array('title', 'required', 'message' => '标题必填!'),
            array('type','in',  'range'=>array(0,1),'message'=>'请选择类型!'),
            array('cid','check_cate'),
            array('info','required','message'=>'摘要必填!'),
            array('pic','file','types'=>'jpg,jpeg,gif,png','message'=>'没有上传或类型不正确!'),
            array('content','required','message'=>'内容必填!'),
            //array('mobile','match','pattern'=>'/^13\d{9}/','message'=>'号码不正确')
        );
    }
    
    function check_cate(){
        $cid = $this->cid;
        if($cid<=0){
            $this->addError('cid', '请选择栏目名称!');
            return false;
        }
    }
    
    function relations() {
        return array(
            'cate'=>array(self::BELONGS_TO,'Cate','cid')
        );
    }
    
    
}
