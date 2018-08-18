<?php
$a = array(
    1, 3,  6, 4, 1, 2
    //1,2,3
);

function solution(array $a = array()){
    /**
     * Assumes that the first positive integer
     * in an empty array will be 1 - also stops
     * potential for infinite loop in while()
     * below
     */
    if(!count($a)){
        return 1;
    }

    $i = 0;

    while(in_array(++$i, $a)){}

    return $i;
}

echo solution($a);