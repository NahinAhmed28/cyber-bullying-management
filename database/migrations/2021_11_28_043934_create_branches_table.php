<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('office_type_id')->nullable()->default(1)->index('branches_fk_office_type_id');
            $table->unsignedMediumInteger('association_id')->nullable()->index('branches_fk_association_id');
            $table->unsignedMediumInteger('area_id')->nullable()->index('branches_fk_area_id');
            $table->string('code')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('address_en',256)->nullable();
            $table->string('address_bn',256)->nullable();
            $table->string('latitude',32)->nullable()->default('23.8614515');
            $table->string('longitude',32)->nullable()->default('90.3934113');

            $table->string('email',32)->nullable();
            $table->string('contact',64)->nullable()->default('01*********');
            $table->text('long_url')->nullable();
            $table->text('short_url')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('office_type_id', 'branches_fk_office_type_id')
                ->references('id')
                ->on('office_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('association_id', 'branches_fk_association_id')
                ->references('id')
                ->on('associations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');


            $table->foreign('area_id', 'branches_fk_area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('branches');
    }
}
