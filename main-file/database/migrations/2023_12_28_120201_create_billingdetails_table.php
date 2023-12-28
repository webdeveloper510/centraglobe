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
        Schema::create('billingdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('event_id');         
            $table->string('venue_rental')->nullable();
            $table->string('hotel_rooms')->nullable();
            $table->string('equipment')->nullable();
            $table->string('setup')->nullable();
            $table->string('bar')->nullable();
            $table->string('special_req')->nullable();
            $table->string('food')->nullable();
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billingdetails');
    }
};
