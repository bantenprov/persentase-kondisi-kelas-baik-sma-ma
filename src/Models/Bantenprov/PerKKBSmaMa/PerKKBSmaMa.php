<?php

namespace Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerKKBSmaMa extends Model
{

    protected $table = 'per_kkb_sma_mass';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa\Regency','id','regency_id');
    }

}

