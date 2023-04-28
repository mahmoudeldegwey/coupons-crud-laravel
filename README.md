# Coupon Package 

This package help you to generate the CRUD for coupon codes and easily apply the coupons and verify it. It offer different types of discounts, Fixed and Percentage discounts.

## Installation

First, install Package into your project using the Composer package manager:

```bash
composer require eldegweydev/coupon
```

## Run migrations

Finally, run database migration

```bash
php artisan migrate
```

## Routes List 

Can access the coupons routes from this table

|	Method  | Action  | URI |
|----------	| ---- | ------------- |
| GET		| index  	| /coupons  |
| GET		| show  	| /coupons/{coupon}  |
| GET		| create  	| coupons/create  |
| POST		| store   	| /coupons  |
| GET		| edit   	| /coupons/{coupon}/edit  |
| PUT		| update   	| /coupons/{coupon}  |
| DELETE	| destroy   | /coupons/{coupon}  |


## Usage 

To verify coupon code and apply the discount , you can use the provided Trait Coupon, it has two functions one for check the coupon is active and second to apply the coupon discount 

```bash
use Eldegweydev\Coupon\Http\Traits\CouponTrait

use CouponTrait;

$this->checkCouponIsActive($code,$select = ['*']);

$this->calculateCouponDiscount($code,$total_price);

```
