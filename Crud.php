<?php

class Crud
{
    private $dsn = 'mysql:dbname=employee;host=localhost;charset=utf8';
    private $user = 'root';
    private $password = '';
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO($this->dsn, $this->user, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function listEmployees()
    {
        $sql = "SELECT * FROM employee";
        $stmt = $this->conn->query($sql);
        while ($employee = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $employee;
        }
        return $data;
    }

    public function add(Employee $employee)
    {
        $sql = "INSERT INTO employee (name, salary, age) VALUES (:name, :salary, :age)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue('name', $employee->getName(), PDO::PARAM_STR );
        $stmt->bindValue('salary', $employee->getSalary(), PDO::PARAM_INT );
        $stmt->bindValue('age', $employee->getAge(), PDO::PARAM_INT );
        $stmt->execute();
    }

    public function update(string $name, int $salary, int $age, int $id)
    {
        $sql = "UPDATE employee SET name = :name, salary = :salary, age = :age WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue('name', $name, PDO::PARAM_STR );
        $stmt->bindValue('salary', $salary, PDO::PARAM_INT );
        $stmt->bindValue('age', $age, PDO::PARAM_INT );
        $stmt->bindValue('id', $id, PDO::PARAM_INT );
        $stmt->execute();
    }

    public function remove(int $id)
    {
        $sql = "DELETE FROM employee WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT );
        $stmt->execute();
    }

    public function getEmployeeById(int $id)
    {
        $sql = "SELECT * FROM employee WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT );
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}

