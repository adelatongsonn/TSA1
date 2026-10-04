<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
{
    $filter = $this->request->getGet('status') ?? 'all';

    $statusGroups = [
        'not_started' => ['not started', 'pending'],
        'in_progress' => ['in progress'],
        'completed'   => ['completed', 'done'],
    ];

    $taskModel = new TaskModel();

    if (isset($statusGroups[$filter])) {
        $taskModel->whereIn('status', $statusGroups[$filter]);
    } else {
        $filter = 'all';
    }

    $data['tasks'] = $taskModel
        ->orderBy('task_date', 'ASC')
        ->findAll();

    $data['selectedStatus'] = $filter;

    return view('tasks/index', $data);
}
}

