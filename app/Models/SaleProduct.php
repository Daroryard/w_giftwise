<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;
    protected $table = 'conf_saleproduct';
    protected $primaryKey = 'roworder';
    protected $fillable = [  
        'qty',
        'conf_mainproduct_id',
        'conf_mainproduct_code',
        'conf_mainproduct_name_th',
        'conf_mainproduct_name_en',
        'conf_mainproduct_img1',
        'timeline_qty',
        'timeline_day',
        'price',
    ];

    public function saleProductTags()
    {
        return $this->hasMany(MainProductTag::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }

    public function mainProduct()
    {
        return $this->belongsTo(MainProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }
}
