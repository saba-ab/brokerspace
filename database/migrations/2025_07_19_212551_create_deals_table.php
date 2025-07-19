<?php

use App\Enums\DealStatus;
use App\Enums\DealType;
use App\Enums\CommissionType;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->enum('type', DealType::options());
            $table->enum('status', DealStatus::options());
            $table->decimal('property_price', 15, 2);
            $table->enum('commission_type', CommissionType::options());
            $table->decimal('commission_percentage', 5, 2)->nullable();
            $table->decimal('commission_amount', 15, 2)->nullable();
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_email')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
