<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;

class CrudController extends Controller
{
    // EMPLOYEE
    public function employees_index() {
      $employees = Employee::all();
      return view('pages.employees-index', compact('employees'));
    }

    public function employees_show($id) {
      $employee = Employee::findOrFail($id);
      return view('pages.employees-show', compact('employee'));
    }

    // TASK
    public function task_index() {
      $tasks = Task::all();
      return view('pages.tasks-index', compact('tasks'));
    }
}
