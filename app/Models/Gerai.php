<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    use HasFactory;

    protected $table = 'gerai';
    protected $primaryKey = 'id_gerai';
    protected $guarded = [];
}
