<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();

            $table->unsignedMediumInteger('association_id')->nullable()->index('users_fk_association_id');
            $table->unsignedMediumInteger('area_id')->nullable()->index('users_fk_area_id');

            $table->string('name')->nullable();
            
            $table->string('title_bn')->nullable();
            $table->string('title_en')->nullable();
            $table->string('contact',16)->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default(Hash::make('password'));
            $table->string('thumb',128)->nullable();
            $table->string('nid',18)->nullable();
            $table->string('passport',23)->nullable();
            $table->date('dob')->nullable();

            $table->double('govt_charge', 10, 2)->nullable()->default(0);
            $table->double('service_charge', 10, 2)->nullable()->default(0);
            $table->double('vat', 10, 2)->nullable()->default(0);
            $table->double('total_charge', 10, 2)->nullable()->default(0);

            $table->string('father_bn')->nullable();
            $table->string('father_en')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('address_en')->nullable();
            $table->string('spouse_bn')->nullable();
            $table->string('spouse_en')->nullable();


            $table->string('dsign')->nullable();
            $table->string('photo')->nullable();

            $table->rememberToken();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('association_id', 'users_fk_association_id')
                ->references('id')
                ->on('associations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('area_id', 'users_fk_area_id')
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
        Schema::dropIfExists('users');
    }
}
