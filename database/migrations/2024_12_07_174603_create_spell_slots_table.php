<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spell_slots', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->string('school');
            $table->string('origin');
            $table->string('type');
            $table->json('counter_data');  // This will store the counter information
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
        Schema::dropIfExists('spell_slots');
    }
}
