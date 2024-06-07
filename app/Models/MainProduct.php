<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProduct extends Model
{
    use HasFactory;
    protected $table = 'conf_mainproduct';
    protected $primaryKey = 'conf_mainproduct_id';
    protected $fillable = [
      'conf_mainproduct_code',
      'conf_mainproduct_name_th',
      'conf_mainproduct_name_en',
      'conf_unit_id',
      'conf_unit_name_th',
      'conf_unit_name_en',
      'conf_category_id',
      'conf_category_name_th',
      'conf_category_name_en',
      'conf_categorysub_id',
      'conf_categorysub_name_th',
      'conf_categorysub_name_en',
      'conf_mainproduct_remark_th',
      'conf_mainproduct_remark_en',
      'conf_mainproduct_stcqty',
      'conf_mainproduct_img1',
      'conf_mainproduct_img2',
      'conf_mainproduct_img3',
      'conf_mainproduct_img4',
      'conf_mainproduct_img5',
      'conf_mainproduct_img6',
      'conf_mainproduct_img7',
      'conf_mainproduct_img8',
      'conf_mainproduct_active',
      'postweb',
      'slug',
    ];

    public function mainProductTags()
    {
        return $this->hasMany(MainProductTag::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }

    public function subProducts()
    {
        return $this->hasMany(SubProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }
}
