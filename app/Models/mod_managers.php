<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mod_managers extends Model
{
    use HasFactory;
    protected $table = 'managers';
    protected $primaryKey = 'id';
}
