<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mod_rents extends Model
{
    use HasFactory;
    protected $table = 'rents';
    protected $primaryKey = 'orderid';
}
