<?php

class Employee
{
    private $id;
    private $name;
    private $salary;
    private $age;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setName(?string $name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    public function setSalary(?int $salary)
    {
        if ($salary > 0 && $salary <= 100000) {
            $this->salary = $salary;
        }
    }

    public function setAge(?int $age)
    {
        if ($age >= 18) {
            $this->age = $age;
        }
    }
}
