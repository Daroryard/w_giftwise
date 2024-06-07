<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $table = 'conf_product_tag';
    protected $primaryKey = 'conf_product_tag_id';
    protected $fillable = [
    'conf_product_tag_name_th',
    'conf_product_tag_name_en',
    'conf_product_tag_active',
    'conf_product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'conf_product_id', 'conf_product_id');
    }
}
