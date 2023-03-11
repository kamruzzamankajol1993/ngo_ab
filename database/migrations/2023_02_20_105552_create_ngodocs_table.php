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
        Schema::create('ngodocs', function (Blueprint $table) {
            $table->id();
            $table->string('primary_portal')->nullable();
            $table->string('attested_copy_of_constitution')->nullable();
            $table->string('activity_report_of_the_organization')->nullable();
            $table->string('receipt_of_donor')->nullable();
            $table->string('attested_copy_of_minutes_of_general_meeting')->nullable();
            $table->string('ngo_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('ngodocs');
    }
};
