<?php
namespace Eldegweydev\Coupon\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupons extends Eloquent
{
    use SoftDeletes;

    protected $table = 'coupons';

    protected $fillable = ['name','code','start','end','max_use','type','amount','status'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'end',
        'start'
    ];

}
