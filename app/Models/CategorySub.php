<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySub extends Model
{
    use HasFactory;
    protected $table = 'conf_categorysub';
    protected $primaryKey = 'conf_categorysub_id';
    protected $fillable = [
        'conf_category_id',
        'conf_categorysub_name_th',
        'conf_categorysub_name_en',
        'conf_categorysub_active',
        'conf_categorysub_img1',
        'conf_categorysub_img2',
        'conf_categorysub_img3'
    ];
}
