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

//连接数据库
function connect_db(){
    error_reporting(0);
    $settings = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'Thinkphp.sublime-settings');
    $settings = json_decode($settings, true);
    $current_database = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'current_database');
    $config = $settings['database'][$current_database];
    if(!$config)
        exit('current_database config dosen\'t exsist');
    $argv = array(
        0=>$config['DB_HOST'].':'.$config['DB_PORT'],
        1=>$config['DB_USER'],
        2=>$config['DB_PWD'],
        3=>$config['DB_NAME'],
        4=>$config['DB_PREFIX']
    );
    $conn = mysql_connect($argv[0],$argv[1],$argv[2]);
    if(!$conn && (strpos('localhost', $argv[0])!= -1)){
        $conn = mysql_connect(str_replace('localhost', '127.0.0.1', $argv[0]),$argv[1],$argv[2]);
    }
    if(!$conn)
        exit('can\'t connect database');
    mysql_select_db($argv[3],$conn);
    mysql_set_charset('UTF8', $conn);
    return $argv;
}

function show_colums($argv){
    $config = connect_db();
    $table = $config[4].parse_name($argv[0]);
    $result = mysql_query("SHOW FULL COLUMNS FROM {$table}");
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

function query($argv = ''){
    error_reporting(7);
    $table_queryer_file = __DIR__.DIRECTORY_SEPARATOR.'ThinkPHP-Queryer';
    $content = file_get_contents($table_queryer_file);
    $sep = '##########################################################################';
    $arr_content = split($sep, $content);
    $sql = trim($arr_content[0]);
    connect_db($argv);
    $result = mysql_query($sql);
    $rows = array();
    if($result){
        $i = 0;
        while ($row = mysql_fetch_assoc($result)) {
            if($i == 0)
                $header = array_keys($row);
            $i++;
            $rows[] = array_values($row);
        }
    }
    require __DIR__.'/table.php';
    $in = array(
            'header'=>$header? $header : array(),
            'rows'=>$rows
        );
    // file_put_contents('./', data);
    file_put_contents('./debug.php',(var_export($in,1)));
    if($rows){
        $table = new table($in);
        $output = $table->render(0);
    }
    if(!$output)
        $output = 'no results!';
    exit($output);
}

//----------------------下面是通用函数-------------------------
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

function make_request($url, $param = array(), $httpMethod = 'GET') {
  $oCurl = curl_init();
  if (stripos($url, "https://") !== FALSE) {
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
  }

  if ($httpMethod == 'GET') {
    curl_setopt($oCurl, CURLOPT_URL, $url . "?" . http_build_query($param));
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
  } else {
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($param));
  }

  $sContent = curl_exec($oCurl);
  $aStatus = curl_getinfo($oCurl);
  curl_close($oCurl);
  if (intval($aStatus["http_code"]) == 200) {
    return $sContent;
  } else {
    return FALSE;
  }
}
