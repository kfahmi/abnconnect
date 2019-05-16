<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        //admin system root
         DB::table('group_permission')->insert(
                [
                    'id'=>'1',
                    'allow'=>'1',
                    'group_id'=>'1',
                    'permission_id'=>'1',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

    }
}