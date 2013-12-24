<?php

/**
 * 后台登陆控制器
 */
class LoginController extends Controller {

function actionIndex() {
   
    $loginForm = new LoginForm();

    if (isset($_POST['LoginForm'])) {
        $loginForm->attributes = $_POST['LoginForm'];
        if ($loginForm->validate() && $loginForm->login()) {
            Yii::app()->session['loginTime'] = time();
            $this->redirect(array('index/index'));
        }
    }



    $this->render('index', array('loginForm' => $loginForm));
}

/**
 * 验证码显示
 */
function actions() {
    return array(
        'captcha' => array(
            'class' => 'system.web.widgets.captcha.CCaptchaAction',
            'height' => 25,
            'width' => 80,
            'minLength' => 4,
            'maxLength' => 4
        )
    );
}

function actionOut(){
    Yii::app()->user->logout();
    $this->redirect(array('index'));
}

}

?>