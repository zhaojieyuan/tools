<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/22 09:32
 */
function requireDir($dir)
{
    $handle = opendir($dir);//打开文件夹
    while (false !== ($file = readdir($handle))) {//读取文件
        if ($file != '.' && $file != '..') {
            $filepath = $dir . '/' . $file;//文件路径
            if (filetype($filepath) == 'dir') {//如果是文件夹
                requireDir($filepath);//继续读
            } else {
                include_once($filepath);//引入文件
            }
        }
    }
}
requireDir(__DIR__ . '/../controller/');