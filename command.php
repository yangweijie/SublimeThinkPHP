<?php
header('Content-type:text/plain;charset=utf-8');
error_reporting(0);
if($argc == 1){
	error('invalid command');
}else{
	$command = $argv[1];
	$filename = $argv[0];
	unset($argv[0],$argv[1]);
	$argv = array_values($argv);
	if(!function_exists($command)){
		error('wrong command name');
	}else{
		$command($argv);
	}	
}

function show_colums_after_connected_from_file($argv){
	$config = include $argv[0];
	$table = $argv[1];
	$argv = array(
		0=>$config['DB_HOST'].':'.$config['DB_PORT'],
		1=>$config['DB_USER'],
		2=>$config['DB_PWD'],
		3=>$config['DB_NAME'],
		4=>$config['DB_PREFIX'].parse_name($table)
	);
	show_colums($argv);
}

function show_colums($argv){
	$argv[2] ==''? $argv[2]="''":$argv;
	$conn = mysql_connect($argv[0],$argv[1],"$argv[2]");
	if(!$conn && (strpos('localhost', $argv[0])!= -1)){
		$conn = mysql_connect(str_replace('localhost', '127.0.0.1', $argv[0]),$argv[1],$argv[2]);
	}
	if(!$conn) error('can\'t connect database');
	$db = mysql_select_db($argv[3],$conn);
	mysql_set_charset('UTF8', $conn ); 
	
	$result = mysql_query("SHOW FULL COLUMNS FROM {$argv[4]}");
	if(!$result){
		error(mysql_error());
	}else{
		while($row = mysql_fetch_assoc($result)){
      $res[] = $row;
    }
		success('query success',$res);
	}
	mysql_close();
}

function error($msg,$data=''){
	exit(json_encode(array('status'=>0,'info'=>$msg,'data'=>$data)));
}

function success($msg,$data=''){
	exit(json_encode(array('status'=>1,'info'=>$msg,'data'=>$data)));
}

/**
  +----------------------------------------------------------
 * 字符串命名风格转换
 * type
 * =0 将Java风格转换为C的风格
 * =1 将C风格转换为Java的风格
  +----------------------------------------------------------
 * @access protected
  +----------------------------------------------------------
 * @param string $name 字符串
 * @param integer $type 转换类型
  +----------------------------------------------------------
 * @return string
  +----------------------------------------------------------
 */
function parse_name($name, $type=0) {
  if ($type) {
    return ucfirst(preg_replace("/_([a-zA-Z])/e", "strtoupper('\\1')", $name));
  } else {
    return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
  }
}
?>