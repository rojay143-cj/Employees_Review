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
        Schema::create('review_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    DB::table('review_templates')->insert([
        ['title' => 'General Review', 'description' => 'This is a general review template.', 'created_at' => now(), 'updated_at' => now()],
        ['title' => 'Performance Review', 'description' => 'This is a performance review template.', 'created_at' => now(), 'updated_at' => now()],
        ['title' => 'Feedback Review', 'description' => 'This is a feedback review template.', 'created_at' => now(), 'updated_at' => now()],
        ['title' => 'Goal Setting Review', 'description' => 'This is a goal setting review template.', 'created_at' => now(), 'updated_at' => now()]  
    ]);      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_templates');
    }
};
