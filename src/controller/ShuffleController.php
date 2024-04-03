<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';

class ShuffleController extends Controller
{
    public function index()
    {
        dbConnect();
        return $this->render([
            'groups' => []
        ]);
    }

    public function create()
    {
        $groups = [];
        $link = dbConnect();
        $employeeNames = listEmployeeName($link);
        $groups = createGroup($employeeNames);
        
        include __DIR__ . "/../views/index.php";
    }
}