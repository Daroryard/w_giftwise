<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProductAddon extends Model
{
    use HasFactory;
    protected $table = 'conf_subproduct_addno';
    protected $primaryKey = 'conf_subproduct_addno_id';
    protected $fillable = [
       'conf_subproduct_id',
     'conf_mainproduct_id',
     'conf_subproduct_timeline',
     'conf_subproduct_addno_name_th',
     'conf_subproduct_addno_name_en',
     'conf_subproduct_addno_timeline',
     'conf_subproduct_addno_price',
     'conf_subproduct_addno_active',
     'created_at',
     'updated_at',
     'conf_subproduct_addno_type',
    ];

    public function subproduct()
    {
        return $this->belongsTo(SubProduct::class, 'conf_subproduct_id', 'conf_subproduct_id');
    }

    public function mainproduct()
    {
        return $this->belongsTo(MainProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }
}
