<?php
namespace app\index\controller;

use app\index\model\Databases;
use think\Db;
class Database
{
    public $date_format = 'Y-m-d H:i:s';

	public function __construct(){
		debug('api_begin');
    }
    
    public function success($info, $data = [])
    {
        config('default_return_type', 'json');
        debug('api_end');
        $data = [
            'status'      => 1,
            'info'       => $info,
            'time'      => date($this->date_format, $_SERVER['REQUEST_TIME']),
            'data'      => $data,
            'ttfb_time' => debug('api_begin', 'api_end', 6) . 's',
        ];
        return $data;
    }

    public function error($info, $data = [])
    {
        config('default_return_type', 'json');
        debug('api_end');
        $data = [
            'status'      => 0,
            'info'       => $info,
            'time'      => date($this->date_format, $_SERVER['REQUEST_TIME']),
            'data'      => $data,
            'ttfb_time' => debug('api_begin', 'api_end', 6) . 's',
        ];
        return $data;
    }

    // 设置当前数据库配置
    public function set_current($id)
    {
        $ret = Databases::setCurrent($id);
        if($ret === false){
            return $this->error('切换失败');
        }else{
            return $this->success('切换成功');
        }
    }

    // 获取所有配置过的数据库
    public function get_all_databases(){
        $list = Databases::column('id, id,current,title,db_host,db_user,db_pwd,db_port,db_name,db_prefix');
        $add_db = [0=>['title'=>'add_database','current'=>0]];
        if($list){
            $list = $list + $add_db;
        }else{
            $list = $add_db;
        }
        foreach ($list as $key => &$value) {
            if($value['current']){
                $value['title'] = '[*]'.$value['title'];
            }
        }
        return $this->success('success', $list);
    }

    // 连接数据库
    public function connect_db($return_arr = false){
        $conf = Databases::where('current', 1)->find();
        $link = [
            // 数据库类型
            'type'        => 'mysql',
            // 数据库连接DSN配置
            'dsn'         => '',
            // 服务器地址
            'hostname'    => $conf['db_host'],
            // 数据库名
            'database'    => $conf['db_name'],
            // 数据库用户名
            'username'    => $conf['db_user'],
            // 数据库密码
            'password'    => $conf['db_pwd'],
            // 数据库连接端口
            'hostport'    => $conf['db_port'],
            // 数据库连接参数
            'params'      => [],
            // 数据库编码默认采用utf8
            'charset'     => 'utf8',
            // 数据库表前缀
            'prefix'      => $conf['prefix'],
        ];
        $conn = Db::connect($link);
        $conn->query('SELECT VERSION();');
        return $conn;
    }

    // 显示列
    public function show_colums($table){
        try {
            $db = $this->connect_db();
            if (empty($db)) {
                return '尚未配置数据库';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $table  = $db->getTable($table);
        $result = $db->query("SHOW FULL COLUMNS FROM {$table}");
        if (!$result) {
            return $this->error(mysql_error());
        } else {
            while ($row = mysql_fetch_assoc($result)) {
                $res[] = $row;
            }
            return $this->success('query success', $res);
        }
    }

    // 执行sql
    public function query(){
        error_reporting(7);
        $table_queryer_file = PACKAGE_PATH. 'ThinkPHP-Queryer';
        $content            = file_get_contents($table_queryer_file);
        $sep                = '##########################################################################';
        $arr_content        = split($sep, $content);
        $sql                = trim($arr_content[0]);
        try{
            $db = $this->connect_db();
            if (empty($db)) {
                return '尚未配置数据库';
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
        $result = $db->query($sql);
        $rows   = array();
        if ($result) {
            $i = 0;
            foreach ($result as $key => $row) {
                if ($key == 0) {
                    $header = array_keys($row);
                }

                $i++;
                $rows[] = array_values($row);
            }
        }
        require PACKAGE_PATH . 'table.php';
        $in = array(
            'header' => $header ? $header : [],
            'rows'   => $rows,
        );
        // file_put_contents('./', data);
        file_put_contents(PACKAGE_PATH.'debug.php', (var_export($in, 1)));
        if ($rows) {
            $table  = new \table($in);
            $output = $table->render(0);
        }
        if (!$output) {
            $output = 'No results!';
        }
        return $output;
    }
}
