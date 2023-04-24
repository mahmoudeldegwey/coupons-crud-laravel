<?php
namespace Eldegweydev\Coupon\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Sang Nguyen
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'start' => 'required',
            'end' => 'required',
            'type' => ['required',Rule::in(['fixed','percentage'])],
            'amount' => 'required',
        ];
    }
}
