<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/25 09:57
 */
namespace Tools\utils;

class Replace{

    /**
     * @message:替换方法
     * @author:Yuan
     */
    public static function replaceFun($string,$encryption)
    {
        switch ($encryption){
            case 'md5':
                $string = self::md5($string);
                break;
            case 'sha256':
                $string = self::sha256($string);
                break;
            default:
                break;
        }
        return $string;
    }



    /**
     * @message:MD5处理
     * @param $str
     * @return string
     * @author:Yuan
     */
    public static function md5($str)
    {
        return md5($str);
    }

    /**
     * @message:sha256处理
     * @param $str
     * @return string
     * @author:Yuan
     */
    public static function sha256($str)
    {
        return hash("sha256", utf8_encode($str));
    }

    /**
     * @message:自定义打码
     * @param $string
     * @param $head
     * @param $tail
     * @author:Yuan
     */
    public static function custom($string,$head,$tail)
    {
        // @todo 待定
    }


}