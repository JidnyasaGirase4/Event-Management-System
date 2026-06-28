<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('event_type');           // wedding | birthday | corporate
            $table->string('price');                 // e.g. "Rs 4,999"
            $table->string('badge')->nullable();     // e.g. "Popular"
            $table->boolean('is_featured')->default(false);
            $table->text('description')->nullable();
            $table->text('features')->nullable();    // newline-separated list
            $table->string('image')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
