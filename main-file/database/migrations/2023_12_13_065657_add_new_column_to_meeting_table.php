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
        Schema::table('meetings', function (Blueprint $table) {
            $table->string('alter_name')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('phone')->default(0);
            $table->integer('alter_phone')->nullable();
            $table->string('alter_email')->nullable();
            $table->string('alter_relationship')->nullable();
            $table->string('alter_lead_address')->nullable();
            $table->string('attendees_lead')->nullable();
            $table->string('email');
            $table->string('lead_address');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            //
        });
    }
};
