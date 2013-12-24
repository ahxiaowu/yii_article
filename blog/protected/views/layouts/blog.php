<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>上善若水文章管理系统</title>
			<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/web/css/common.css" rel="stylesheet" />
	</head>	
	<body>
		<div id="top">
		</div>
		<div id="header">
			<div class='logo'>
				<a href=""><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/web/images/logo.jpg"></a>
			</div>
			<div class='navigation'>
				<a href="<?php echo $this->createUrl("/") ?>">首页</a>
				<?php
				$layoutArtModel = Article::model();
				$commArr = $layoutArtModel->common();
				foreach ($commArr['nav'] as $v) {
					echo '<a href="'.$this->createUrl('cate/index',array('cid'=>$v->cid)).'">' . $v->cname . '</a>';
				}
				?>
			</div>
		</div>

		<?php echo $content ?>

		<div class='sidebar'>
			<div class='item'>
				<h2>文章标题</h2>
				<ul class='flink'>
					<?php
					foreach ($commArr['title'] as $v) {
						echo '<li><a href="'.$this->createUrl('article/index',array('aid'=>$v->aid)).'">' . $v->title . '</a></li>';
					}
					?>
				</ul>
			</div>

		</div>
		</div>
		<div id="footer">
			<div class='bgbar'></div>
			<div class='bottom'>
				<div class='pos'>
					<div class='copyright'>
						© Copyright 2011-2013 上善若水
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>
