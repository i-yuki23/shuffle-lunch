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

    // public function create()
    // {
    //     $groups = [];
    //     $link = dbConnect();
    //     $employeeNames = listEmployeeName($link);
    //     $groups = createGroup($employeeNames);
        
    //     include __DIR__ . "/../views/index.php";
    // }
}
