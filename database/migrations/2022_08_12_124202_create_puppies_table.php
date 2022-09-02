<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuppiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puppies', function (Blueprint $table) {
            $table->id();
            $table->string('puppy_name')->nullable();
            $table->string('puppy_breed')->nullable();
            $table->string('puppy_price')->nullable();
            $table->string('puppy_image')->nullable();
            $table->string('puppy_dob')->nullable();
            $table->string('mom_weight')->nullable();
            $table->string('dad_weight')->nullable();
            $table->string('available')->nullable();
            $table->string('gender')->nullable();
            $table->string('puppy_color')->nullable();
            $table->longText('puppy_short_description')->nullable();
            $table->longText('puppy_long_description')->nullable();
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
        Schema::dropIfExists('puppies');
    }
}
