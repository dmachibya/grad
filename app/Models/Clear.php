<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    use HasFactory;

    protected $fillable = ['clear_name'];
}
