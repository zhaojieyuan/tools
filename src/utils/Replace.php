<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/25 09:57
 */
namespace Tools\utils;

use Tools\SDK\Aes;

class Replace{

    /**
     * @message:加密/解密
     * @param $string
     * @param $encryption
     * @param $aesParams
     * @return mixed|string
     * @author:Yuan
     */
    public static function replaceFun($string,$encryption,$aesParams = [])
    {
        switch ($encryption){
            case 'md5':
                $string = self::md5($string);
                break;
            case 'sha256':
                $string = self::sha256($string);
                break;
            case 'aes':
            case 'aes-encrypt':
                $string = self::aesEncrypt($string,$aesParams);
                break;
            case 'aes-decrypt':
                $string = self::aesDecrypt($string,$aesParams);
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
     * @message:aes-256-cbc encrypt
     * @param $str
     * @param $aesParams
     * @return string
     * @author:Yuan
     */
    public static function aesEncrypt($str,$aesParams)
    {
        $aes = new Aes($aesParams);
        return $aes->cryptoAesEncrypt($str);
    }

    /**
     * @message:aes-256-cbc decrypt
     * @param $str
     * @param $aesParams
     * @return string
     * @author:Yuan
     */
    public static function aesDecrypt($str,$aesParams)
    {
        $aes = new Aes($aesParams);
        return $aes->cryptoAesDecrypt($str);
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