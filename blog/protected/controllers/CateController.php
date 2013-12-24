<?php

/**
 * 栏目管理控制器
 */
class CateController extends Controller {

	function actionIndex($cid) {
		$sql = "select aid,pic,title,info from {{article}} where cid=$cid";
		$artInfo = Article::model()->findAllBySql($sql);
		$this->render('index',array('artInfo'=>$artInfo));
	}

}

?>