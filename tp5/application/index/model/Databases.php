<?php
namespace app\index\model;

use think\Model;

class Databases extends Model
{
    protected $name = 'databases';

    // 设置当前数据库配置
    public static function setCurrent($id){
        try{
            self::where('current', 1)->update(['current'=>0]);
            self::update(['id'=>$id, 'current'=>1]);
            return true;
        }catch(\Exception $e){
            self::$error = $e->getMessage();
            return false;
        }
    }
}
