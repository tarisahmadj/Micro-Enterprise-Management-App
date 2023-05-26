<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usahausulan extends Model
{
    use HasFactory;
    protected $table = 'usaha_usulan';
    protected $guarded = ['id'];
}
