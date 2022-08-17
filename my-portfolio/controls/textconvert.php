<?php

function split($text, $number,$doku){
    if(strlen($text) > $number){
        return mb_substr($text,0,$number,"UTF-8").$doku;
    }
    return $text;
}

?>