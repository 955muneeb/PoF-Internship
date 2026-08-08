<?php

class Student
{
    public $name;
    public $age;
    public $course;

    public function __construct($name,$age,$course)
    {
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
    }

    public function display()
    {
        echo "<h2>Student Information</h2>";

        echo "Name : " . $this->name;
        echo "<br>";

        echo "Age : " . $this->age;
        echo "<br>";

        echo "Course : " . $this->course;
    }
}

$student = new Student("Muneeb",22,"Laravel");

$student->display();