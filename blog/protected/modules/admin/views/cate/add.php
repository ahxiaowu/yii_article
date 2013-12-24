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
	</style>	
</head>
<body>
<?php 
$form  = $this->beginWidget('CActiveForm',array(
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true
	)
));
?>
<table class="table">
	<tr>
		<td>添加栏目</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->labelEx($cateModel,'cname') ?>:
			<?php echo $form->textField($cateModel,'cname'); ?>
			<?php echo $form->error($cateModel,'cname'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="添加栏目">
		</td>
	</tr>
</table>
<?php 
$this->endWidget();
?>
</body>
</html>