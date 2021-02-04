<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// EMPLOYEE
Route::get('/employees', 'CrudController@employees_index') -> name('employees-index');
Route::get('/employee/show/{id}', 'CrudController@employees_show') -> name('employees-show');

Route::get('/employee/create', 'CrudController@employees_create') -> name('employees-create');
Route::post('/employee/store', 'CrudController@employees_store') -> name('employees-store');

// TASK
Route::get('/tasks', 'CrudController@task_index') -> name('tasks-index');
