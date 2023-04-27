# Coupon Package 

This package help you to generate the CRUD for coupon codes and easily apply the coupons and verify it. It offer different types of discounts, Fixed and Percentage discounts.

## Installation

First, install Package into your project using the Composer package manager:

```bash
composer require eldegweydev/coupon
```

## Publishing Service Provider

Next, you should publish the package files using the vendor:publish Artisan command:

```bash
php artisan vendor:publish --provider="Eldegweydev\Coupon\CouponServiceProvider"
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
