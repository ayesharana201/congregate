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
        Schema::create('attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('member_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('status', [
                'Present',
                'Absent',
            ])->default('Present');

            $table->enum('marked_by', [
                'member',
                'admin',
            ])->default('member');

            $table->timestamp('marked_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            // One attendance record per member per event
            $table->unique([
                'member_id',
                'event_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};