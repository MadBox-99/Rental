<?php

use App\Models\Availability;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Location;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false);
            $table->foreignIdFor(Car::class)->nullable(false);
            $table->foreignIdFor(Availability::class)->nullable(false);
            $table->foreignIdFor(Customer::class)->nullable();
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->foreignIdFor(Location::class, 'pickup_location_id')->nullable(false);
            $table->foreignIdFor(Location::class, 'dropoff_location_id')->nullable(false);
            $table->dateTime('pickup_time')->nullable(false);
            $table->dateTime('dropoff_time')->nullable(false);
            $table->json('documents')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
