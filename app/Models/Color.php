<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'conf_color';
    protected $primaryKey = 'conf_color_id';
    protected $fillable = [
      'conf_color_name_th',
      'conf_color_name_en',
      'conf_color_code',
      'conf_color_active',
      'conf_color_img',
    ];
}
