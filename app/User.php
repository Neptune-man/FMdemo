<?php

namespace App;

use Larafm;

class User extends Larafm
{
    public function __construct(){
      Larafm::setLayout("ユーザー");
      return $this;
    }

    static public function getAll(){
      $datas=Larafm::find(10);
      $datas=$datas->data;
      return $datas;
    }
}
