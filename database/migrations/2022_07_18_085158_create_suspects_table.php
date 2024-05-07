<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable()->index('suspects_fk_application_id');
            $table->string('code')->nullable()->unique();
            $table->string('name',256)->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('thumb',256)->nullable();

            $table->date('suspicious_dob')->nullable();
            $table->boolean('suspicious_gender')->default(1)->comment('1=Male,0=Female');
            $table->string('suspicious_name_bn')->nullable();
            $table->string('suspicious_name_en')->nullable();
            $table->string('suspicious_guardian_bn')->nullable();
            $table->string('suspicious_guardian_en')->nullable();
            $table->string('suspicious_address_bn',256)->nullable();
            $table->string('suspicious_address_en',256)->nullable();
            $table->string('suspicious_school_bn',)->nullable();
            $table->string('suspicious_school_en',)->nullable();
            $table->string('suspicious_class_bn',)->nullable();
            $table->string('suspicious_class_en',)->nullable();
            $table->string('suspicious_contact',16)->nullable();
            $table->string('suspicious_guardian_contact',16)->nullable();
            $table->smallInteger('suspicious_age')->nullable()->default(0);
            $table->mediumText('suspicious_details_bn')->nullable();
            $table->mediumText('suspicious_details_en')->nullable();
            $table->string('ssign',128)->nullable();

            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('application_id', 'suspects_fk_application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suspects');
    }
}
