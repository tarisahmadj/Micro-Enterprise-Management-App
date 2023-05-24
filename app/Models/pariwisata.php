<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pariwisata extends Model
{
    use HasFactory;

    protected $table = 'parawisatas';

    public static function getKecamatan($kec){
        $ARR[1] = 'SEMARANG';
        $ARR[2] = 'GROBOGAN';
        $ARR[3] = 'KENDAL';
        $ARR[4] = 'UDINUS';

        return $ARR[$kec];
    }
    public static function getKelurahan($kel){
        $ARR[1] = 'SEMARANG KULON';
        $ARR[2] = 'GROBOGAN WETAN';
        $ARR[3] = 'KENDAL KIDUL';
        $ARR[4] = 'UDINUS LOR';

        return $ARR[$kel] ;
    }
}
