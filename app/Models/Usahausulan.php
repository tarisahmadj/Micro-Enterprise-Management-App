<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usahausulan extends Model
{
    use HasFactory;
    protected $table = 'usaha_usulan';
    protected $guarded = ['id'];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class, 'desa_id', 'id_desa');
    }
}
