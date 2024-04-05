<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';

class EmployeeController extends Controller
{
    public function index()
    {
        $link = dbConnect();
        $employeeNames = listEmployeeName($link);
        
        return $this->render([
            'title' => 'Emplypee Registration',
            'employeeNames' => $employeeNames
        ]);
    }

    public function create()
    {
        $link = dbConnect();

        // 情報を変数に格納
        $employeeName = '';
        $employeeName = $_POST['employee_name'];
        $query = "INSERT INTO employees (name) VALUES ('{$employeeName}')";
        mysqli_query($link, $query);   
        header("Location: /employee");
        
        $employeeNames = listEmployeeName($link);
        
        return $this->render([
            'title' => 'Emplypee Registration',
            'employeeNames' => $employeeNames
        ], 'index');
    }
}
