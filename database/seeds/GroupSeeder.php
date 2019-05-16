<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
         DB::table('group')->insert(
                [
                    'id'=>'1',
                    'name'=>'Administrator',
                    'description'=>'Administrator Group',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

          DB::table('group')->insert(
                [
                    'id'=>'2',
                    'name'=>'User',
                    'description'=>'User Group',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


    }
}