<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/31 09:29
 */

namespace Tools\controller;

use Tools\utils\Filter;

class ArrTools
{
    protected static $filters = ['idcard', 'mobile', 'phone'];

    public function __construct()
    {

    }

    /**
     * @message:信息脱敏
     * @param $array
     * @param $replacement
     * @param $encryption
     * @param $default
     * @return null
     * @author:Yuan
     */
    public static function desensitize($array,$replacement,$encryption = 'md5',$default = true)
    {
        if($default){
            $replacement = array_merge($replacement,self::$filters);
        }
        Filter::replaceValue($array,$replacement,$encryption);
        return $array;
    }

}