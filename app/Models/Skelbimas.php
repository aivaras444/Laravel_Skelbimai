<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skelbimas extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','dscription','price', 'user_id'];
}
