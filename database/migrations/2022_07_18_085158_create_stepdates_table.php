<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stepdates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable()->index('stepdates_fk_application_id');
            $table->unsignedSmallInteger('case_status_id')->nullable()->index('stepdates_fk_case_status_id');
            $table->unsignedMediumInteger('risk_id')->nullable()->index('stepdates_fk_risk_id');
            $table->string('code')->nullable()->unique();
            $table->string('name',256)->nullable();
            $table->string('step_time')->nullable();
            $table->date('step_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('application_id', 'stepdates_fk_application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('case_status_id', 'stepdates_fk_case_status_id')
                ->references('id')
                ->on('case_statuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('risk_id', 'stepdates_fk_risk_id')
                ->references('id')
                ->on('risks')
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
        Schema::dropIfExists('stepdates');
    }
}
