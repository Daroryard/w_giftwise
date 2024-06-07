<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'conf_product';
    protected $primaryKey = 'conf_product_id';
    protected $fillable = [
      'product_code',
      'product_name_th',
      'product_name_en',
      'product_price_qty50',
      'product_price_qty100',
      'product_price_qty300',
      'product_price_qty500',
      'product_price_qty1000',
      'product_remark_th',
      'product_remark_en',
      'product_category_th',
      'product_category_en',
      'product_categorysub_th',
      'product_categorysub_en',
      'product_unit_th',
      'product_unit_en',
      'product_color_th',
      'product_color_en',
      'product_size_th',
      'product_size_en',
      'stockqty',
      'created_at',
      'updated_at',
      'product_active',
      'product_img1',
      'product_img2',
      'product_img3',
      'product_img4',
      'product_img5',
      'product_img6',
      'product_img7',
      'product_img8',
      'product_img9',
      'hashtag_th',
      'hashtag_en',
      'meta_title_th',
      'meta_title_en',
      'meta_description_th',
      'meta_description_en',
      'slug',
    ];

    public function productTags()
    {
        return $this->hasMany(ProductTag::class, 'conf_product_id', 'conf_product_id');
    }
}
