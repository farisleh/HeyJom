<?php

function generateFibonacciNumbers($n) {
    $fibonacciNumbers = array();
    
    if ($n >= 1) {
        $fibonacciNumbers[] = 0;
    }
    if ($n >= 2) {
        $fibonacciNumbers[] = 1;
    }
    
    for ($i = 2; $i < $n; $i++) {
        $fibonacciNumbers[] = $fibonacciNumbers[$i - 1] + $fibonacciNumbers[$i - 2];
    }
    
    return $fibonacciNumbers;
}

$n = intval(readline("Enter the value of n: "));
$fibonacciNumbers = generateFibonacciNumbers($n);

foreach ($fibonacciNumbers as $number) {
    echo $number . " ";
}

?>