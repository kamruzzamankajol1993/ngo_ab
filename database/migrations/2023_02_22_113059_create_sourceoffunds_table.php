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
        Schema::create('sourceoffunds', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('ngo_id')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->text('letter_file')->nullable();
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
        Schema::dropIfExists('sourceoffunds');
    }
};
