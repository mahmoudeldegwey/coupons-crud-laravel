<?php
namespace Eldegweydev\Coupon\Http\Controllers;

use Eldegweydev\Coupon\Http\Requests\CouponRequest;
use Eldegweydev\Coupon\DataTables\CouponDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Eldegweydev\Coupon\Models\Coupons;

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
            
            Coupons::create([
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

    public function edit(Coupons $coupon)
    {
        return view('coupons::edit',compact('coupon'));
    }

    public function update($id, CouponRequest $request)
    {
        try {
            
            Coupons::where('id',$id)->update([
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
        Coupons::destroy($id);

        return redirect()->route('coupons.index');
    }

}
