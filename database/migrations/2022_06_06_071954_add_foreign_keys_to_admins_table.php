<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('user_type_id', 'admins_fk_user_type_id')
                ->references('id')
                ->on('user_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('role_id', 'admins_fk_role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            
            $table->foreign('designation_id', 'admins_fk_designation_id')
                ->references('id')
                ->on('designations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            
            $table->foreign('office_designation_id', 'admins_fk_office_designation_id')
                ->references('id')
                ->on('office_designations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('association_id', 'admins_fk_association_id')
                ->references('id')
                ->on('associations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('area_id', 'admins_fk_area_id')
                ->references('id')
                ->on('areas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('division_id', 'admins_fk_division_id')
                ->references('id')
                ->on('divisions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('district_id', 'admins_fk_district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('upazila_id', 'admins_fk_upazila_id')
                ->references('id')
                ->on('upazilas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('thana_id', 'admins_fk_thana_id')
                ->references('id')
                ->on('thanas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('branch_id', 'admins_fk_branch_id')
                ->references('id')
                ->on('branches')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            // $table->foreign('branch_unit_id', 'admins_fk_branch_unit_id')
            //     ->references('id')
            //     ->on('branch_units')
            //     ->onUpdate('CASCADE')
            //     ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign('admins_fk_user_type_id');
            $table->dropForeign('admins_fk_role_id');
            $table->dropForeign('admins_fk_designation_id');
            $table->dropForeign('admins_fk_division_id');
            $table->dropForeign('admins_fk_district_id');
            $table->dropForeign('admins_fk_upazila_id');
            $table->dropForeign('admins_fk_thana_id');
            $table->dropForeign('admins_fk_branch_id');
        });
    }
}
