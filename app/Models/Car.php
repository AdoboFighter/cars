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

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    //defines has many relationship
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id', //foreign key on CarModel table
            'model_id' //Foreign key on Engine table
        );
    }

    //define a has one through relationship
    public function productionDate()
    {
        return $this->hasOneThrough(
        CarProductionDate::class,
        CarModel::class,
        'car_id',
        'model_id');
    }

}
