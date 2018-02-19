<?php
namespace app\index\controller;

use util\SublimeSnippetBuilder;

class Index
{
	public function build_completion(){
		$classes = $this->getAllUserClasses();
		$stb     = new SublimeSnippetBuilder($classes);
		$stb->buildAll(PACKAGE_PATH.'php.sublime-completions');
		return '生成php完成成功！'.PHP_EOL;
	}

	// 获取全部用户定义的类
	public function getAllUserClasses(){
		$all_class = get_declared_classes();
		$ret = [];
		foreach ($all_class as $class) {
			$rf = new \ReflectionClass($class);
			if(false == $rf->isInternal()){
				if('app\index\controller\Index' == $class){
					continue;
				}
				$ret[] = $class;
			}
		}
		return $ret;
	}
}
