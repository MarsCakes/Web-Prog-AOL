<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('order_status_updates', function (Blueprint $table) {
      $table->id();
      $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
      $table->enum('status', ['pending', 'assigned', 'otw', 'picked', 'done', 'cancelled']);
      $table->foreignId('performed_by')->nullable()->constrained('users')->nullOnDelete();
      $table->string('note')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('order_status_updates');
  }
};
