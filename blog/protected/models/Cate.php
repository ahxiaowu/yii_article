<?php
class Cate extends CActiveRecord{
    
    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    function tableName() {
        return "{{cate}}";
    }
    
    function attributeLabels() {
        return array(
            'cname'=>'栏目名称'
        );
    }
    
    function rules() {
        return array(
          array('cname','required','message'=>'栏目必填!')
        );
    }
    
}