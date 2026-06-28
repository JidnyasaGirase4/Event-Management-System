<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->string('event_type')->nullable();
            $table->string('package')->nullable();
            $table->date('event_date')->nullable();
            $table->integer('guests')->nullable();
            $table->string('location')->nullable();
            $table->text('requirements')->nullable();
            $table->string('status')->default('Pending'); // Pending|Confirmed|Completed|Cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
