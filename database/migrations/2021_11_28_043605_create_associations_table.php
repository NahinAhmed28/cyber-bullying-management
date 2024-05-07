<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->mediumIncrements('id');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
}
