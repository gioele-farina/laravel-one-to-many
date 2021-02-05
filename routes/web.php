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
Route::get('/tasks/show/{id}', 'CrudController@tasks_show') -> name('tasks-show');

Route::get('/tasks/create', 'CrudController@tasks_create') -> name('tasks-create');
Route::post('/tasks/store', 'CrudController@tasks_store') -> name('tasks-store');

Route::get('/tasks/edit/{id}', 'CrudController@tasks_edit') -> name('tasks-edit');
Route::post('/tasks/update/{id}', 'CrudController@tasks_update') -> name('tasks-update');

// TYPOLOGY
Route::get('/typologies', 'CrudController@typologies_index') -> name('typologies-index');
Route::get('/typologies/show/{id}', 'CrudController@typologies_show') -> name('typologies-show');

Route::get('/typologies/create', 'CrudController@typologies_create') -> name('typologies-create');
Route::post('/typologies/store', 'CrudController@typologies_store') -> name('typologies-store');
