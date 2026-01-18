<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'address',
    ];
}
