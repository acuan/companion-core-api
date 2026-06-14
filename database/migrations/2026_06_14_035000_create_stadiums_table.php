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
        Schema::create('stadiums', function (Blueprint $table) {

        $table->id();
        $table->string('provider');
        $table->string('external_id');
        $table->string('name');
        $table->string('fifa_name');
        $table->string('city');
        $table->string('country');
        $table->integer('capacity')
            ->nullable();
        $table->string('region')
            ->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadiums');
    }
};
