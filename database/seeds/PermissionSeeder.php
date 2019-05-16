<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
         DB::table('permission')->insert(
                [
                    'id'=>'1',
                    'name'=>'system.root',
                    'description'=>'User with this permission will be granted to all access. Use with precautions.',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


         DB::table('permission')->insert(
                [
                    'id'=>'2',
                    'name'=>'setting.manage',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


          DB::table('permission')->insert(
                [
                    'id'=>'3',
                    'name'=>'user.view',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

           DB::table('permission')->insert(
                [
                    'id'=>'4',
                    'name'=>'user.create',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


            DB::table('permission')->insert(
                [
                    'id'=>'5',
                    'name'=>'user.update',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );



             DB::table('permission')->insert(
                [
                    'id'=>'6',
                    'name'=>'user.delete',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


              DB::table('permission')->insert(
                [
                    'id'=>'7',
                    'name'=>'group.view',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

               DB::table('permission')->insert(
                [
                    'id'=>'8',
                    'name'=>'group.create',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

                DB::table('permission')->insert(
                [
                    'id'=>'9',
                    'name'=>'group.update',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

                 DB::table('permission')->insert(
                [
                    'id'=>'10',
                    'name'=>'group.delete',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

                  DB::table('permission')->insert(
                [
                    'id'=>'11',
                    'name'=>'permission.view',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

               DB::table('permission')->insert(
                [
                    'id'=>'12',
                    'name'=>'permission.create',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

                DB::table('permission')->insert(
                [
                    'id'=>'13',
                    'name'=>'permission.update',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );

                 DB::table('permission')->insert(
                [
                    'id'=>'14',
                    'name'=>'permission.delete',
                    'description'=>'',
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ]
        );


    }
}