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
        Schema::create('entities', function (Blueprint $table) {

            $table->id();
            $table->string('provider', 50)
                ->nullable();
            $table->string('external_id', 100)
                ->nullable();
            $table->string('entity_type', 50);
            $table->string('name');
            $table->string('image_url')
                ->nullable();
            $table->json('metadata')
                ->nullable();
            $table->timestamps();

            $table->index('entity_type');
            $table->index('external_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
