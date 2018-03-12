<?php

namespace App;

use Ngt\Larafm\Database\Model;

class User extends Model
{
  public $timestamps = false;
  protected $layoutName = 'ユーザー';
  //protected $PrimaryKey = 'RecId';
  protected $fillable = ["社員番号","パスワード"];
}
