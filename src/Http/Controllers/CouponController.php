<?php
namespace Eldegweydev\Coupon\Http\Controllers;

use Eldegweydev\Coupon\Http\Requests\CouponRequest;
use Eldegweydev\Coupon\DataTables\CouponDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Eldegweydev\Coupon\Models\Coupon;

class CouponController extends Controller
{

    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('coupons::index');
    }

    public function create()
    {
        return view('coupons::create');
    }

    public function store(CouponRequest $request)
    {
        try {
            
            Coupon::create([
                'name' => $request->name,
                'code' => $request->code,
                'start' => $request->start,
                'end' => $request->end,
                'max_use' => $request->max_use,
                'type' => $request->type,
                'amount' => $request->amount
            ]);

        } catch (\Exception $e) {
            throw $e;    
        }

        return redirect()->route('coupons.index');
    }

    public function edit(Coupon $coupon)
    {
        return view('coupons::edit',compact('coupon'));
    }

    public function update($id, CouponRequest $request)
    {
        try {
            
            Coupon::where('id',$id)->update([
                'name' => $request->name,
                'code' => $request->code,
                'start' => $request->start,
                'end' => $request->end,
                'max_use' => $request->max_use,
                'type' => $request->type,
                'amount' => $request->amount
            ]);

        } catch (\Exception $e) {
            throw $e;    
        }

        return redirect()->route('coupons.index');
    }

    public function show(){}

    public function destroy($id)
    {
        Coupon::destroy($id);

        return redirect()->route('coupons.index');
    }

}
