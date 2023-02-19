<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_steps', function (Blueprint $table) {
            $table->id();
            $table->string('d_id')->nullable();
            $table->string('p_id')->nullable();
            $table->string('treatment_id')->nullable();
            $table->string('class')->nullable();
            $table->string('steps','500')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('treatment_steps');
    }
};
