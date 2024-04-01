<?php
require_once(__DIR__ . '/lib/mysql.php');
$link = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // 情報を変数に格納
    $employeeName = '';
    if (isset($_POST['employee_name']))
    {
        $employeeName = $_POST['employee_name'];
        $query = "INSERT INTO employees (name) VALUES ('{$employeeName}')";
        mysqli_query($link, $query);
    }
    header("Location: employee.php");

}

function listEmployeeName($link)
{   
    $sql = "SELECT id, name FROM employees";
    $results = mysqli_query($link, $sql);
    $employeeNames = [];
    while ($employeeName = mysqli_fetch_assoc($results))
    {
        $employeeNames[] = $employeeName;
    }
    mysqli_free_result($results);
    return $employeeNames;
}

$employeeNames = listEmployeeName($link);

include(__DIR__ . "/views/employee.php")
?>

