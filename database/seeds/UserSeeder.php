<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        //admin
         DB::table('user')->insert(
                [
                    'id'=>'1',
                    'group_id'=>'1',
                    'username'=>'admin',
                    'realname'=>'fami admin',
                    'email'=>'admin@email.com',
                    'password'=> bcrypt('password'),
                    'is_active'=>'1',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


         //admin
         DB::table('user')->insert(
                [
                    'id'=>'2',
                    'group_id'=>'2',
                    'username'=>'user',
                    'realname'=>'user 1',
                    'email'=>'user@email.com',
                    'password'=> bcrypt('password'),
                    'is_active'=>'1',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );






    }
}