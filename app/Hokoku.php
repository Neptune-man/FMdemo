<?php

namespace App;

use Ngt\Larafm\Database\Model;

class Hokoku extends Model
{
  public $timestamps = false;
  protected $layoutName = '報告_勤怠';
  //protected $PrimaryKey = 'RecId';
  protected $fillable = ["日付","ユーザーid"];
}
