<?php
/**
 * Created by PhpStorm.
 * @Message
 * @Author: Yuan
 * @Time: 2023/5/17 09:40
 */
namespace yuan9329\tools;


class demo {
    public function __construct()
    {

    }

    public function test()
    {
        return "test is true";
    }

    public function testParams($string)
    {
        return "test output is " . $string;
    }

    public function __destruct()
    {

    }
}
