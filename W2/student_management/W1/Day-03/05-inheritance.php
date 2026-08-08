<?php

class Person
{
    public $name = "Muneeb";

    public function greet()
    {
        echo "Hello Everyone!";
    }
}

class Student extends Person
{

}

$student = new Student("Muneeb");

echo "<h2>Inheritance Example</h2>";

echo $student->name;

echo "<br>";

$student->greet();