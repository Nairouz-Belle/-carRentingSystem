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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('carName');
            $table->string('fuelType');
            $table->string('seating')->nullable();
            $table->string('carPic')->nullable();
            $table->string('type')->nullable();
            $table->string('airbags')->nullable();
            $table->string('engine')->nullable();
            $table->string('color')->nullable();
            $table->string('productionYear')->nullable();
            $table->string('price')->nullable();
            $table->string('fine');// The extra price if the car has not been returned within the deadline.
            $table->string('transmission')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('shape')->nullable();
            $table->string('km')->nullable();
            $table->string('vin')->nullable();
            $table->string('LicensePlate')->nullable();
            
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')
            ->onDelete('cascade');

            
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
