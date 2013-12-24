<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看栏目</title>
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
	</style>
</head>
<body>
<?php 
if(Yii::app()->user->hasFlash('hasArt')){
	echo Yii::app()->user->getFlash('hasArt');
}
?>
<table class="table">
	<tr>
		<th>CID</th>
		<th>栏目名称</th>
		<th>操作</th>
	</tr>
	<?php foreach($cateInfo as $obj): ?>
	<tr>
		<td><?php echo $obj->cid; ?></td>
		<td><?php echo $obj->cname; ?></td>
		<td>
			<a href="<?php echo $this->createUrl('edit',array('cid'=>$obj->cid)); ?>">[编辑]</a> 
			<a href="<?php echo $this->createUrl('del',array('cid'=>$obj->cid)); ?>">[删除]</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>	
</body>
</html>