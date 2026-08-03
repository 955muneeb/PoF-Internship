<?php

class Math
{
    public static $pi = 3.1416;

    public static function square($number)
    {
        return $number * $number;
    }
}

echo "<h2>Static Example</h2>";

echo "PI = " . Math::$pi;

echo "<br>";

echo "Square = " . Math::square(5);