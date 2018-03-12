<?php

namespace App;

use Ngt\Larafm\Database\Model;

class Purchase extends Model
{
  public $timestamps = false;
  protected $layoutName = '勤怠';
  protected $fillable = ["日付","ユーザーid"];
}
