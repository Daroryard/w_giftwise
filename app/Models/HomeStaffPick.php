<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeStaffPick extends Model
{
    use HasFactory;
    protected $table = 'conf_homestaffpick';
    protected $primaryKey = 'conf_homestaffpick_id';
    protected $fillable = [
        'conf_homestaffpick_listno',
        'conf_homestaffpick_img',
        'conf_homestaffpick_active',
    ];
}
