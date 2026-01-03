<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id();
      $table->string('title', 200);
      $table->string('slug', 250)->unique();
      $table->text('excerpt');
      $table->longText('body');
      $table->string('image', 255)->nullable();
      $table->string('tag', 50)->nullable();
      $table->string('read_time', 20)->nullable();
      $table->timestamp('published_at')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('articles');
  }
};
