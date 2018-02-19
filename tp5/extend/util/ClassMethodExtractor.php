<?php

namespace util;

class ClassMethodExtractor
{

    public function generate($classNames)
    {
        config('default_return_type', 'json');
        // TODO 获取待处理的类命名空间数据
        // TODO 遍历类 反射
        // TODO 获取类的信息 (名称、方法列表)
        // TODO 遍历方法列表， 获取方法的类型 和注释

        $outputs = [];
        foreach ($classNames as $k => $className) {
            $class = new \ReflectionClass($className);
            $key   = $class->getShortName();
            // dump($key);
            $outputs[$key] = $this->getClassAnnotation($class);
        }
        return $outputs;
    }

    // 将通用的类的信息数组转为速查表所需要的格式字段 name,content
    public function parseChapter($classes)
    {
        $ret = [];
        foreach ($classes as $class_name => $class) {
            $temp         = [];
            $temp['name'] = $class_name;
            $content      = [];
            if ($class['hasPublicMethods']) {
                $content[] = "\${$class_name} = new {$class_name}();" . PHP_EOL;
            }
            foreach ($class['methods'] as $method_name => $method) {
                $content[] = $method['docComment_formated'];
                switch ($method['type']) {
                    case 'public_public':
                        $content[] = "{$class_name}->{$method_name}({$method['args_formated']})";
                        break;
                    case 'public_static':
                        $content[] = "{$class_name}::{$method_name}({$method['args_formated']})";
                        break;
                    case 'private_public':
                        $content[] = "\$this->{$method_name}({$method['args_formated']})";
                        break;
                    case 'private_static':
                        $content[] = "self::{$method_name}({$method['args_formated']})";
                        break;
                    default:
                        $content[] = "未支持的方法类型：{$method['type']}";
                        break;
                }
                $content[] = PHP_EOL;
            }
            $temp['content'] = implode(PHP_EOL, $content);
            $ret[]           = $temp;
        }
        return $ret;
    }

    // 转换注释风格
    public function parseMethodDoc($doc)
    {
        if (empty($doc)) {
            return $doc;
        }
        // 去除类方法注释前的缩进
        $doc   = str_ireplace('    ', '', $doc);
        $lines = explode(PHP_EOL, $doc);
        if ($lines > 1) {
            return $doc;
        }
        if (stripos('/**', $doc) !== false) {
            $arr_doc    = explode(' ', $doc);
            $arr_doc[0] = '//';
            array_pop($arr_doc);
            return implode(' ', $arr_doc);
        }
    }

    public function parseParameters($class, $method, $args)
    {
        if ($args) {
            $args_str = [];
            foreach ($args as $key => $arg) {
                $p = new \ReflectionParameter(array($class, $method), $key);
                // 判断是否引用参数
                if ($p->isPassedByReference()) {
                    $arg_str_new = "&\$" . $p->getName();
                } else {
                    $arg_str_new = "\$" . $p->getName();
                }
                if ($p->isOptional() && $p->isDefaultValueAvailable()) {
                    $a_clsss = $class;
                    // 获取某些内部类的参数会抛异常，且异常时$class会变化不是我们想知道的哪个类方法一场了
                    try {
                        $defaul = $p->getDefaultValue();
                        $arg_str_new .= is_array($defaul) ? ' = ' . '[]' : ' = ' . var_export($defaul, 1);
                    } catch (\Exception $e) {
                        trace($p->isVariadic());
                        trace($a_clsss . '/' . $method . '_' . $key);
                    }
                }
                $args_str[] = $arg_str_new;
            }
            return implode(', ', $args_str);
        }
        return '';
    }

    // 获取类的注释信息
    public function getClassAnnotation($class)
    {

        $ret = [
            'hasPublicMethods' => 0,
        ];
        $methods = $class->getMethods();
        foreach ($methods as $key => $method) {
            $class       = $method->class;
            $method_name = $method->name;
            $rm          = new \ReflectionMethod($class, $method_name);
            // 忽略构造和析构
            if ($rm->isConstructor() || $rm->isDestructor()) {
                continue;
            }
            $foo                        = [];
            $foo['docComment']          = $rm->getDocComment();
            $foo['docComment_formated'] = $this->parseMethodDoc($foo['docComment']);
            $foo['args']                = $rm->getParameters();
            $foo['args_formated']       = $this->parseParameters($class, $method_name, $foo['args']);
            if ($rm->isPublic()) {
                $type = $rm->isStatic() ? 'public_static' : 'public_public';
            } else {
                $type = $rm->isStatic() ? 'private_static' : 'private_public';
            }
            // 只在hasPublicMethods 为0时更新值，保证设置1后不会被复写为0
            if (empty($ret['hasPublicMethods'])) {
                $ret['hasPublicMethods'] = stripos($type, '_public') !== false;
            }
            $foo['type']                  = $type;
            $ret['methods'][$method_name] = $foo;
        }

        return $ret;
        // $className = 'think\\App';
        // $class = new \ReflectionClass($className);
        // config('default_return_type', 'json');

        // 类名
        // return $class->name;

        // ReflectionClass 实例的一个字符串表示形式
        // return $class->__toString();

        // 同上
        // return \ReflectionClass::export($className, 1);

        // 获取类常量
        // return json_encode($class->getConstants());

        // 获取构造方法
        // return $class->getConstructor();

        // 类名相关
        // var_dump($class->inNamespace());
        // var_dump($class->getName());
        // var_dump($class->getNamespaceName());
        // var_dump($class->getShortName());

        # 文件相关
        // getFileName
        // getExtensionName

        // 属性相关
        // return $class->getDefaultProperties();
        // return $class->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);

        // const integer IS_STATIC = 1 ;
        // const integer IS_PUBLIC = 256 ;
        // const integer IS_PROTECTED = 512 ;
        // const integer IS_PRIVATE = 1024 ;

        // return $class->getStaticProperties();

        // 类注释
        // return $class->getDocComment();
    }
}
