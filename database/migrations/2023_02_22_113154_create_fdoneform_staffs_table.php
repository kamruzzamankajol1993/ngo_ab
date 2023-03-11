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
        Schema::create('fdoneform_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('ngo_id')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_join')->nullable();
            $table->string('citizenship')->nullable();
            $table->text('salary_statement')->nullable();
            $table->text('other_occupation')->nullable();
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
        Schema::dropIfExists('fdoneform_staffs');
    }
};
