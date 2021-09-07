<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role')
                ->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('module')
                ->onDelete('cascade');
            $table->integer('pview');
            $table->integer('pcreate');
            $table->integer('pedit');
            $table->integer('pdelete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
