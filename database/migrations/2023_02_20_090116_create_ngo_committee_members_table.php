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
        Schema::create('ngo_committee_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_slug')->nullable();
            $table->string('desi')->nullable();
            $table->string('dob')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('name_supouse')->nullable();
            $table->string('edu_quali')->nullable();
            $table->string('profession')->nullable();
            $table->string('job_des')->nullable();
            $table->string('service_status')->nullable();
            $table->string('remarks')->nullable();
            $table->text('image')->nullable();
            $table->string('main_date')->nullable();
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
        Schema::dropIfExists('ngo_committee_members');
    }
};
