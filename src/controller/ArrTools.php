<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/31 09:29
 */

namespace Tools\controller;

use Tools\utils\Common;
use Tools\utils\Filter;

class ArrTools
{

    public function __construct()
    {

    }

    /**
     * @message:信息脱敏
     * @param array $array 加密数据
     * @param array $replacement 加密Key
     * @param string $encryption 加密方式
     * @param boolean $default 默认自带加密字段
     * @param array $aesParams 加密信息
     * @return null
     * @author:Yuan
     */
    public static function desensitize($array,$replacement = [],$encryption = 'md5',$default = true,$aesParams = [])
    {
        if($default){
            $replacement = array_merge($replacement,Common::getKeys('filters')['params']);
        }
        Filter::replaceValue($array,$replacement,$encryption,$aesParams);
        return $array;
    }

}