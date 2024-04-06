<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';

class EmployeeController extends Controller
{
    public function index()
    {
        $employeeNames = $this->databaseManager->get('Employee')->fetchAllName();        
        return $this->render([
            'title' => 'Emplypee Registration',
            'employeeNames' => $employeeNames
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }

        // 情報を変数に格納
        $employee = $this->databaseManager->get('Employee');
        $employeeNames = $employee->fetchAllName();   
        $employee->insert($_POST['employee_name']);
   
        return $this->render([
            'title' => 'Emplypee Registration',
            'employeeNames' => $employeeNames
        ], 'index');
    }
}
