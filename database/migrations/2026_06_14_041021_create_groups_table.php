<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {

            $table->id();
            $table->string('provider');
            $table->string('external_id')
                ->nullable();
            $table->string('name');
            $table->json('standings')
                ->nullable();
            $table->timestamps();

            $table->unique([
                'provider',
                'name'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};