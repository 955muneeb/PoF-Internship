<?php

class Student
{
    // Properties
    public $name = "Muneeb";
    public $age = 22;

    // Method
    public function introduce()
    {
        echo "Hello, My Name is " . $this->name;
    }
}

$student = new Student();

echo "<h2>Properties & Methods</h2>";

echo "Name: " . $student->name;
echo "<br>";

echo "Age: " . $student->age;
echo "<br><br>";

$student->introduce();