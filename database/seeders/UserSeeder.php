<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'admin', 'email'=>'admin@gmail.com', 'password' => Hash::make('pass@admin'), 'phone'=>'123', 'address'=>'jasin',
            'company'=>null,'role'=>'admin', 'manager_id'=>null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name'=>'staff', 'email'=>'staff@gmail.com', 'password' => Hash::make('pass@staff'), 'phone'=>'123', 'address'=>'jasin',
            'company'=>null,'role'=>'staff', 'manager_id'=>'1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name'=>'client', 'email'=>'client@gmail.com', 'password' => Hash::make('pass@client'), 'phone'=>'123', 'address'=>'jasin',
            'company'=>'ABC Company', 'role'=>'client', 'manager_id'=>null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 

        ];

        DB::table('users')->insert($data);
    }
}
