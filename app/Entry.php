<?php

namespace App;

use Ngt\Larafm\Database\Model;

class Entry extends Model
{
  public $timestamps = false;
  protected $layoutName = 'webエントリーフォーム';
  protected $connection = 'write';
  //protected $PrimaryKey = 'RecId';
  protected $fillable = ["日付","ユーザーid","姓"];
}
