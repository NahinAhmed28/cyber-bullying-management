<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();

            // $table->unsignedMediumInteger('association_id')->nullable()->index('applications_fk_association_id');
            // $table->unsignedMediumInteger('area_id')->nullable()->index('applications_fk_area_id');
            // $table->unsignedBigInteger('branch_id')->nullable()->index('applications_fk_branch_id');
            
            // $table->unsignedMediumInteger('category_id')->nullable()->default(1)->index('applications_fk_category_id');
            // $table->unsignedMediumInteger('service_id')->nullable()->default(1)->index('applications_fk_service_id');
            // $table->unsignedSmallInteger('service_type_id')->nullable()->default(1)->index('applications_fk_service_type_id');
            // $table->unsignedBigInteger('user_id')->nullable()->index('applications_fk_user_id');

            $table->unsignedMediumInteger('division_id')->nullable()->index('applications_fk_division_id');
            $table->unsignedMediumInteger('district_id')->nullable()->index('applications_fk_district_id');
            $table->unsignedMediumInteger('upazila_id')->nullable()->index('applications_fk_upazila_id');
            $table->unsignedMediumInteger('thana_id')->nullable()->index('applications_fk_thana_id');
            
            $table->unsignedSmallInteger('case_type_id')->nullable()->default(1)->index('applications_fk_case_type_id');
            $table->unsignedSmallInteger('case_category_id')->nullable()->default(1)->index('applications_fk_case_category_id');
            $table->unsignedSmallInteger('case_status_id')->nullable()->default(1)->index('applications_fk_case_status_id');
            $table->unsignedMediumInteger('risk_id')->nullable()->default(1)->index('applications_fk_risk_id');


            $table->string('name')->nullable();
            
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('email')->nullable();
            

            $table->mediumText('title_details_bn')->nullable();
            $table->mediumText('title_details_en')->nullable();

            $table->date('dob')->nullable();
            $table->boolean('gender')->default(1)->comment('1=Male,0=Female');
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('guardian_bn')->nullable();
            $table->string('guardian_en')->nullable();
            $table->string('address_bn',256)->nullable();
            $table->string('address_en',256)->nullable();
            $table->string('school_bn',)->nullable();
            $table->string('school_en',)->nullable();
            $table->string('class_bn',)->nullable();
            $table->string('class_en',)->nullable();
            $table->string('contact',16)->nullable();
            $table->string('guardian_contact',16)->nullable();
            $table->smallInteger('age')->nullable()->default(0);
            $table->string('dsign',128)->nullable();

            $table->string('cperson_name_en',128)->nullable();
            $table->string('cperson_name_bn',128)->nullable();
            $table->string('cperson_no',128)->nullable();

            $table->mediumText('details_bn')->nullable();
            $table->mediumText('details_en')->nullable();

            $table->tinyInteger('is_gd')->default(1);
            $table->string('gd_thana')->nullable();
            $table->string('gd_no')->nullable();
            $table->date('gd_date')->nullable();
            $table->datetime('step_date')->nullable();

            $table->json('districts')->nullable();
            $table->json('upazilas')->nullable();
            $table->json('wusers')->nullable();
            $table->json('users')->nullable();

            

            // Extra
            //$table->string('nid',18)->nullable();
            //$table->string('passport',23)->nullable();
            //$table->boolean('marital')->default(1)->comment('1=Married ,0=Unmarried');
            //$table->double('govt_charge', 10, 2)->nullable()->default(0);
            //$table->double('service_charge', 10, 2)->nullable()->default(0);
            //$table->double('vat', 10, 2)->nullable()->default(0);
            //$table->double('total_charge', 10, 2)->nullable()->default(0);
            $table->smallInteger('approval_status')->default(0)->comment('0=pending esc, 1=approved by embassy, 2=approved by ministry');
            
            // Extra
            
            
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('approved_by')->nullable();
            $table->bigInteger('cancel_by')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            


            $table->date('entry_date')->nullable();
            
            $table->timestamps();

            // $table->foreign('association_id', 'applications_fk_association_id')
            //     ->references('id')
            //     ->on('associations')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('area_id', 'applications_fk_area_id')
            //     ->references('id')
            //     ->on('areas')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('branch_id', 'applications_fk_branch_id')
            //     ->references('id')
            //     ->on('branches')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('category_id', 'applications_fk_category_id')
            //     ->references('id')
            //     ->on('categories')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('service_id', 'applications_fk_service_id')
            //     ->references('id')
            //     ->on('services')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('service_type_id', 'applications_fk_service_type_id')
            //     ->references('id')
            //     ->on('service_types')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');

            // $table->foreign('user_id', 'applications_fk_user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');


            $table->foreign('division_id', 'applications_fk_division_id')
                ->references('id')
                ->on('divisions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('district_id', 'applications_fk_district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('upazila_id', 'applications_fk_upazila_id')
                ->references('id')
                ->on('upazilas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('thana_id', 'applications_fk_thana_id')
                ->references('id')
                ->on('thanas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('case_type_id', 'applications_fk_case_type_id')
                ->references('id')
                ->on('case_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('case_category_id', 'applications_fk_case_category_id')
                ->references('id')
                ->on('case_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('case_status_id', 'applications_fk_case_status_id')
                ->references('id')
                ->on('case_statuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('risk_id', 'applications_fk_risk_id')
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
        Schema::dropIfExists('applications');
    }
}
