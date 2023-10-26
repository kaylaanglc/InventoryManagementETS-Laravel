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
        Schema::create('items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_type');
            $table->unsignedBigInteger('item_condition');
            $table->string('desc', 128)->nullable();
            $table->string('defect', 128)->nullable();
            $table->integer('amount');
            $table->string('image'); // Store the image file name
            $table->timestamps();

            $table->foreign('item_type')->references('id')->on('item_type'); // for dropdown (input using seeder)
            $table->foreign('item_condition')->references('id')->on('item_condition'); // for dropdown (input using seeder)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
