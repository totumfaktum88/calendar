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
            $table->date("start");
            $table->date("end")->nullable();
            $table->date("weekly");
            $table->date("even");
            $table->date("odd");
            $table->tinyInteger("day_of_the_week");
            $table->date("expire_at");
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
