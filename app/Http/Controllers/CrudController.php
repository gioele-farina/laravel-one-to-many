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

    public function employees_create() {
      return view('pages.employees-create');
    }
    public function employees_store(Request $request) {
       $employee = Employee::create($request -> all());
       return redirect() -> route('employees-show', $employee -> id);
    }

    public function employees_edit($id) {
      $employee = Employee::findOrFail($id);
      return view('pages.employees-edit', compact('employee'));
    }
    public function employees_update(Request $request, $id){
      $employee = Employee::findOrFail($id);
      $employee -> update($request -> all());
      return redirect() -> route('employees-show', $employee -> id);
    }

    // TASK
    public function task_index() {
      $tasks = Task::all();
      return view('pages.tasks-index', compact('tasks'));
    }

    public function tasks_show($id) {
      $task = Task::findOrFail($id);
      return view('pages.tasks-show', compact('task'));
    }

}
