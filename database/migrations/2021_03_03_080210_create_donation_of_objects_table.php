<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationOfObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_of_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('programs_id');
            $table->string('donor_name');
            $table->bigInteger('phone');
            $table->string('object');
            $table->text('support')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('donation_of_objects');
    }
}
