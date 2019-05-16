<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
         DB::table('param')->insert(
                [
                    'id'=>'1',
                    'name'=>'salt',
                    'value'=>'Wirasmono27Tunggul08Manik1978Adi',
                ]
        );

         DB::table('param')->insert(
                [
                    'id'=>'2',
                    'name'=>'dashboardName',
                    'value'=>'YooHee',
                ]
        );


         DB::table('param')->insert(
                [
                    'id'=>'3',
                    'name'=>'showYooHee',
                    'value'=>true,
                ]
        );

         DB::table('param')->insert(
                [
                    'id'=>'4',
                    'name'=>'listSize',
                    'value'=>'30',
                ]
        );

    }
}