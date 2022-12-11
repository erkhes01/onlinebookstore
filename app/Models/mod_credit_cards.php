<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mod_credit_cards extends Model
{
    use HasFactory;
    protected $table = "credit_cards";
    protected $primaryKey = "email";
}
