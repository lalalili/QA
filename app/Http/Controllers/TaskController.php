<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        
        return view('task', compact('tasks'));
    }

    public function api()
    {
        return Task::latest()->get();
    }
}
