<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepfeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stepfeeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('step_id')->nullable()->index('stepfeeds_fk_step_id');
            $table->unsignedBigInteger('admin_id')->nullable()->index('stepfeeds_fk_admin_id');
            $table->unsignedBigInteger('application_id')->nullable()->index('stepfeeds_fk_application_id');
            $table->string('code')->nullable()->unique();
            $table->string('name',256)->nullable();
            $table->mediumText('feedback_details_en')->nullable();
            $table->mediumText('feedback_details_bn')->nullable();
            //$table->string('fbfile',128)->nullable();
            $table->json('fbfiles')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('step_id', 'stepfeeds_fk_step_id')
                ->references('id')
                ->on('steps')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('application_id', 'stepfeeds_fk_application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('admin_id', 'stepfeeds_fk_admin_id')
                ->references('id')
                ->on('admins')
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
        Schema::dropIfExists('stepfeeds');
    }
}
