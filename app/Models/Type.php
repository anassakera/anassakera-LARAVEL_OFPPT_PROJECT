<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'typeparent_id',
    ];

    /**
     * Get the parent type of the type.
     */
    public function parent()
    {
        return $this->belongsTo(Type::class, 'typeparent_id');
    }

    /**
     * Get the child types of the type.
     */
    public function children()
    {
        return $this->hasMany(Type::class, 'typeparent_id');
    }
}
