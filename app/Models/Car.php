<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table ='cars';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'founded', 'description'];
    protected $hidden = ['updated_at'];
    protected $visible = ['name', 'founded', 'description'];
    // protected $timestamps = true;
    // protected $dateFormat = 'h:m:s';

    public function carmodels()
    {
        return $this->hasMany(CarModel::class);
    }
}
