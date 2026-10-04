<?php
namespace App\Controllers;
use App\Models\TaskModel;

class WelcomePage extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->findAll();

        return view('welcome', $data);
    }
}
