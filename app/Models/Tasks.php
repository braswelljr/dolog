<?php

namespace App\Models;

use App\Enums\TaskState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Tasks extends Model
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable;

  /** table name */
  protected $table = 'tasks';

  /**
   * mass assignable attributes
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'description',
    'state',
    'due_date',
    'uid'
  ];

  /**
   * hidden attributes
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'state' => TaskState::class,
      'due_date' => 'datetime',
      'created_at' => 'timestampz'
    ];
  }


  /**
   * user task relationship
   *
   * @return BelongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
