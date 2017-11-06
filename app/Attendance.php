<?php

namespace App;

use Larafm;

class Attendance extends Larafm
{
    public function __construct(){
      Larafm::setLayout("勤怠");
      Larafm::setDate(["日付"]);
      return $this;
    }

    static public function getAll(){
      $datas=Larafm::find(10);
      $datas=$datas->data;
      return $datas;
    }
}
