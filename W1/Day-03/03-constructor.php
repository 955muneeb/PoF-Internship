<?php

class Student
{
    public $name;
    public $age;

    // Constructor
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function show()
    {
        echo "Name: " . $this->name;
        echo "<br>";
        echo "Age: " . $this->age;
    }
}

$student = new Student("Muneeb",22);

echo "<h2>Constructor Example</h2>";

$student->show();