<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable()->index('steps_fk_admin_id');
            $table->unsignedBigInteger('application_id')->nullable()->index('steps_fk_application_id');
            $table->string('code')->nullable()->unique();
            $table->string('name',256)->nullable();
            $table->mediumText('step_details_en')->nullable();
            $table->mediumText('step_details_bn')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('application_id', 'steps_fk_application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('admin_id', 'steps_fk_admin_id')
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
        Schema::dropIfExists('steps');
    }
}
