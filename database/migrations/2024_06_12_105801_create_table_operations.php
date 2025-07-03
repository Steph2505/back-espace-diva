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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles');
            $table->unsignedBigInteger('magasin_id')->nullable();
            $table->foreign('magasin_id')->references('id')->on('magasins');
            $table->boolean('type_operation')->default(true);
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
            $table->integer('stock')->nullable();
            $table->string('do_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
