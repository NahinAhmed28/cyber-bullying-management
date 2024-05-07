<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('category_id')->nullable()->default(1)->index('services_fk_category_id');
            $table->unsignedSmallInteger('service_type_id')->nullable()->default(1)->index('services_fk_service_type_id');
            $table->string('code')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();

            $table->double('govt_charge', 10, 2)->nullable()->default(0);
            $table->double('service_charge', 10, 2)->nullable()->default(0);
            $table->double('total_charge', 10, 2)->nullable()->default(0);

            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            
            $table->foreign('category_id', 'services_fk_category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('service_type_id', 'services_fk_service_type_id')
                ->references('id')
                ->on('service_types')
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
        Schema::dropIfExists('services');
    }
}
