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
        Schema::create('job_runs', function (Blueprint $table) {

            $table->id();
            $table->string('job_name');
            $table->string('status', 30);
            $table->json('payload')
                ->nullable();
            $table->timestamp('started_at')
                ->nullable();
            $table->timestamp('finished_at')
                ->nullable();
            $table->timestamps();

            $table->index('job_name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_runs');
    }
};
