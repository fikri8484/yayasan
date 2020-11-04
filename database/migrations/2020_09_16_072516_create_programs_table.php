<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categories_id');
            $table->string('title');
            $table->string('slug');
            $table->text('image');
            $table->text('brief_explanation');
            $table->bigInteger('donation_target');
            $table->date('time_is_up');
            $table->bigInteger('donation_collected');
            $table->text('description');
            $table->tinyInteger('is_published')->default(1);
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
        Schema::dropIfExists('programs');
    }
}
