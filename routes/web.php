<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// EMPLOYEE
Route::get('/employees', 'CrudController@employees_index') -> name('employees-index');
Route::get('/employee/show/{id}', 'CrudController@employees_show') -> name('employees-show');

// TASK
Route::get('/tasks', 'CrudController@task_index') -> name('tasks-index');
