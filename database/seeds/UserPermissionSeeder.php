<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         DB::table('user_permission')->insert(
                [
                    'id'=>'2',
                    'allow'=>'1',
                    'user_id'=>'2',
                    'permission_id'=>'3',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

    }
}