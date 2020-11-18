<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Project A', 'type'=>'Type A', 'date'=>'2016-9-25', 
            'client_id'=>'3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        $data2 = [
            ['checklist_id'=>'1', 'project_id'=>'1', 'updated_by'=>'1',
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('projects')->insert($data);
        DB::table('progress')->insert($data2);
    }
}
