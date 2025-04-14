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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('project_name');
            $table->string('slug')->unique();            
            $table->text('description')->nullable();         
            $table->string('client_name')->nullable();
            $table->string('image')->nullable();     
            $table->string('preview_link')->nullable(); 
            $table->boolean('is_active')->default(true);
            $table->string('published_at');
            $table->string('duration')->nullable(); 
            $table->timestamps();       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
