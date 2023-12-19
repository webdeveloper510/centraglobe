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
        Schema::table('leads', function (Blueprint $table) {
           
            $table->string('company_name')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('guest_count')->default(0);
            $table->string('function')->nullable();
            $table->string('venue_selection')->nullable();
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('title')->nullable();
        $table->string('website')->nullable();
        $table->string('lead_city')->nullable();
        $table->string('lead_state')->nullable();
        $table->string('lead_country')->nullable();
        $table->integer('lead_postalcode')->default(0);
        $table->string('source')->nullable();
        $table->decimal('opportunity_amount',15,2)->default('0.00');
        $table->string('industry')->nullable();
   
        Schema::dropIfExists('leads');
        });
    }
};
