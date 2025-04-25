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
        Schema::create('customers', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->virtualAs("concat(first_name, ' ', last_name)");
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable(); // utca
            $table->string('address_number')->nullable(); // házszám
            $table->string('address_extra')->nullable(); // emelet/ajtó
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('born_place')->nullable(); // Születési hely
            $table->integer('born_year')->nullable(); // Születési év
            $table->integer('born_month')->nullable(); // Születési hónap
            $table->integer('born_day')->nullable(); // Születési nap
            $table->string('mother_name')->nullable(); // Anyja neve
            $table->string('license_number')->nullable(); // Jogosítvány száma
            $table->date('license_issue_date')->nullable(); // Jogosítvány kiállításának dátuma
            $table->date('license_expiry_date')->nullable(); // Jogosítvány lejárati dátuma
            $table->string('id_card_number')->nullable(); // Személyigazolványszám
            $table->json('files')->nullable(); // JSON oszlop a fájlok tárolására

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
