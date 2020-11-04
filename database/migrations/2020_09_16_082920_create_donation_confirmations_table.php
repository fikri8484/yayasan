<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_confirmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('programs_id');
            $table->integer('users_id');
            $table->integer('shelter_accounts_id');
            $table->integer('id_transaction');
            $table->string('donor_name');
            $table->bigInteger('phone');
            $table->string('email');
            $table->bigInteger('nominal_input');
            $table->bigInteger('nominal_donation');
            $table->text('support');
            $table->text('proof_payment');
            $table->string('donation_status');
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
        Schema::dropIfExists('donation_confirmations');
    }
}
