<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'erp_stockproduct';
    protected $primaryKey = 'ms_product_code';
    protected $fillable = [
        'ms_product_code',
        'stcqty'
    ];


}
