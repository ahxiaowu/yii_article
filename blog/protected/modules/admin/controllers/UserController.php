<?php

/**
 * 后台用户管理控制器
 */
class UserController extends Controller {

    /**
     * 修改密码
     */
    function actionPasswd() {
        $userModel = User::model();

        if (isset($_POST['User'])) {
            $userInfo = $userModel->find('username=:name', array(':name' => Yii::app()->user->name));
            $userModel->attributes = $_POST['User'];
            if ($userModel->validate()) {
                $password = md5($_POST['User']['newpassword']);
                if ($userModel->updateByPk($userInfo->uid, array('password' => $password))) {
                    //设置成功提示信息
                    Yii::app()->user->setFlash('success', '修改密码成功');
                }
            }
        }

        $this->render('passwd', array('userModel' => $userModel));
    }

}
