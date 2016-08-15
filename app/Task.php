<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['TaskID','title','description','set','due','owner'];

    public $timestamps = false;
}
