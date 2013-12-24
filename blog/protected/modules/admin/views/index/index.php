<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/index.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/public.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/index.css" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <base target="iframe"/>
</head>
<body>
    <div id="top">
        <div class="exit">
            <a href="<?php echo $this->createUrl('login/out'); ?>" target="_self">退出</a>
            <a href="javascript:;" target="_self"><?php echo Yii::app()->user->name; ?></a>
        </div>
    </div>
    <div id="left">
        <dl>
            <dt>后台管理</dt>
            <dd><a href="<?php echo $this->createUrl('/'); ?>" target="_blank">前台首页</a></dd>
            <dd><a href="<?php echo $this->createUrl('user/passwd'); ?>">修改密码</a></dd>
            

            <dd><a href="<?php echo $this->createUrl('cate/index'); ?>">查看栏目</a></dd>
            <dd><a href="<?php echo $this->createUrl('cate/add'); ?>">添加栏目</a></dd>

            <dd><a href="<?php echo $this->createUrl('article/index'); ?>">查看文章</a></dd>
            <dd><a href="<?php echo $this->createUrl('article/add'); ?>">添加文章</a></dd>
        </dl>
    </div>
    <div id="right">
        <iframe name="iframe" src="<?php echo $this->createUrl('index/copy') ?>"></iframe>
    </div>
</body>
</html>
