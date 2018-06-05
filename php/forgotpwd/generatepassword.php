<?php

function generatepassword(){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<6; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}
?>