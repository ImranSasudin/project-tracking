<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Preliminary', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name'=>'Construction', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name'=>'Admendments', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('task_type')->insert($data);

        $data2 = [
            ['project_id'=>'1', 'task_type'=>'1', 'user_id'=>'2', 
            'assigned_by'=>'1', 'description'=>'Task A', 'status'=>'In Progress', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('tasks')->insert($data2);
    }
}
