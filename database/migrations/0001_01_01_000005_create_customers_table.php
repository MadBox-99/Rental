<?php

use App\Models\User;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->string('country')->nullable(false);
            $table->json('files')->nullable(true); // JSON oszlop a fájlok tárolására

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
