<?php
/**
 * 前台控制器
 */
class IndexController extends Controller {
    function actionIndex() {
    	$data = array(
    		'title'=>'文章网'
    	);
    	p($data);
        $this->renderPartial('index',$data);
    }

    function actionAdd() {
        $this->renderPartial('add');
    }

    
    
    
    
    
    
    
    
    
    
    
    
}
?>