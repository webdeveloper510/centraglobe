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
            $table->string('company_name')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('guest_count')->default(0);
            $table->string('function')->nullable();
            $table->string('venue_selection')->nullable();
            $table->integer('room')->default(0);
            $table->string('meal')->nullable();
            $table->string('bar')->nullable();
            $table->string('spcl_request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->string('parent')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('account')->default(0);
            $table->integer('attendees_user')->default(0);
            $table->integer('attendees_contact')->default(0);
            $table->integer('attendees_lead')->default(0);
        });
    }
};
