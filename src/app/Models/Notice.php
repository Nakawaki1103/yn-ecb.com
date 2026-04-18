<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['office_id','name', 'tel', 'email', 'title', 'body'];
}
