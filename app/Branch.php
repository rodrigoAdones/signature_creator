<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 'address', 'phone1','phone2','type','company_id'
    ];
}
