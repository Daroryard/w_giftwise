<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;
    protected $table = 'conf_homeslide';
    protected $primaryKey = 'conf_homeslide_id';
    protected $fillable = [
        'conf_homeslide_listno',
        'conf_homeslide_img',
        'conf_homeslide_active',
    ];
}
