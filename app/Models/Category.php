<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'conf_category';
    protected $primaryKey = 'conf_category_id';
    protected $fillable = [
        'conf_category_name_th',
        'conf_category_name_en',
        'conf_category_active',
        'conf_category_img1',
        'conf_category_img2',
        'conf_category_img3'
    ];
    public function subCategory()
    {
        return $this->hasMany(CategorySub::class, 'conf_category_id', 'conf_category_id');
    }
}
