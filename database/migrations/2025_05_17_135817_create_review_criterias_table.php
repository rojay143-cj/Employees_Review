<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('review_criteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_template_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., "Teamwork"
            $table->text('description')->nullable();
            $table->timestamps();
        });
        DB::table('review_criteria')->insert([
            ['review_template_id' => 1, 'name' => 'Teamwork', 'description' => 'This is a teamwork review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 1, 'name' => 'Communication', 'description' => 'This is a communication review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 1, 'name' => 'Problem Solving', 'description' => 'This is a problem solving review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 1, 'name' => 'Leadership', 'description' => 'This is a leadership review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 2, 'name' => 'Performance', 'description' => 'This is a performance review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 2, 'name' => 'Productivity', 'description' => 'This is a productivity review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 2, 'name' => 'Quality', 'description' => 'This is a quality review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 3, 'name' => 'Feedback', 'description' => 'This is a feedback review criteria.', 'created_at' => now(), 'updated_at' => now()],
            ['review_template_id' => 4, 'name' => 'Goal Setting', 'description' => 'This is a goal setting review criteria.', 'created_at' => now(), 'updated_at' => now()],
        ]);       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_criteria');
    }
};
