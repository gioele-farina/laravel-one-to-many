<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;
use App\Typology;

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

    public function tasks_create(){
      $employees = Employee::all();
      $typologies = Typology::all();
      return view('pages.tasks-create', compact('employees', 'typologies'));
    }
    public function tasks_store(Request $request){
      if ($request -> employee_id === NULL) {
        $task = Task::create($request -> all());
      } else {
        $task = Task::make($request -> all());
        $employee = Employee::findOrFail($request -> get('employee_id'));
        $task -> employee() -> associate($employee);
        $task -> save();
      }

      if (array_key_exists('assignToTyp', $request -> all() )) {
        $listOfTyp = Typology::findOrFail($request['assignToTyp']);
        $task -> typologies() -> sync($listOfTyp);
      }

      return redirect() -> route('tasks-show', $task -> id);
    }

    public function tasks_edit($id){
      $task = Task::findOrFail($id);
      $employees = Employee::all();
      $typologies = Typology::all();
      return view('pages.task-edit', compact('task', 'employees', 'typologies'));
    }
    public function tasks_update(Request $request, $id){
      $task = Task::findOrFail($id);

      if ($request -> employee_id === NULL) {
        $employee = Employee::find($task -> employee_id);
        if($employee) {
          $task -> employee() -> dissociate($employee);
        }
      } else {
        $employee = Employee::findOrFail($request -> get('employee_id'));
        $task -> employee() -> associate($employee);
      }

      // $task -> save();

      // Versione compatta
      if (array_key_exists('associated_typologies', $request -> all() )) {
        $listOfTyp = Typology::findOrFail($request['associated_typologies']);
        $task -> typologies() -> sync($listOfTyp);
      } else {
        $task -> typologies() -> detach();
      }

      // Versione estesa
      //Eliminazione di tutte le associazioni
      // $task->typologies()->detach();
      // creazione delle  nuove associazioni
      // $listOfTypId = $request -> associated_typologies;
      // foreach ($listOfTypId as $typId) {
      //   $newtypology = Typology::findOrFail($typId);
      //   $task -> typologies() -> attach($newtypology);
      // }

      $task -> update($request -> all());
      return redirect() -> route('tasks-show', $task -> id);
    }

    // TYPOLOGY
    public function typologies_index(){
      $typologies = Typology::all();
      return view('pages.typologies-index', compact('typologies'));
    }

    public function typologies_show($id){
      $typology = Typology::findOrFail($id);
      return view('pages.typologies-show', compact('typology'));
    }

    public function typologies_create(){
      return view('pages.typologies-create');
    }
    public function typologies_store(Request $request){
      $typology = Typology::create($request -> all());
      return redirect() -> route('typologies-show', $typology -> id);
    }

    public function typologies_edit($id){
      $typology = Typology::findOrFail($id);
      $tasks = Task::all();
      return view('pages.typologies-edit', compact('typology', 'tasks'));
    }
    public function typologies_update(Request $request, $id){
      $typology = Typology::findOrFail($id);

      if (array_key_exists('associated_tasks', $request -> all() )) {
        $listOfTasks = Task::findOrFail($request['associated_tasks']);
        $typology -> tasks() -> sync($listOfTasks);
      } else {
        $typology -> tasks() -> detach();
      }

      $typology -> update($request -> all());
      return redirect() -> route('typologies-show', $typology -> id);
    }
}
