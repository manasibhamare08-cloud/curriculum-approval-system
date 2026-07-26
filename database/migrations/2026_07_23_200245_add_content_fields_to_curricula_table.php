<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('curricula', function (Blueprint $table) {
            $table->text('course_outcomes')->nullable();
            $table->text('units')->nullable();
            $table->text('practicals')->nullable();
            $table->text('references_list')->nullable();
            $table->text('assessment_plan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('curricula', function (Blueprint $table) {
            $table->dropColumn([
                'course_outcomes',
                'units',
                'practicals',
                'references_list',
                'assessment_plan',
            ]);
        });
    }
};