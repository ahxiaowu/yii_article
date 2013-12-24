<?php

/**
 * 文章管理控制器
 */
class ArticleController extends Controller {

	function actionIndex($aid) {
		$artInfo = Article::model()->findByPk($aid);
		$this->render('index',array('artInfo'=>$artInfo));
	}

}

?>