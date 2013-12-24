<?php

/**
 * 前台控制器
 */
class IndexController extends Controller {

	function actionIndex() {
		
		$artModel = Article::model();
		
		# 最新文章
		$sql = "select aid,pic,title,info from {{article}} where type=0 order by pubtime desc";
		$artNew = $artModel->findAllBySql($sql);
		
		# 热门文章
		$sql = "select aid,pic,title,info from {{article}} where type=1 order by pubtime desc";
		$artHot = $artModel->findAllBySql($sql);
		
		$data = array(
			'artNew'=>$artNew,
			'artHot'=>$artHot
		);
		
		$this->render('index',$data);
	}
}
?>