<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsiaPensiunModel extends Model
{
    protected $table = 'usia_pensiun';
    protected $fillable = [
        'usia',
    ];
}
