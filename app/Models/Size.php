<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'conf_size';
    protected $primaryKey = 'conf_size_id';
    protected $fillable = [
      'conf_size_name_th',
      'conf_size_name_en',
      'conf_size_active',
      'conf_category_id',
    ];
}
