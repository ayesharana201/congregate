
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("
                ALTER TABLE attendances
                MODIFY status ENUM(
                    'Pending',
                    'Present',
                    'Absent'
                ) NOT NULL DEFAULT 'Pending'
            ");
        } else {
            Schema::table('attendances', function (Blueprint $table) {
                $table->enum('status', [
                    'Pending',
                    'Present',
                    'Absent',
                ])->default('Pending')->change();
            });
        }

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreignId('approved_by')
                ->nullable()
                ->after('marked_by')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')
                ->nullable()
                ->after('approved_by');
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropConstrainedForeignId('approved_by');
            $table->dropColumn('approved_at');
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement("
                ALTER TABLE attendances
                MODIFY status ENUM(
                    'Present',
                    'Absent'
                ) NOT NULL DEFAULT 'Present'
            ");
        } else {
            Schema::table('attendances', function (Blueprint $table) {
                $table->enum('status', [
                    'Present',
                    'Absent',
                ])->default('Present')->change();
            });
        }
    }
};
