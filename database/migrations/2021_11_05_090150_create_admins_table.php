<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_type_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();

            $table->unsignedMediumInteger('designation_id')->nullable();
            $table->unsignedMediumInteger('office_designation_id')->nullable();

            $table->unsignedMediumInteger('association_id')->nullable()->comment('Country');
            $table->unsignedMediumInteger('area_id')->nullable()->comment('Embassy');
            $table->unsignedMediumInteger('division_id')->nullable();
            $table->unsignedMediumInteger('district_id')->nullable();
            $table->unsignedMediumInteger('upazila_id')->nullable();
            $table->unsignedMediumInteger('thana_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable()->comment('ESC Office');
            //$table->unsignedBigInteger('branch_unit_id')->nullable();
            
            $table->string('code')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('office_bn')->nullable();
            $table->string('office_en')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('address_en')->nullable();
            $table->string('contact',13)->nullable()->default('01*********');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->json('districts')->nullable();
            $table->json('upazilas')->nullable();
            $table->json('gusers')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default('$2y$10$Gkvr53MZBrPViW8jKqjq/.3wW7pnzUDZZ61qHUBHh62gCzICJB7We');
            $table->string('thumb',128)->nullable();
            $table->string('dsign',128)->nullable();
            $table->boolean('is_otp')->default(0);
            $table->string('otp',16)->nullable();
            $table->rememberToken();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
