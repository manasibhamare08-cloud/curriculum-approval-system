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
    Schema::create('curricula', function (Blueprint $table) {

        $table->id();

        $table->foreignId('department_id')->constrained()->onDelete('cascade');

        $table->foreignId('course_id')->constrained()->onDelete('cascade');

        $table->foreignId('academic_year_id')->constrained()->onDelete('cascade');

        $table->foreignId('semester_id')->constrained()->onDelete('cascade');

        $table->foreignId('course_type_id')->constrained()->onDelete('cascade');

        $table->integer('credits');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
