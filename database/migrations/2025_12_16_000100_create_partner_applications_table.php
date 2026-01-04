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
    Schema::create('partner_applications', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('phone', 30);
      $table->string('email', 120)->nullable();
      $table->string('city', 100);
      $table->string('vehicle', 100)->nullable();
      $table->text('notes')->nullable();
      $table->boolean('agreed')->default(true);
      $table->string('ip', 45)->nullable();
      $table->text('ua')->nullable();
      $table->string('status', 30)->default('pending');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('partner_applications');
  }
};
