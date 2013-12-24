<?php

/**
 * 文章管理控制器
 */
class ArticleController extends Controller {
	
	/**
	 * * 代表所有用户
	 * @ 代表登陆用户
	 * ? 代表匿名用户 
	 */
	function filters() {
		return array(
			// 'accessControl - index' 这样写代表 文章控制器中的actionIndex方法不需要验证 也可以用+加,代表需要验证
			'accessControl',
		);
	}
	function accessRules() {
		return array(
			array(
				'allow',
				'actions' => array('index', 'add', 'del'), # 方法名 可以访问的方法
				'users' => array('@'), # @代表已经验证过的用户 登陆过后的用户 也可以具体化可以写admin用户
			),
			array(
				'deny',
				'users' => array('*'), # * 全部用户
			)
		);
	}

	//文章列表
	function actionIndex() {
		$cri = new CDbCriteria();
		$artModel = Article::model();
		$total = $artModel->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 2;
		$pager->applyLimit($cri);

		$artInfo = $artModel->findAll($cri);

		$data = array(
			'artInfo' => $artInfo,
			'pages' => $pager
		);

		$this->render('index', $data);
	}

	//添加文章
	function actionAdd() {
		$articleModel = new Article();
		$cateModel = Cate::model();

		$cateInfo = $cateModel->findAllBySql("select cid,cname from {{cate}}");
		$cateInfoArr = array();
		$cateInfoArr[] = "请选择";
		foreach ($cateInfo as $obj) {
			$cateInfoArr[$obj->cid] = $obj->cname;
		}
		$data = array(
			'articleModel' => $articleModel,
			'cateInfoArr' => $cateInfoArr
		);

		if (isset($_POST['Article'])) {
			//上传图片
			$articleModel->pic = CUploadedFile::getInstance($articleModel, 'pic');
			if ($articleModel->pic) {
				$pre_rand = 'img_' . date('YmdHis') . mt_rand(0, 9999);
				$imgName = $pre_rand . '.' . $articleModel->pic->extensionName;
				$articleModel->pic->saveAs('uploads/' . $imgName);
				$articleModel->pic = $imgName;

				//缩略图
				$path = dirname(Yii::app()->basePath) . '/uploads/';
				$image = Yii::app()->thumb;
				$outFile = $image->thumb($path . $imgName, '', 130, 95);
			}

			$articleModel->attributes = $_POST['Article'];
			$articleModel->pubtime = time();
			if ($articleModel->save()) {
				$this->redirect(array('index'));
			}
		}

		$this->render('add', $data);
	}

	//删除文章
	function actionDel($aid) {
		$artModel = Article::model();

		if ($artModel->deleteByPk($aid)) {
			$this->redirect(array('index'));
		}
	}

}
