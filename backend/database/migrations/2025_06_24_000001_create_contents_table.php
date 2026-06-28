<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->index();        // home, about, services, contact, global...
            $table->string('section');              // hero, about, why_us, footer...
            $table->string('item_key');             // title, subtitle, image, etc.
            $table->string('label')->nullable();    // human label shown in admin
            $table->string('type')->default('text');// text | textarea | image
            $table->longText('value')->nullable();  // the editable value (text or image path)
            $table->integer('sort')->default(0);
            $table->timestamps();
            $table->unique(['page', 'section', 'item_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
