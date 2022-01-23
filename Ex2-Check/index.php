<?php

$str = "s * (s – a) * (s – b) * (s – c)";

function checkMatch($str)
{
    $stack = new SplStack();
    $arr = str_split($str);
    foreach ($arr as $value) {
        if ($value == '(') {
            $stack->push($value);
        }
        if (!$stack->isEmpty()) {
            if ($value == ')') {
                $stack->pop();
            }
        }
    }
    return true;
}

//function show($str){
//    if(checkMatch($str)==null){
//        return true ;
//    }
//    return false;
//}
print_r(checkMatch($str));