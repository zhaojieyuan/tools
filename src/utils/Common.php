<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/6/21 14:35
 */
namespace Tools\utils;

class Common{
    /**
     * @message:获取Key信息
     * @return mixed
     * @author:Yuan
     */
    public static function getKeys($key)
    {
        $params = require __DIR__ . '/.././config/params-local.php';
        if(isset($params[$key])){
            $params = $params[$key];
        }
        return $params ?? [];
    }
}