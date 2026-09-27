<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function welcome(): string
    {
        $today = date('Y-m-d');
        return view('pages/welcome', [
            'today' => $today,
            'tasks' => (new TaskModel())->where('task_date', $today)->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function tasks(): string
    {
        return view('pages/tasks', [
            'tasks' => (new TaskModel())->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function profile(): string
    {
        return view('pages/profile', ['user' => (new UserModel())->first()]);
    }

    public function about(): string
    {
        return view('pages/about');
    }
}
