<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/web/css/details.css" rel="stylesheet" />
<div id="main">
	<div class='details'>
		<h1><?php echo $artInfo->title; ?></h1>
		<div class='info'>
			<div class='base'>
				<em>发表于: <?php echo date('Y-m-d H:i:s',$artInfo->pubtime); ?></em>, 分类：<?php echo $artInfo['cate']->cname; ?><strong> </strong>
			</div>
		</div>
		<div class='content'>
			<?php echo $artInfo->content; ?>
		</div>
	</div>

