<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('opening_closings', function (Blueprint $table) {
            $table->id();
            $table->enum('day', ['1', '2', '3', '4', '5', '6', '7']);
            $table->time('opining');
            $table->time('closing');
            $table->foreignId('listing_id')->constrained('listings', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_closings');
    }
};
