<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();


            $table->string('username')->unique();
            $table->string('realname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('access_token')->nullable();
            $table->string('token')->nullable();
            $table->integer('is_active')->default(0);
            $table->timestamp('create_time')->nullable();;
            $table->timestamp('update_time')->nullable();;
            $table->timestamps();
            $table->softDeletes();

            $table->index('group_id','fk_group_id_idx');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
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
        Schema::dropIfExists('user');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
