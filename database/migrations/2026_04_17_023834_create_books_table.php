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
            $table->id();
            // Relationship to Seller (User)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Relationship to Category
            $table->foreignId('category_id')->constrained()->onDelete('restrict');

            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('author');
            $table->text('description');
            $table->decimal('price', 10, 2)->index(); // Indexed for 'price range' filtering
            $table->integer('stock')->default(0);
            $table->string('cover_image')->nullable();

            // Status: 'pending', 'active', 'rejected', 'out_of_stock'
            $table->string('status')->default('active')->index();

            $table->timestamps();
            $table->softDeletes();
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
