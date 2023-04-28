<?php
namespace Eldegweydev\Coupon\Http\Traits;

use Eldegweydev\Coupon\Models\Coupon;
use Carbon\Carbon;

trait CouponTrait
{

	public function checkCouponIsActive($code,$select = ['*']){

		$current_date = Carbon::now();

		return Coupon::where('code', $code)
		->whereDate('start','<=',$current_date)
		->whereDate('end','>=',$current_date)
		->whereRaw('max_use > num_of_use')
		->select($select)
		->first();
	}

	public function calculateCouponDiscount($code,$total_price){
        
        $coupon = $this->checkCouponIsActive($coupon_code);

        if (!$coupon) return ['message' => 'Invalid Coupon' , 'active' => false];
        
        $coupon_amount = $coupon->amount;

        if ($coupon->type == 'fixed') {
            $price_after_discount = $total_price - $coupon_amount;
            $coupon_type = 'fixed';
        }else if($coupon->type == 'percentage'){
            $price_after_discount = $total_price - ($total_price * ($coupon_amount/100));
            $coupon_type = 'percentage';
        }

        return ['message' => 'Valid Coupon' , 'active' => true,'price_after_discount' => $price_after_discount,'coupon_type' => $coupon_type,'coupon_amount' => $coupon_amount,'main_price' => $total_price] ;

    }
}
