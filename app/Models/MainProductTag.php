<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProductTag extends Model
{
    use HasFactory;
    protected $table = 'conf_mainproduct_tag';
    protected $primaryKey = 'conf_mainproduct_tag_id';
    protected $fillable = [
      'conf_mainproduct_tag_name_th',
      'conf_mainproduct_tag_name_en',
      'conf_mainproduct_tag_active',
      'slug',
    ];

    public function mainProduct()
    {
        return $this->belongsTo(MainProduct::class, 'conf_mainproduct_id', 'conf_mainproduct_id');
    }
}
