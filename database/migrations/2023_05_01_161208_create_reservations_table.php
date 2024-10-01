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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('borrow');
            $table->string('return');
            $table->string('price');
            $table->string('fine');
            $table->string('returned')->nullable();
            $table->string('penalty')->nullable();// penalty = price + fine 
            $table->string('status');
            $table->string('Paiementstatus')->default('Unpaid')->nullable();
            
            $table->string('discountCode')->nullable();

            /*
            Pending: When a customer makes a reservation request.
            Confirmed: the car rental company review the informations of the reservation and accept it.
            On rent: The rental car is currently being used by the customer.
            Completed: The rental has been fully completed, including any charges or fees.            
            Cancelled: Reservations that have been cancelled by the customer or the rental company.
            
            */
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
      ->onDelete('cascade');;

            $table->bigInteger('vehicule_id')->unsigned()->index()->nullable();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onUpdate('cascade')
      ->onDelete('cascade');;
            
            $table->bigInteger('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')
      ->onDelete('cascade');
            
           
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
