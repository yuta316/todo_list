<?php

use Illuminate\Database\Seeder;
use App\Models\Task;
// use \DateTime;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10; $i++) {
            Task::create([
                'name' => 'task'.$i,
                'goal' => new \Datetime(),
                'status' => 'wait',
            ]);
        }
    }
}
