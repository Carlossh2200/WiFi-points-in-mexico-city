<?php
// app/Encargado.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargado'; // specify the existing table name
    protected $fillable = ['id_encargado', 'nombre'];
}
