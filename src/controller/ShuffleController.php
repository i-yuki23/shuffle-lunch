<?php

require_once __DIR__ . '/../lib/mysql.php';
require_once __DIR__ . '/../lib/utils.php';

class ShuffleController extends Controller
{
    public function index()
    {
        return $this->render([
            'groups' => []
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $employeeNames = $this->databaseManager->get('Employee')->fetchAllName();
        $groups = createGroup($employeeNames);
        
        return $this->render([
            'groups' => $groups,
        ], 'index');
    }
}