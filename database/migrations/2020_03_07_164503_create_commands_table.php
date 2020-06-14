<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->enum('origin', ['vinted', 'instagram', 'etsy', 'other']);
            $table->string('fname');
            $table->string('lname');
            $table->string('adress');
            $table->integer('postal_code');
            $table->string('city');
            $table->integer('status');
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
        Schema::dropIfExists('commands');
    }
}
