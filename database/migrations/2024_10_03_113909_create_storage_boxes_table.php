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
        Schema::create('storage_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->enum('size', ['small', 'medium', 'large']); // lower le texte envoyé en valeur
            $table->decimal('monthly_cost', 8, 2);
            $table->boolean('availability')->default(true);
            $table->foreignId('tenant_id')->nullable();// ->constrained('tenants')->onDelete('set null'); => TODO : relier à tenants_ID
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage_boxes');
    }
};
