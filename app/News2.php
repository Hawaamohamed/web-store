<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News2 extends Model
{ use SoftDeletes;
    protected $fillable = ['name','title','added_by'];
    protected $date = ['delete_at'];
}
