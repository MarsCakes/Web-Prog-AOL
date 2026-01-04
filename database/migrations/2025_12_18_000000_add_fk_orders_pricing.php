<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->foreign('pricing_category_id')
        ->references('id')->on('pricing_categories')
        ->cascadeOnDelete();
    });
  }

  public function down(): void
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->dropForeign(['pricing_category_id']);
    });
  }
};
