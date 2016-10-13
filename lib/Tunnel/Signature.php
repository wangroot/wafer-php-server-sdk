<?php
namespace QCloud_WeApp_SDK\Tunnel;

use \QCloud_WeApp_SDK\Conf as Conf;

class Signature {
    /**
     * 计算签名
     */
    public static function compute($input) {
        if (is_array($input)) {
            $input = json_encode($input, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        return sha1($input . Conf::$TunnelSignatureKey, FALSE);
    }

    /**
     * 校验签名
     */
    public static function check($input, $signature) {
        return self::compute($input) === $signature;
    }
}
