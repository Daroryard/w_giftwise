<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    use HasFactory;
    protected $table = 'conf_subproduct';
    protected $primaryKey = 'conf_subproduct_id';
    protected $fillable = [
      'conf_subproduct_code',
      'conf_subproduct_name_th',
      'conf_subproduct_name_en',
      'conf_color_id',
      'conf_color_name_th',
      'conf_color_name_en',
      'conf_size_id',
      'conf_size_name_th',
      'conf_size_name_en',
      'conf_subproduct_price1',
      'conf_subproduct_price2',
      'conf_subproduct_price3',
      'conf_subproduct_price4',
      'conf_subproduct_price5',
      'conf_subproduct_stcqty',
      'conf_subproduct_img1',
      'conf_subproduct_img2',
      'conf_subproduct_img3',
      'conf_subproduct_img4',
      'conf_subproduct_active',
      'created_at',
      'updated_at',
      'postweb',
      'stcqty'
    ];

    protected $casts = [
        'conf_subproduct_stcqty' => 'integer',
    ];

    public function subProductTags()
    {
        return $this->hasMany(SubProductTag::class, 'conf_subproduct_id', 'conf_subproduct_id');
    }

    public function mainProduct()
    {
        return $this->belongsTo(MainProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class, 'conf_subproduct_id', 'conf_subproduct_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'conf_color_id', 'conf_color_id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'conf_size_id', 'conf_size_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'ms_product_code', 'conf_subproduct_code');
    }
}
