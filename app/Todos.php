<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
  protected $table = 'todos';

  public $primarykey = 'id';

  public $timestamps = true;

  protected $fillable = [
      'TodoName', 'TodoUser',
  ];
}
