<!DOCTYPE html>
<html>
<head>
    <title>后台登陆页面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/style/login.css">
</head>
<body>
<div id="login_main">
    <?php $form = $this->beginWidget('CActiveForm') ?>
    用户名:
    <?php echo $form->textField($loginForm, 'username', array('id' => 'username')); ?><br />
    密　码:
    <?php echo $form->passwordField($loginForm, 'password', array('id' => 'password')); ?><br />
    验证码:
    <?php echo $form->textField($loginForm, 'captcha', array('id' => 'verify')); ?>
    <?php
    $this->widget('CCaptcha', array(
        'showRefreshButton' => false,
        'clickableImage' => true,
        'imageOptions' => array('alt' => '点击换图', 'title' => '点击换图', 'align' => 'middle', 'style' => 'cursor:pointer')
    ));
    ?>
    <br />
    <input type="submit" name="btn" value="　登陆 " />
    <?php $this->endWidget() ?>
</div>
<div class="login_error">
    <ul>
        <li class="error"><?php echo $form->error($loginForm,'username');?></li>
        <li class="error"><?php echo $form->error($loginForm,'password');?></li>
        <li class="error"><?php echo $form->error($loginForm,'captcha');?></li>
    </ul>
</div>
</body>
</html>
