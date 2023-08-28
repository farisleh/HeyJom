<?php
function isPrime($number) {
    if ($number <= 1) {
        return false;
    }

    if ($number <= 3) {
        return true;
    }

    if ($number % 2 === 0 || $number % 3 === 0) {
        return false;
    }

    for ($i = 5; $i * $i <= $number; $i += 6) {
        if ($number % $i === 0 || $number % ($i + 2) === 0) {
            return false;
        }
    }

    return true;
}

$number = readline("Enter a number: ");

if (is_numeric($number)) {
    if (isPrime((int)$number)) {
        echo "$number is a prime number.";
    } else {
        echo "$number is not a prime number.";
    }
} else {
    echo "Invalid input. Please enter a valid number.";
}

?>
