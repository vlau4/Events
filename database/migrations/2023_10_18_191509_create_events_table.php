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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   // if user was deleted, his events will be deleted // TODO ma eventy vymazat v pripade vymazania uzivatela?
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('tags');
            $table->string('logo')->nullable(); // nullable() means if it does not have logo-path, it is ok. It can be NULL.
            $table->longText('description');
            $table->tinyInteger('confirmed')->default(0); // 0 - not confirmed, 1 - confirmed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
