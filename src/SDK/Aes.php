<?php
namespace Tools\SDK;

use Tools\utils\Common;
class Aes
{
    private $salt = null;
    private $iv = null;
    private $passphrase = null;
    private $iterations = null;

    protected static $params = ['iv','salt','passphrase','iterations'];

    public function __construct($service)
    {
        if($service){
            foreach (self::$params as $value){
                if(!isset($service[$value])){
                    echo "参数异常：" . $value;die;
                }
            }
        }
        $aes = !empty($service) ? $service : Common::getKeys('aes_default');
        $this->iv = $aes['iv'];
        $this->salt = $aes['salt'];
        $this->passphrase = $aes['passphrase'];
        $this->iterations = $aes['iterations'];
    }

    public function set_salt($salt)
    {
        $this->salt = $salt;
    }
    public function get_salt()
    {
        return $this->salt;
    }
    public function set_iv($iv)
    {
        $this->iv = $iv;
    }
    public function get_iv()
    {
        return $this->iv;
    }
    public function set_passphrase($passphrase)
    {
        $this->passphrase = $passphrase;
    }
    public function get_passphrase()
    {
        return $this->passphrase;
    }
    public function set_iterations($iterations)
    {
        $this->iterations = $iterations;
    }
    public function get_iterations()
    {
        return $this->iterations;
    }

    public function cryptoAesEncrypt($content)
    {
        $salt = $this->salt;
        $iv = $this->iv;
        $passphrase = $this->passphrase;
        $iterations = $this->iterations;
        $key = hash_pbkdf2("sha512",$passphrase,$salt,$iterations,64);
        $encrypdata = openssl_encrypt($content,'aes-256-cbc',hex2bin($key),OPENSSL_RAW_DATA,$iv);
        $data = base64_encode($encrypdata);
        return $data;
    }
    public function cryptoAesDecrypt($content)
    {
        $content =base64_decode(strtr($content, '-_', '+/'));
        $salt = $this->salt;
        $iv = $this->iv;
        $passphrase = $this->passphrase;
        $iterations = $this->iterations;
        $key = hash_pbkdf2("sha512",$passphrase,$salt,$iterations,64);
        $decrypdata = openssl_decrypt($content,'aes-256-cbc',hex2bin($key),OPENSSL_RAW_DATA,$iv);
        return $decrypdata;
    }
}