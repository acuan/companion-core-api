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
        Schema::create('contents', function (Blueprint $table) {

            $table->id();
            $table->string('provider', 50);
            $table->string('external_id', 100)
                ->nullable();
            $table->string('content_type', 50);
            $table->string('title');
            $table->text('description')
                ->nullable();
            $table->string('image_url')
                ->nullable();
            $table->string('status', 30)
                ->nullable();
            $table->timestamp('starts_at')
                ->nullable();
            $table->timestamp('ends_at')
                ->nullable();
            $table->json('metadata')
                ->nullable();
            $table->timestamps();

            $table->index('content_type');
            $table->index('provider');
            $table->index('external_id');
            $table->index('starts_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
