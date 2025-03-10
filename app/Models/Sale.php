<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'nm_id',
        'income_id',
        'discount_percent',
        'price_with_disc',
        'for_pay',
        'finished_price',
        'warehouse_name',
        'country_name',
        'oblast_okrug_name',
        'region_name',
        'is_supply',
        'is_realization',
        'spp',
        'promo_code_discount',
        'is_storno',
        'date',
        'last_change_date'
    ];

}
