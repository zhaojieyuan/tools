<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/22 09:30
 */
namespace Tools\api\controller;

class ToolsController
{
    public function __construct()
    {
    }

    public static function newTest()
    {
        return "newTest is true";
    }

    public static function test()
    {
        return "test is true";
    }

    public static function testParams($string)
    {
        return "test output is " . $string;
    }

    public function __destruct()
    {

    }
}