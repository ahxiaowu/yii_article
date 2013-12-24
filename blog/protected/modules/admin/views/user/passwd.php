<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>修改密码</title>
        <style>
            body{
                font-size: 14px;
            }
            .errorMessage{
                display: inline;
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        //这样写法,就是前台也来验证
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true
            )
        ));
        //设置成功提示信息
        if (Yii::app()->user->hasFlash('success')) {
            echo Yii::app()->user->getFlash('success');
        }
        ?>
        <table width="800" border="1">
            <tr>
                <th colspan="2">修改密码</th>
            </tr>
            <tr>
                <td>用户</td>
                <td>
                    <?php echo Yii::app()->user->name; ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($userModel, 'password'); ?></td>
                <td>
                    <?php echo $form->passwordField($userModel, 'password'); ?>
                    <?php echo $form->error($userModel, 'password'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($userModel, 'newpassword'); ?></td>
                <td>
                    <?php echo $form->passwordField($userModel, 'newpassword'); ?>
                    <?php echo $form->error($userModel, 'newpassword'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($userModel, 'renewpassword'); ?></td>
                <td>
                    <?php echo $form->passwordField($userModel, 'renewpassword'); ?>
                    <?php echo $form->error($userModel, 'renewpassword'); ?>
                </td>                
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="提交修改">
                </td>
            </tr>
        </table>
        <?php $this->endWidget(); ?>
    </body>
</html>