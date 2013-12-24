<?php
class CateController extends Controller{
    //查看栏目
    function actionIndex(){
        $cateModel = Cate::model();
        $sql = "select cid,cname from {{cate}}";
        $cateInfo = $cateModel->findAllBySql($sql);
        $this->render('index',array('cateInfo'=>$cateInfo));
    }
    
    //添加栏目
    function actionAdd(){
        $cateModel = new Cate();
        if(isset($_POST['Cate'])){
            $cateModel->attributes = $_POST['Cate'];
            if($cateModel->save()){
                $this->redirect(array('index'));
            }
        }  
        $this->render('add',array('cateModel'=>$cateModel));
    }
    
    //编加栏目
    function actionEdit($cid){
        $cateModel = Cate::model();
        $cateInfo = $cateModel->findByPk($cid);
        if(isset($_POST['Cate'])){
            $cateInfo->attributes = $_POST['Cate'];
            if($cateInfo->save()){ //此时为修改
                $this->redirect(array('index'));
            }
        }
         $this->render('edit',array('cateModel'=>$cateInfo));
    }
    
    //删除栏目
    function actionDel($cid){
        $articleModel = Article::model();
        $sql = "select aid from {{article}} where cid=$cid";
        $articleInfo = $articleModel->findBySql($sql);
        dump($articleInfo);
        if(is_object($articleInfo)){
            Yii::app()->user->setFlash('hasArt','栏目下面有文章,请先删除文章!');
            $this->redirect(array('index'));
        }else{
            if(Cate::model()->deleteByPk($cid)){
                $this->redirect(array('index'));
            }
        }
    }
    
    
    
    
    
}