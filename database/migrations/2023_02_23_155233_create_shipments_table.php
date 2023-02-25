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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->string('address_1');
            $table->string('city');
            $table->string('state'); // ! Would normally pull from states table
            $table->double('zip', 5, 0, true);
            $table->enum('type', ['TRUCK', 'PLANE']);
            $table->dateTime('expected');

            $table->string('address_2')->nullable();

            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
