<?php

/**
 * 后台用户模型
 */
class User extends CActiveRecord {

    public $newpassword;
    public $renewpassword;

    /**
     * 必不可缺方法1,返回模型
     * @param type $className
     * @return type
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 必不可缺方法2,返回表名 不用写前缀,用两个花括号括起来
     * @return type
     */
    public function tableName() {
        return "{{admin}}";
    }

    /**
     * 标签的写法
     */
    function attributeLabels() {
        return array(
            'password' => '原始密码',
            'newpassword' => '新密码',
            'renewpassword' => '确认密码'
        );
    }

    /**
     * 规则
     */
    function rules() {
        return array(
            array('password', 'required', 'message' => '原始密码必填'),
            array('password', 'check_passwd'),
            array('newpassword', 'required', 'message' => '新密码必填'),
            array('renewpassword', 'required', 'message' => '确认始密码必填'),
            array('renewpassword', 'compare', 'compareAttribute' => 'newpassword', 'message' => '两次密码不相同'),
        );
    }

    function check_passwd() {
        $userInfo = $this->find('username=:name', array(':name' => Yii::app()->user->name));
        if (md5($this->password) != $userInfo->password) {
            $this->addError('password', '原始密码不正确');
        }
    }

}