<?php

    function encrypt($text){
        $encryptPassword = '554E60548E8A5F818865CB08256D071C9A7D6C8FBC38FE6A2A5B3589AF69A5DB';
        $ciph="AES-128-ECB";
        return openssl_encrypt($text, $ciph, $encryptPassword, 0);
    }

    function decrypt($text){
        $encryptPassword = '554E60548E8A5F818865CB08256D071C9A7D6C8FBC38FE6A2A5B3589AF69A5DB';
        $ciph="AES-128-ECB";
        return openssl_decrypt($text, $ciph, $encryptPassword, 0);
    }

?>