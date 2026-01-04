<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
      $table->string('customer_name', 100);
      $table->string('customer_phone', 30);
      $table->text('address');
      $table->decimal('lat', 10, 7)->nullable();
      $table->decimal('lng', 10, 7)->nullable();
      $table->foreignId('pricing_category_id');
      $table->string('photo_path')->nullable();
      $table->enum('service_method', ['free', 'paid'])->default('free');
      $table->dateTime('scheduled_at');
      $table->enum('status', ['pending', 'assigned', 'otw', 'picked', 'done', 'cancelled'])->default('pending');
      $table->foreignId('assigned_driver_id')->nullable()->constrained('users')->nullOnDelete();
      $table->dateTime('eta')->nullable();
      $table->string('tracking_code', 16)->unique();
      $table->integer('estimated_price')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};
