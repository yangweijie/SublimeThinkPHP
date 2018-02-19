<?php

namespace util;

class SnippetBuilder
{
    public $cme;

    public function __construct($classes)
    {
        // if (false == defined('THINK_VERSION')) {
        //     throw new \Exception('请在thinkphp应用中执行本类', 1);
        // }
        $this->cme            = new ClassMethodExtractor();
        // $this->framework_type = version_compare(THINK_VERSION, '5') >= 0 ? 5 : 3;
        $this->classes        = $classes;
    }

    public function buildAll($path)
    {
        $consts    = $this->getConsts();
        $functions = $this->getFunctions();
        $classes = $this->classes;
        $this->ret = [];
        if ($consts) {
            $this->buildConsts($consts);
        }
        if ($functions) {
            $this->buildFunction($functions);
        }
        if ($classes) {
        	foreach ($classes as $class) {
	        	$class2 = $this->cme->getClassAnnotation(new \ReflectionClass($class));
	            $this->buildClass($class2);
        	}
        }
        if ($this->ret) {
            file_put_contents($path, $this->parseAll($this->ret));
        } else {
            exit('没有可生成的内容');
        }
    }

    // 获取常量数组
    public function getConsts()
    {
        $all_consts = get_defined_constants(true);
        return array_keys($all_consts['user']);
    }

    // 生成常量完成
    public function buildConsts($consts)
    {
        foreach ($consts as $key => &$const) {
            $this->ret[] = $const;
        }
    }

    // 生成类的完成
    public function buildClass($classes)
    {

    }

    // 获取定义的函数
    public function getFunctions()
    {
        $arr = get_defined_functions();
        $ret = [];
        foreach ($arr['user'] as $key => $name) {
            $foo         = [];
            $refFunc     = new \ReflectionFunction($name);
            $foo['args'] = $refFunc->getParameters();
            $ret[$name]  = $foo;
        }
        return $ret;
    }

    // 生成函数
    public function buildFunction($functions)
    {

    }

}
