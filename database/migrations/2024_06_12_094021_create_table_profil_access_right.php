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
        Schema::create('profil_access_right', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profil_id')->nullable();
            $table->foreign('profil_id')
                  ->references('id')
                  ->on('profils');
            $table->unsignedBigInteger('access_rights_id')->nullable();
            $table->foreign('access_rights_id')->references('id')->on('access_rights');
            $table->integer('user_created_id')->nullable();
            $table->integer('user_updated_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_access_right');
    }
};
