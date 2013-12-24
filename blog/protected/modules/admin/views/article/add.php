<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加栏目</title>
	<style>
	body{
		font-size: 14px;margin: 0px;padding: 0px;
	}
	.table{
		width: 800px;
		border-collapse: collapse;
		margin: 3px auto;
	}
	.table th,.table td{
		border: 1px solid #ABCDEF;
		padding: 5px;
	}
	.errorMessage{
		display: inline;
		color: red;
	}
	.right{text-align: right;}
	</style>	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/org/ueditor/ueditor.config.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/org/ueditor/ueditor.all.min.js"></script>
	<script>
		window.UEDITOR_HOME_URL = "<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/org/ueditor/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 800;
			window.UEDITOR_CONFIG.initialFrameHeight = 300;
			UE.getEditor('content');
		}
	</script>
</head>
<body>
<?php 
$form  = $this->beginWidget('CActiveForm',array(
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true
	)
));
?>
<table class="table">
	<caption>发表文章</caption>
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'title'); ?>:</td>
		<td>
			<?php echo $form->textField($articleModel,'title',array('maxlength'=>20)); ?>
			<?php echo $form->error($articleModel,'title') ?>
		</td>
	</tr>
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'type'); ?>:</td>
		<td>
			<?php 
			echo $form->radioButtonList(
				$articleModel,
				'type',
				array(0=>'普通',1=>'热门'),
				array('separator'=>'&nbsp;')
			);
			echo $form->error($articleModel,'type');
			?>
		</td>
	</tr>
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'cid'); ?>:</td>
		<td>
			<?php 
			echo $form->dropDownList(
				$articleModel,
				'cid',
				$cateInfoArr
			);
			echo $form->error($articleModel,'cid');
			?>
		</td>
	</tr>
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'pic'); ?>:</td>
		<td>
			<?php 
			echo $form->fileField($articleModel,'pic');
			echo $form->error($articleModel,'pic');
			?>
		</td>
	</tr>	
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'info'); ?>:</td>
		<td>
			<?php 
			echo $form->textArea($articleModel,'info',array('cols'=>50,'rows'=>10,'maxlength'=>100));
			echo $form->error($articleModel,'info');
			?>
		</td>
	</tr>		
	<tr>
		<td class="right"><?php echo $form->labelEx($articleModel,'content'); ?>:</td>
		<td>
			<?php 
			echo $form->textArea($articleModel,'content',array('id'=>'content'));
			echo $form->error($articleModel,'content');
			?>
		</td>
	</tr>	
	<tr>
		<th colspan="2">
		<input type="submit" value="发表文章">
		</th>
	</tr>	
</table>
<?php 
$this->endWidget();
?>
</body>
</html>