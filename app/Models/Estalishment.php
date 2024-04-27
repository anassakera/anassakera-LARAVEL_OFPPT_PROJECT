<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estalishment extends Model
{
    use HasFactory;

    protected $table = 'establishments';
    protected $fillable = [
        'name',
        'ville',
    ];
}
