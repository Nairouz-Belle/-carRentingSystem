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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('type');
            $table->string('status');//active expired
            $table->string('deadline');
            /*
            Time-based discounts: These are discounts that are based on the length of the rental period. For example, a car rental company may offer a 10% discount for rentals of 7 days or longer.

            Prepaid discounts: Some car rental companies offer discounts to customers who prepay for their rental in advance. This can help the company secure revenue in advance and offer customers a better rate.

            Membership discounts: Many car rental companies have partnerships with various organizations, such as airlines, hotels, and credit card companies. These partnerships may offer discounts to members of these organizations.

            Promotional discounts: Car rental companies may offer promotional discounts to attract new customers or increase business during slow periods. These discounts may be advertised through various channels, such as social media, email campaigns, or targeted advertising.

            Loyalty discounts: Car rental companies may offer discounts or rewards to customers who rent frequently or are members of their loyalty programs. These rewards can include upgrades, free rentals, or discounted rates.
            */
            $table->double('discountAmount');
            
            $table->bigInteger('vehicle_id')->unsigned()->index()->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicules')->onUpdate('cascade')
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
