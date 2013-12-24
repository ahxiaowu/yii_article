<?php 
/**
 * 格式化打印函数
 */
function p($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

/**
 * 格式化打印函数带数据类型
 */
function dump($arr){
	echo '<pre>';
	var_dump($arr);
	echo '</pre>';
}



?>