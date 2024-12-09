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
        Schema::create('facility', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->string('source_facility_type');
            $table->foreignId('type_id');
            $table->foreignId('provider_id');
            $table->integer('street_no');
            $table->string('street_name');
            $table->string('postal_code');
            $table->string('city');
            $table->foreignId('province_id');
            $table->text('source_format_address');
            $table->string('CSD_name');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->enum('status', ['open', 'close']);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility');
    }
};
