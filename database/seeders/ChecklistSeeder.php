<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['number'=>'1', 
            'description'=>'Upon signing of agreement', 
            'percentage' => '10', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2a', 
            'description'=>'The foundation and footing works of the said Building', 
            'percentage' => '10', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2b', 
            'description'=>'The reinforced concrete framework of the said building', 
            'percentage' => '15', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2c', 
            'description'=>'The walls of the said Buildindg with door and window frames placed in position', 
            'percentage' => '10', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2d', 
            'description'=>'The roofing, electrical wiring, plumbing (without fittings), gas piping (if any) and internal telephone trunking and cabling (if any) to hee said Building', 
            'percentage' => '10', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2e', 
            'description'=>'admin@gmail.com', 
            'percentage' => '10', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2f', 
            'description'=>'The sewerage works serving the said Building', 
            'percentage' => '5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2g', 
            'description'=>'The drains serving the said Building', 
            'percentage' => '5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'2h', 
            'description'=>'The roads serving the said Building', 
            'percentage' => '5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'3', 
            'description'=>'On the date the Purchaser takes vacant possession of the said Building, with water and electricity supply ready for connection', 
            'percentage' => '12.5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'4', 
            'description'=>"Within twenty-one (21) working days after receipt by the Purchaser or the Purchaser's solicitors of the separate document of title to the said Lot together with a valid and registrable Memorandum of Transfer so the Purchaser duly executed by the Vendor or on the date of Purchaser takes vacant possession of the said Building, whichever is later", 
            'percentage' => '2.5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'5', 
            'description'=>"On the date Purchaser takes vacant possession of the said Building as in item 3 and to be held by the Vendor's solicitor as stakeholder for payment to he Vendor as follows:-", 
            'percentage' => null, 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'a', 
            'description'=>'Two point five per centum (2.5%) at the expiry of six (6) months after the date the Purchaser takes vacant possession of the said Building', 
            'percentage' => '2.5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['number'=>'b', 
            'description'=>'Two point five per centum (2.5%) at the expiry of eighteen (18) months after the date the Purchaser takes vacant possession fo the said Building', 
            'percentage' => '2.5', 
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('checklists')->insert($data);
    }
}
