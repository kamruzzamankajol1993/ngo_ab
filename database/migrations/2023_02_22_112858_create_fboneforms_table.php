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
        Schema::create('fboneforms', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('address_of_head_office')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('name_of_head_in_bd')->nullable();
            $table->string('job_type')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('citizenship')->nullable();
            $table->string('profession')->nullable();
            $table->text('plan_of_operation')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('fee_paid_status')->nullable();
            $table->text('supporting_paper')->nullable();
           

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
        Schema::dropIfExists('fboneforms');
    }
};
