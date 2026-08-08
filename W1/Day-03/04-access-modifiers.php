<?php

class Student
{
    public $name = "Muneeb";

    private $password = "12345";

    protected $marks = 90;

    public function showData()
    {
        echo "Name: " . $this->name;
        echo "<br>";

        echo "Password: " . $this->password;
        echo "<br>";

        echo "Marks: " . $this->marks;
    }
}

$student = new Student("Muneeb", 90, "12345");

echo "<h2>Access Modifiers</h2>";
echo $student->name;

echo "<br><br>";

$student->showData();