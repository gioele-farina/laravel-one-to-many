<?php

use Illuminate\Database\Seeder;

use App\Task;
use App\Employee;
use App\Typology;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 50)
          -> make()
          -> each(function($task){
            $employee = Employee::inRandomOrder() -> first();
            $task -> employee() -> associate($employee);
            $task -> save();
        });

        factory(Task::class, 50)
          -> create()
          -> each(function($task){
            $typologies = Typology::inRandomOrder() -> limit(rand(1,6)) -> get();
            $task -> typologies() -> attach($typologies);
          });

        // Perchè questa non va?
        // factory(Task::class, 50)
        //   -> make()
        //   -> each(function($task){
        //
        //     $employee = Employee::inRandomOrder() -> first();
        //     $task -> employee() -> associate($employee);
        //
        //     $typologies = Typology::inRandomOrder() -> limit(rand(1,6)) -> get();
        //     $task -> typologies() -> attach($typologies);
        //
        //     $task -> save();
        // });
    }
}
