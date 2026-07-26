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
    Schema::create('courses', function (Blueprint $table) {

        $table->id();

        $table->string('course_name');
        $table->string('course_code')->unique();

        $table->integer('credits');

        $table->enum('semester', [
            '1','2','3','4','5','6','7','8'
        ]);

        $table->enum('course_type', [
            'Theory',
            'Practical',
            'Theory + Practical'
        ]);

        $table->foreignId('department_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
