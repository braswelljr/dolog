<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TaskState;

return new class extends Migration {
  /**
   * up - run migrations
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description')->nullable();
      $table->enum('state', array_column(TaskState::cases(), 'value'))->default(TaskState::Pending->value);
      $table->dateTime('due_date');
      $table->foreignUuid('uid')->constrained('users', 'id');
      $table->timestampTz('created_at');
    });
  }

  /**
   * down- Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('tasks');
  }
};
