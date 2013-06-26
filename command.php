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
    $conn = mysql_connect($argv[0],$argv[1],$argv[2]);
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

function find_php_defination($argv){
    $word = $argv[0];
    $path = realpath(dirname(__FILE__));
    $path .= DIRECTORY_SEPARATOR.'phpruntime'.DIRECTORY_SEPARATOR;
    chdir($path);
    $list = glob('*.php');
    $to_search = "function {$word} (";
    foreach ($list as $key => $value) {
        $content = file_get_contents($path.$value);
        $pos_search = strpos($content, $to_search);
        // error('',$pos_search);
        if($pos_search !== false){
            $comment = get_comment($pos_search, $content);
            if($comment){
                // ver_dump($comment);
                $comment = str_replace(PHP_EOL, '\n', $comment);
                // $comment = str_replace('/**', '  /**', $comment);
                // $comment = nl2br($comment);
                success('found it!', $comment);
                break;
            }
        }
    }
    error('didn\'t find it');
}

function get_comment($pos,$content){
    $content_length = strlen($content);
    $end_pos = strripos($content, '*/', $pos-$content_length);
    $start_pos = strripos($content, '/**', $end_pos-$content_length);
    return substr($content, $start_pos, $end_pos-$start_pos+2);
}

function query($argv = ''){
    error_reporting(7);
    $table_queryer_file = __DIR__.DIRECTORY_SEPARATOR.'thinkphp_database_queryer';
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
    );

    $content = file_get_contents($table_queryer_file);
    $sep = '##########################################################################';
    $arr_content = split($sep, $content);
    $sql = trim($arr_content[1]);
    $conn = mysql_connect($argv[0],$argv[1],$argv[2]);
    if(!$conn && (strpos('localhost', $argv[0])!= -1)){
        var_dump($argv);
        $conn = mysql_connect(str_replace('localhost', '127.0.0.1', $argv[0]),$argv[1],$argv[2]);
    }
    if(!$conn) error('can\'t connect database');
    $db = mysql_select_db($argv[3],$conn);
    mysql_set_charset('UTF8', $conn);
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

    $table = new table($in);
    $output = $table->render(0);
     if($output == false)
        $output = 'no results!';
    $output = str_replace($arr_content[2], PHP_EOL.PHP_EOL.$output, $content);
    file_put_contents($table_queryer_file, $output);
    exit;
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
