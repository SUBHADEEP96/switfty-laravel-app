<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public $table = 'restaurants';
    protected $fillable = [
        'name',
        'uuid',
        'address',
        'phone',
        'opening',
        'closing',
        'status'
    ];
}
