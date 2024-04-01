<?php
require_once(__DIR__ . '/lib/mysql.php');

const STANDARD_GROUP_PEOPLE_NUM = 3;

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

function createGroup($employeeNames)
{
    shuffle($employeeNames);
    $employeeNum = count($employeeNames);
    $groupNum = ceil($employeeNum / STANDARD_GROUP_PEOPLE_NUM);
    $groups = array_fill(0, $groupNum, array());
    foreach($employeeNames as $index => $employeeName) {
        $groupIndex = $index % $groupNum;
        $groups[$groupIndex][] = $employeeName['name'];
    }
    return $groups;
}
$groups = [];
if (isset($_GET["shuffle"])) {
    $link = dbConnect();
    $employeeNames = listEmployeeName($link);
    $groups = createGroup($employeeNames);
}

include(__DIR__ . "/views/index.php")
?>
