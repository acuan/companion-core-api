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
        Schema::create('insights', function (Blueprint $table) {

            $table->id();
            $table->foreignId('content_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('content_event_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('category', 50);
            $table->string('title');
            $table->text('content');
            $table->decimal('score', 8, 2)
                ->default(0);
            $table->string('source', 50)
                ->default('llm');
            $table->timestamps();

            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};
