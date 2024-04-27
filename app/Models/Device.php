<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'marque_id',
        'type_id',
        'model_id',
        'parentdevice_id',
        'n_série',
        'n_inventaire',
        'ram',
        'stockage',
        'os',
        'status',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'model_id');
    }

    public function parentDevice()
    {
        return $this->belongsTo(Device::class, 'parentdevice_id');
    }

    // وظائف إضافية حسب الحاجة...
}
