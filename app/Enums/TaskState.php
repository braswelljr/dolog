<?php

namespace App\Enums;

enum TaskState: string
{
  case Completed = 'completed';
  case Pending = 'pending';
  case InProgress = 'in_progress';
}
