<?php

class Employee extends DatabaseModel
{
    public function fetchAllName()
    {
        return $this->fetchAll('SELECT name FROM employees');
    }

    public function insert($name)
    {
        $this->execute('INSERT INTO employees (name) VALUES (?)', ['s', $name]);
    }

}
