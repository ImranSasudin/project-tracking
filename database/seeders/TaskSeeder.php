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

        DB::table('tasks')->insert($data);
    }
}
