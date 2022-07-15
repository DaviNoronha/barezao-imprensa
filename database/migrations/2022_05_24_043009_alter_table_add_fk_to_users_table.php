<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddFkToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('time_id')->nullable();

            $table->foreign('perfil_id')->references('id')->on('perfis');
            $table->foreign('time_id')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['perfil_id', 'time_id']);
            $table->dropColumn('perfil_id');
            $table->dropColumn('time_id');
        });
    }
}
