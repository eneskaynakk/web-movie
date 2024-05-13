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
        Schema::create('movies', function (Blueprint $table){
        $table->id();
        $table->string ('imdbID');
        $table->string ('title');
        $table->string ('year');
        $table->string ('rated');
        $table->string ('runtime');
        $table->string ('rating');
        $table->string ('poster');
        $table->string ('genre');
        $table->string ('plot');
        $table->string ('director');
        $table->string ('writer');
        $table->string ('actor');
        $table->string ('type');
        $table->string ('country');
        $table->string ('award');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
