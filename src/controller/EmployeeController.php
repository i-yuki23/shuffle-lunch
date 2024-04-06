<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';

class EmployeeController extends Controller
{
    public function index()
    {
        $employeeNames = $this->databaseManager->get('Employee')->fetchAllName();        
        return $this->render([
            'title' => 'Employee Registration',
            'employeeNames' => $employeeNames
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        };
        // セッションとPOSTデータがセットされているか否かとセッションとPOSTデータが一致するか否かの確認
        if(isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token'] === $_POST['token']) {
            // 情報を変数に格納
            $employee = $this->databaseManager->get('Employee');
            $employeeNames = $employee->fetchAllName();   
            $employee->insert($_POST['employee_name']);
            unset($_SESSION['token']);
            header('location: /employee');
            exit();
        } else {
            header('location: /employee');
            exit();
        }
    }
}
