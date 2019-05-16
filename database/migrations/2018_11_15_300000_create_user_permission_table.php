<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allow')->default('1');
            $table->integer('user_id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->timestamps();

            $table->index('user_id','fk_user_id_idx');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');

            $table->index('permission_id','fk_permission_id_idx');
            $table->foreign('permission_id')->references('id')->on('permission')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('user_permission');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
