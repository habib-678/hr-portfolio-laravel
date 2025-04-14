<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    function service(){
      return $this->belongsTo(Service::class);
    }
}
