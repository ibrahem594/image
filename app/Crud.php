<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable=['firstname','lastname','image'];
    protected $table='sample_data';
}
