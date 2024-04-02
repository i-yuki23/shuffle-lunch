<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';
require_once __DIR__ . '/../core/Controller.php';

class EmployeeController extends Controller
{
    public function index()
    {
        $link = dbConnect();
        $employeeNames = listEmployeeName($link);
        
        include(__DIR__ . "/../views/employee.php");
    }

    public function create()
    {
        $link = dbConnect();

        // 情報を変数に格納
        $employeeName = '';
        if (isset($_POST['employee_name']))
        {
            $employeeName = $_POST['employee_name'];
            $query = "INSERT INTO employees (name) VALUES ('{$employeeName}')";
            mysqli_query($link, $query);
        }
        header("Location: /employee");
        
        $employeeNames = listEmployeeName($link);
        
        include(__DIR__ . "/../views/employee.php");
    }
}
