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

Route::get('/employee/edit/{id}', 'CrudController@employees_edit') -> name('employees-edit');
Route::post('/employee/update/{id}', 'CrudController@employees_update') -> name('employees-update');



// TASK
Route::get('/tasks', 'CrudController@task_index') -> name('tasks-index');
