<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/25 09:45
 */
namespace Tools\utils;

use Tools\utils\Replace;

class Filter{

    /**
     * @message:检测当前数组是几唯
     * @param $array
     * @return int
     * @author:Yuan
     */
    public static function getArrayDimension($array)
    {
        if (is_array(reset($array))) {
            $dimension = self::getArrayDimension(reset($array)) + 1;
        } else {
            $dimension = 1;
        }
        return $dimension;
    }

    /**
     * @message:替换元素
     * @param $arr
     * @param $searchKey
     * @param $encryption
     * @author:Yuan
     */
    public static function replaceValue(&$arr, $searchKey,$encryption) {
        foreach ($arr as $key => &$value) {
            if (is_array($value)) {
                self::replaceValue($value, $searchKey,$encryption);
            } else {
                if(is_array($searchKey)){
                    foreach ($searchKey as $val){
                        if ($key == $val) $value = Replace::replaceFun($value,$encryption);
                    }
                }else{
                    if ($key == $searchKey) $value = Replace::replaceFun($value,$encryption);
                }
            }
        }
    }

    /**
     * @message:替换多维数组某个Key
     * @param $array
     * @param $oldKey
     * @param $newKey
     * @return mixed
     * @author:Yuan
     */
    public static function replaceArrayKey($array, $oldKey, $newKey)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = self::replaceArrayKey($value, $oldKey, $newKey);
            }
            if ($key === $oldKey) {
                unset($array[$oldKey]);
                $array[$newKey] = $value;
            }
        }
        return $array;
    }

    /**
     * @message:替换多维数组多个Key
     * @param $array
     * @param $oldKeys
     * @param $newKeys
     * @return mixed
     * @author:Yuan
     */
    public static function replaceArrayKeys($array, $oldKeys, $newKeys)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = self::replaceArrayKeys($value, $oldKeys, $newKeys);
            }
            foreach ($oldKeys as $index => $oldKey) {
                if ($key === $oldKey) {
                    unset($array[$oldKey]);
                    $array[$newKeys[$index]] = $value;
                }
            }
        }
        return $array;
    }

    /**
     * @message:单个-替换多维数组的值
     * @param $array
     * @param $key
     * @param $oldValue
     * @param $newValue
     * @return mixed
     * @author:Yuan
     */
    public static function replaceArrayValue($array, $key, $oldValue, $newValue) {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = self::replaceArrayValue($value, $key, $oldValue, $newValue);
            } elseif ($key === key($array) && $value === $oldValue) {
                $value = $newValue;
            }
        }
        return $array;
    }

    /**
     * @message:多个-替换多维数组的值
     * @param $array
     * @param $replacements
     * @return mixed
     * @author:Yuan
     */
    public static function replaceArrayValues($array, $replacements) {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = self::replaceArrayValues($value, $replacements);
            } else {
                foreach ($replacements as $key => $replacement) {
                    list($searchKey, $oldValue, $newValue) = $replacement;
                    if ($key === key($array) && $searchKey === $key && $value === $oldValue) {
                        $value = $newValue;
                    }
                }
            }
        }
        return $array;
    }
}