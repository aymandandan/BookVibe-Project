<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('title');
            $table->longText('description');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('author_id')->constrained('authors');
            $table->enum('type', ['hard_book', 'e_book'])->default('hard_book');
            $table->unsignedInteger('page_nb')->nullable()->default(0);
            $table->decimal('price', 8, 2)->nullable()->default(0);
            $table->date('publish_date')->nullable();
            $table->string('publisher')->nullable();
            $table->string('language')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('dimensions')->nullable();
            $table->unsignedInteger('stock_qty')->nullable()->default(0);
            $table->decimal('size', 8, 2)->nullable()->default(0);
            $table->string('format')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
