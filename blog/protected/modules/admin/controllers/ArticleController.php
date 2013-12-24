<?php

/**
 * 文章管理控制器
 */
class ArticleController extends Controller {

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

}
