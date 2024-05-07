<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('association_id')->nullable()->index('branch_units_fk_association_id');
            $table->unsignedMediumInteger('area_id')->nullable()->index('branch_units_fk_area_id');
            
            $table->unsignedMediumInteger('division_id')->nullable()->index('branch_units_fk_division_id');
            $table->unsignedMediumInteger('district_id')->nullable()->index('branch_units_fk_district_id');
            $table->unsignedMediumInteger('upazila_id')->nullable()->index('branch_units_fk_upazila_id');
            $table->unsignedBigInteger('branch_id')->nullable()->index('branch_units_fk_branch_id');
            
            
            $table->string('code')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('address_en')->nullable();
            $table->string('contact',13)->nullable()->default('01*********');
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            

            $table->foreign('association_id', 'branch_units_fk_association_id')
                ->references('id')
                ->on('associations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('area_id', 'branch_units_fk_area_id')
                ->references('id')
                ->on('areas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');


            $table->foreign('division_id', 'branch_units_fk_division_id')
                ->references('id')
                ->on('divisions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('district_id', 'branch_units_fk_district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('upazila_id', 'branch_units_fk_upazila_id')
                ->references('id')
                ->on('upazilas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('branch_id', 'branch_units_fk_branch_id')
                ->references('id')
                ->on('branches')
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
        Schema::dropIfExists('branch_units');
    }
}
