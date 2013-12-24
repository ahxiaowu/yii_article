<!doctype html>
<html lang="en">
  <head>
	<meta charset="UTF-8">
	<title>查看文章列表</title>
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

	<table class="table">
	  <tr>
		<th>AID</th>
		<th>标题</th>
		<th>栏目</th>
		<th>发表时间</th>
		<th>操作</th>
	  </tr>
	  <?php foreach ($artInfo as $obj): ?>
  	  <tr>
  		<td><?php echo $obj->aid; ?></td>
  		<td><?php echo $obj->title; ?></td>
  		<td><?php echo $obj['cate']->cname; ?></td>
  		<td><?php echo $obj->pubtime; ?></td>
  		<td>
  		  <a href="<?php echo $this->createUrl('edit', array('cid' => $obj->cid)); ?>">[编辑]</a> 
  		  <a href="<?php echo $this->createUrl('del', array('cid' => $obj->cid)); ?>">[删除]</a>
  		</td>
  	  </tr>
	  <?php endforeach; ?>
	</table>	
	<div class="page">
	  <?php
	  $this->widget(
			  'CLinkPager', array(
		  'header' => '',
		  'firstPageLabel' => '首页',
		  'lastPageLabel' => '末页',
		  'prevPageLabel' => '上一页',
		  'nextPageLabel' => '下一页',
		  'pages' => $pages,
		  'maxButtonCount' => 5
			  )
	  );
	  ?>
	</div>
  </body>
</html>