<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mod_books extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "id";
}
