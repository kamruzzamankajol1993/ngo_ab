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
        Schema::create('namechanges', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('previous_name_eng')->nullable();
            $table->string('previous_name_ban')->nullable();
            $table->string('present_name_eng')->nullable();
            $table->string('present_ban')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('namechanges');
    }
};
