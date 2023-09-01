<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('background_events', function (Blueprint $table) {
            $table->id();
            $table->date("start_date");
            $table->date("end_date")->nullable();
            $table->time("start_time");
            $table->time("end_time");
            //$table->date("weekly");
            $table->tinyInteger("day_of_week")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
