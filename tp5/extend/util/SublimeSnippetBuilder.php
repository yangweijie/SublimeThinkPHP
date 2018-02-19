<?php

namespace util;

class SublimeSnippetBuilder extends SnippetBuilder
{
	// 生成函数
	public function buildFunction($functions)
	{
		foreach ($functions as $name => $fun) {
			$args_arr = [$name, '(', ')'];
			if ($fun['args']) {
				$args_arr = [$name, '('];
				$index    = 1;
				foreach ($fun['args'] as $key => $arg) {
					$p = new \ReflectionParameter($name, $key);
					if ($p->isPassedByReference()) {
						$arg_str_new = '\&\\$' . $p->getName();
					} else {
						$arg_str_new = '\\$' . $p->getName();
					}

					if ($p->isOptional() && $p->isDefaultValueAvailable()) {
						// 获取某些内部类的参数会抛异常，且异常时$class会变化不是我们想知道的哪个类方法一场了
						try {
							$defaul = $p->getDefaultValue();
							$arg_str_new .= is_array($defaul) ? ' = []' : ' = ' . var_export($defaul, 1);
						} catch (\Exception $e) {
							trace($p->isVariadic());
							trace($name . '_' . $key);
						}
					}
					if ($index == 1) {
						$p_str = sprintf('${%d:%s}', $index, $arg_str_new);
					} else {
						$p_str = sprintf('${%d: ,%s}', $index, $arg_str_new);
					}

					$args_arr[] = $p_str;
					$index++;
				}
				$args_arr[] = ')';
			}
			$contens = implode('', $args_arr) . '$0';
			$foo     = [
				'trigger'  => $name,
				'contents' => $contens,
			];
			$this->ret[] = $foo;
		}
	}

	public function buildClass($class)
	{
		if($class['methods']){
			foreach ($class['methods'] as $name => $fun) {
				switch ($fun['type']) {
					case 'public_static':
					case 'private_static':
						$trigger_name = "::{$name}";
						break;
					case 'public_public':
					case 'private_public':
						$trigger_name = "->{$name}";
						break;
					default:
						$trigger_name = '';
						break;
				}
				$args_arr = [$trigger_name, '(', ')'];
				if (empty($fun['args']) == false) {
					$args_arr = [$trigger_name, '('];
					$index    = 1;
					foreach ($fun['args'] as $key => $p) {
						if ($p->isPassedByReference()) {
							$arg_str_new = '\&\\$' . $p->getName();
						} else {
							$arg_str_new = '\\$' . $p->getName();
						}

						if ($p->isOptional() && $p->isDefaultValueAvailable()) {
							// 获取某些内部类的参数会抛异常，且异常时$class会变化不是我们想知道的哪个类方法一场了
							try {
								$defaul = $p->getDefaultValue();
								$arg_str_new .= is_array($defaul) ? ' = []' : ' = ' . var_export($defaul, 1);
							} catch (\Exception $e) {
								trace($p->isVariadic());
								trace($name . '_' . $key);
							}
						}
						if ($index == 1) {
							$p_str = sprintf('${%d:%s}', $index, $arg_str_new);
						} else {
							$p_str = sprintf('${%d: ,%s}', $index, $arg_str_new);
						}

						$args_arr[] = $p_str;
						$index++;
					}
					$args_arr[] = ')';
				}
				$contens = implode('', $args_arr) . '$0';
				$foo     = [
					'trigger'  => $trigger_name,
					'contents' => $contens,
				];
				$this->ret[] = $foo;
			}
		}
	}

	public function parseAll($ret)
	{
		// dump($ret);
		$ret = [
			"scope"       => "source.php - variable.other.php",
			"completions" => $ret,
		];
		return json_encode($ret, JSON_PRETTY_PRINT);
	}
}
