<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as Authenticatabletrait;



class Signup extends Model implements Authenticatable
{
    use HasFactory;
    use Authenticatabletrait;
    protected $table='signups';
    public $timestamps=false;
}
