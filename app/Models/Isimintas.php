<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isimintas extends Model
{
    use HasFactory;

    protected $table = 'isimintas';
    protected $fillable = ['user_id','skelbimo_id'];

    public function skelbimai()
    {
        return $this->belongsTo(Skelbimas::class, 'skelbimo_id', 'id');
    }
}
