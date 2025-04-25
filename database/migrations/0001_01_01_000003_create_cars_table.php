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
        Schema::create('cars', function (Blueprint $table): void {
            $table->id();
            $table->string('brand')->nullable(false); // Pl. "Audi"
            $table->string('model')->nullable(false);
            $table->string('slug')->unique()->nullable(false); // Slug for brand-model
            $table->string('transmission')->nullable(); // Pl. "Automata"
            $table->integer('horsepower')->nullable();
            $table->integer('mileage')->nullable();
            $table->integer('year')->nullable();
            $table->string('fuel')->nullable();
            $table->string('color')->nullable();
            $table->integer('doors')->nullable();
            $table->json('images')->nullable(); // Opcióként leírás
            $table->text('short_description')->nullable(); // Opcióként leírás
            $table->longText('description')->nullable(); // Opcióként leírás
            $table->string('license_plate')->unique()->nullable(false); // Forgalmi rendszám
            $table->date('technical_validity')->nullable(); // Műszaki érvényesség dátuma
            $table->string('technical_validity_number')->unique()->nullable(); // Műszaki érvényesség száma
            $table->string('chassis_number')->unique()->nullable(false); // Alvázszám
            $table->string('engine_number')->unique()->nullable(false); // Motor szám
            $table->string('owner')->nullable(false); // Üzembentartó
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
